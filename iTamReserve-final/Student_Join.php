<?php
session_start();

// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'iTamReserve'); // Change 'root' and password accordingly
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

// Handle form submission
$error_message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['event'])) {
    // Escape user inputs for security
    $firstName = mysqli_real_escape_string($conn, $_POST['first-name']);
    $lastName = mysqli_real_escape_string($conn, $_POST['last-name']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $contactNumber = mysqli_real_escape_string($conn, $_POST['contact-number']);
    $eventId = mysqli_real_escape_string($conn, $_POST['event']);

    // Increment the number of participants for the selected event
    $sql = "UPDATE events SET number_of_participants = number_of_participants + 1 WHERE id='$eventId'";
    if (mysqli_query($conn, $sql)) {
        // Store form data in session variables
        $_SESSION['invoice'] = [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'department' => $department,
            'email' => $email,
            'contactNumber' => $contactNumber,
            'eventId' => $eventId
        ];

        header("Location: Invoice_Join.php");
        exit();
    } else {
        $error_message = "ERROR: Could not execute $sql. " . mysqli_error($conn);
    }
}

// Fetch event records from the database
$eventRecords = mysqli_query($conn, "SELECT id, event_name, date_of_event, start_of_event, end_of_event, number_of_participants FROM events");

// Function to format time in 12-hour format
function formatTime($time) {
    return date("g:i A", strtotime($time));
}

// Function to format date in MM-DD-YYYY format
function formatDate($date) {
    return date("m-d-Y", strtotime($date));
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="student.css">
    <title>Student Join Event</title>
</head>

<body>
    <div class="container">
        <header>
            <div class="logo">
                <img src="logo.png" alt="Logo">
                <div class="student-name">
                    <h1>Hello, <?php echo isset($_SESSION['full_name']) ? htmlspecialchars($_SESSION['full_name']) : 'Student'; ?>!</h1>
                </div>
            </div>
            <div class="itamreserve-logo">
                <img src="iTamReservelogo.png" alt="itamreserve-logo">
            </div>
            <div class="nav-buttons">
                <form action="Start.php" method="POST">
                    <button type="submit" class="logout">Logout</button>
                </form>
                <form action="Student.php" method="POST">
                    <button type="submit" class="home">Home</button>
                </form>
            </div>
        </header>
        <div class="main-content">
            <?php if (!empty($error_message)): ?>
                <div class="error-message"><?php echo $error_message; ?></div>
            <?php endif; ?>
            <div class="form-section">
                <h2>Event Form</h2>
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="first-name">Name</label>
                    <div class="name-input">
                        <input type="text" id="first-name" name="first-name" placeholder="First Name" required>
                        <input type="text" id="last-name" name="last-name" placeholder="Last Name" required>
                    </div>
                    <label for="department">Department/Program</label>
                    <input type="text" id="department" name="department" placeholder="Department/Program" required>
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="Email Address" required>
                    <label for="contact-number">Contact Number</label>
                    <input type="text" id="contact-number" name="contact-number" placeholder="Contact Number" required>
                    <label for="event">Event</label>
                    <select id="event" name="event" required>
                        <option value="" disabled selected>Select Event</option>
                        <?php
                        // Populate event options
                        if (mysqli_num_rows($eventRecords) > 0) {
                            while ($row = mysqli_fetch_assoc($eventRecords)) {
                                $formattedDate = formatDate($row['date_of_event']);
                                $formattedStartTime = formatTime($row['start_of_event']);
                                $formattedEndTime = formatTime($row['end_of_event']);
                                echo "<option value='" . htmlspecialchars($row['id']) . "'>" . htmlspecialchars($row['event_name'] . " (" . $formattedDate . " " . $formattedStartTime . "-" . $formattedEndTime . ")") . "</option>";
                            }
                        }
                        ?>
                    </select>
                    <button type="submit">Join</button>
                </form>
            </div>
            <div class="record-section">
                <h2>Event Record</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Event</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>No. of Participants</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Populate event records
                        if (mysqli_num_rows($eventRecords) > 0) {
                            mysqli_data_seek($eventRecords, 0); // Reset pointer to the beginning
                            while ($row = mysqli_fetch_assoc($eventRecords)) {
                                $formattedDate = formatDate($row['date_of_event']);
                                $formattedStartTime = formatTime($row['start_of_event']);
                                $formattedEndTime = formatTime($row['end_of_event']);
                                echo "<tr>
                                        <td>" . htmlspecialchars($row['event_name']) . "</td>
                                        <td>" . htmlspecialchars($formattedDate) . "</td>
                                        <td>" . htmlspecialchars($formattedStartTime . ' - ' . $formattedEndTime) . "</td>
                                        <td>" . htmlspecialchars($row['number_of_participants']) . "</td>
                                      </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>No records found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
