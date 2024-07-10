<?php
session_start();

// Function to create database and table if they do not exist
function createDatabaseAndTable($conn)
{
    $dbName = 'iTamReserve';
    $createDbQuery = "CREATE DATABASE IF NOT EXISTS $dbName";
    if (mysqli_query($conn, $createDbQuery)) {
        mysqli_select_db($conn, $dbName);
        $tableCheck = "CREATE TABLE IF NOT EXISTS events (
            id INT AUTO_INCREMENT PRIMARY KEY,
            event_name VARCHAR(100),
            date_of_event DATE,
            start_of_event TIME,
            end_of_event TIME,
            number_of_participants INT DEFAULT 0
        )";
        if (!mysqli_query($conn, $tableCheck)) {
            die('Error creating table: ' . mysqli_error($conn));
        }
    } else {
        die('Error creating database: ' . mysqli_error($conn));
    }
}

// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'iTamReserve'); // Change 'root' and password accordingly
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

// Create database and table if they do not exist
createDatabaseAndTable($conn);

// Handle form submission
$error_message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['delete'])) {
        // Handle delete event
        $eventId = mysqli_real_escape_string($conn, $_POST['event-id']);
        $deleteQuery = "DELETE FROM events WHERE id = $eventId";
        if (!mysqli_query($conn, $deleteQuery)) {
            $error_message = "ERROR: Could not execute $deleteQuery. " . mysqli_error($conn);
        }
    } else {
        // Escape user inputs for security
        $eventName = mysqli_real_escape_string($conn, $_POST['event-name']);
        $dateOfEvent = mysqli_real_escape_string($conn, $_POST['date-of-event']);
        $startOfEvent = mysqli_real_escape_string($conn, $_POST['start-of-event']);
        $endOfEvent = mysqli_real_escape_string($conn, $_POST['end-of-event']);

        // Insert the event data into the database
        $sql = "INSERT INTO events (event_name, date_of_event, start_of_event, end_of_event) 
                VALUES ('$eventName', '$dateOfEvent', '$startOfEvent', '$endOfEvent')";

        if (mysqli_query($conn, $sql)) {
            // Store form data in session variables
            $_SESSION['invoice'] = [
                'eventName' => $eventName,
                'dateOfEvent' => $dateOfEvent,
                'startOfEvent' => $startOfEvent,
                'endOfEvent' => $endOfEvent,
            ];

            header("Location: Invoice_Event.php");
            exit();
        } else {
            $error_message = "ERROR: Could not execute $sql. " . mysqli_error($conn);
        }
    }
}

// Fetch event records from the database
$result = mysqli_query($conn, "SELECT id, event_name, date_of_event, start_of_event, end_of_event, number_of_participants FROM events");
if (!$result) {
    die('Error fetching events: ' . mysqli_error($conn));
}

// Function to format date in MM-DD-YYYY format
function formatDate($date)
{
    return date("m-d-Y", strtotime($date));
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Create Event</title>
    <link rel="stylesheet" href="admin.css">
    <!-- Include Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <div class="container">
        <header>
            <div class="logo">
                <img src="logo.png" alt="Logo">
                <div class="admin-name">
                    <h1>Hello, <?php echo isset($_SESSION['full_name']) ? htmlspecialchars($_SESSION['full_name']) : 'User'; ?>!</h1>
                </div>
            </div>
            <div class="itamreserve-logo">
                <img src="iTamReservelogo.png" alt="itamreserve-logo">
            </div>
            <div class="nav-buttons">
                <form action="Admin.php" method="POST">
                    <button type="submit" class="home">Home</button>
                </form>
                <form action="Start.php" method="POST">
                    <button type="submit" class="logout">Logout</button>
                </form>
            </div>
        </header>
        <div class="main-content">
            <?php if (!empty($error_message)) : ?>
                <div class="error-message"><?php echo $error_message; ?></div>
            <?php endif; ?>
            <div class="form-section">
                <h2>Event Form</h2>
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="event-name">Event Name</label>
                    <input type="text" id="event-name" name="event-name" placeholder="Event Name" required>
                    <label for="date-of-event">Date of Event</label>
                    <input type="date" id="date-of-event" name="date-of-event" required>
                    <label for="start-of-event">Start of Event</label>
                    <input type="time" id="start-of-event" name="start-of-event" required>
                    <label for="end-of-event">End of Event</label>
                    <input type="time" id="end-of-event" name="end-of-event" required>
                    <button type="submit">Submit</button>
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
                            <th>Participants</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Display event records
                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $formattedDate = formatDate($row['date_of_event']);
                                $formattedStartTime = date("g:i A", strtotime($row['start_of_event']));
                                $formattedEndTime = date("g:i A", strtotime($row['end_of_event']));
                                echo "<tr>
                                    <td style='color: #002b16; text-align: center;'>" . htmlspecialchars($row['event_name']) . "</td>
                                    <td style='color: #002b16; text-align: center;'>" . htmlspecialchars($formattedDate) . "</td>
                                    <td style='color: #002b16; text-align: center;'>" . htmlspecialchars($formattedStartTime . ' - ' . $formattedEndTime) . "</td>
                                    <td style='color: #002b16; text-align: center;'>" . htmlspecialchars($row['number_of_participants']) . "</td>
                                    <td style='color: #002b16; text-align: center;'>
                                        <form action='' method='POST' style='display:inline;'>
                                            <input type='hidden' name='event-id' value='" . $row['id'] . "'>
                                            <button type='submit' name='delete' class='delete-icon' onclick='return confirm(\"Are you sure you want to delete this event?\");'><i class='fas fa-trash-alt'></i></button>
                                        </form>
                                    </td>
                                </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5' style='color: #002b16; text-align: center;'>No records found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>