<?php
session_start();

// Database connection
$conn = mysqli_connect('localhost', 'root', '', 'iTamReserve'); // Change 'root' and password accordingly
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

// Create database and table if they do not exist
function createDatabaseAndTable($conn) {
    $dbName = 'iTamReserve';
    $createDbQuery = "CREATE DATABASE IF NOT EXISTS $dbName";
    if (mysqli_query($conn, $createDbQuery)) {
        mysqli_select_db($conn, $dbName);
        $tableCheck = "CREATE TABLE IF NOT EXISTS facility_reservations (
            id INT AUTO_INCREMENT PRIMARY KEY,
            first_name VARCHAR(50),
            last_name VARCHAR(50),
            department VARCHAR(100),
            email VARCHAR(100),
            contact_number VARCHAR(20),
            facility VARCHAR(50),
            reservation_date DATE,
            start_time TIME,
            end_time TIME,
            purpose VARCHAR(255),
            id_picture VARCHAR(255)
        )";
        if (!mysqli_query($conn, $tableCheck)) {
            die('Error creating table: ' . mysqli_error($conn));
        }
    } else {
        die('Error creating database: ' . mysqli_error($conn));
    }
}

createDatabaseAndTable($conn);

// Handle form submission
$error_message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = mysqli_real_escape_string($conn, $_POST['first-name']);
    $lastName = mysqli_real_escape_string($conn, $_POST['last-name']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $contactNumber = mysqli_real_escape_string($conn, $_POST['contact-number']);
    $facility = mysqli_real_escape_string($conn, $_POST['facility']);
    $reservationDate = mysqli_real_escape_string($conn, $_POST['reservation-date']);
    $startTime = mysqli_real_escape_string($conn, $_POST['start-time-slot']);
    $endTime = mysqli_real_escape_string($conn, $_POST['end-time-slot']);
    $purpose = mysqli_real_escape_string($conn, $_POST['purpose']);
    $idPicture = $_FILES['id-picture']['name'];

    // Move the uploaded file to the server
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($idPicture);
    move_uploaded_file($_FILES['id-picture']['tmp_name'], $targetFile);

    // Validate the reservation rules
    $validationQuery = "SELECT * FROM facility_reservations WHERE facility='$facility' AND reservation_date='$reservationDate' AND (
                        (start_time < '$endTime' AND end_time > '$startTime'))";
    $validationResult = mysqli_query($conn, $validationQuery);

    if (mysqli_num_rows($validationResult) > 0) {
        $error_message = "The facility is already reserved for the selected time slot.";
    } else {
        // Insert the reservation data into the database
        $sql = "INSERT INTO facility_reservations (first_name, last_name, department, email, contact_number, facility, reservation_date, start_time, end_time, purpose, id_picture) 
                VALUES ('$firstName', '$lastName', '$department', '$email', '$contactNumber', '$facility', '$reservationDate', '$startTime', '$endTime', '$purpose', '$targetFile')";
        if (mysqli_query($conn, $sql)) {
            // Store form data in session variables
            $_SESSION['invoice'] = [
                'firstName' => $firstName,
                'lastName' => $lastName,
                'department' => $department,
                'email' => $email,
                'contactNumber' => $contactNumber,
                'facility' => $facility,
                'reservationDate' => $reservationDate,
                'startTime' => $startTime,
                'endTime' => $endTime,
                'purpose' => $purpose,
                'idPicture' => $targetFile
            ];

            header("Location: Invoice_Facility.php");
            exit();
        } else {
            $error_message = "ERROR: Could not execute $sql. " . mysqli_error($conn);
        }
    }
}

// Fetch reservation records from the database
$reservationRecords = mysqli_query($conn, "SELECT facility, reservation_date, start_time, end_time FROM facility_reservations");

mysqli_close($conn);

// Function to format time in 12-hour format
function formatTime($time) {
    return date("g:i A", strtotime($time));
}

// Function to format date in MM-DD-YYYY format
function formatDate($date) {
    return date("m-d-Y", strtotime($date));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Facility Reservation</title>
    <link rel="stylesheet" href="admin.css">
</head>

<body>
    <div class="container">
        <header>
            <div class="logo">
                <img src="logo.png" alt="Logo">
                <div class="admin-name">
                    <h1>Hello, <?php echo htmlspecialchars($_SESSION['full_name']); ?>!</h1>
                </div>
            </div>
            <div class="itamreserve-logo">
                <img src="iTamReservelogo.png" alt="itamreserve-logo">
            </div>
            <div class="nav-buttons">
                <form action="Start.php" method="POST">
                    <button type="submit" class="logout">Logout</button>
                </form>
                <form action="Admin.php" method="POST">
                    <button type="submit" class="home">Home</button>
                </form>
            </div>
        </header>
        <div class="main-content">
            <?php if (!empty($error_message)): ?>
                <div class="error-message"><?php echo $error_message; ?></div>
            <?php endif; ?>
            <div class="form-section">
                <h2>Facility Reservation Form</h2>
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
                    <label for="facility">Facility</label>
                    <select id="facility" name="facility" required>
                        <option value="" disabled selected>Select Facility</option>
                        <option value="Student Plaza">Student Plaza</option>
                        <option value="Multipurpose Room">Multipurpose Room</option>
                        <option value="Audio Visual Room">Audio Visual Room</option>
                        <option value="Gymnasium">Gymnasium</option>
                        <option value="Recording Room">Recording Room</option>
                        <option value="Innovation Center">Innovation Center</option>
                        <option value="Mac Lab">Mac Lab</option>
                        <option value="Chem Lab">Chem Lab</option>
                        <option value="Physics Lab">Physics Lab</option>
                        <option value="Computer Lab">Computer Lab</option>
                    </select>
                    <label for="reservation-date">Date of Reservation</label>
                    <input type="date" id="reservation-date" name="reservation-date" required>
                    <label for="start-time-slot">Start Time</label>
                    <input type="time" id="start-time-slot" name="start-time-slot" required>
                    <label for="end-time-slot">End Time</label>
                    <input type="time" id="end-time-slot" name="end-time-slot" required>
                    <label for="purpose">Purpose of Reservation</label>
                    <input type="text" id="purpose" name="purpose" placeholder="Purpose of Reservation" required>
                    <label for="id-picture">ID Picture</label>
                    <input type="file" id="id-picture" name="id-picture" accept=".jpg" required>
                    <button type="submit">Submit</button>
                </form>
            </div>
            <div class="record-section">
                <h2>Reservation Record</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Facility</th>
                            <th>Date</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Display reservation records
                        if (mysqli_num_rows($reservationRecords) > 0) {
                            while ($row = mysqli_fetch_assoc($reservationRecords)) {
                                $formattedDate = formatDate($row['reservation_date']);
                                $formattedStartTime = formatTime($row['start_time']);
                                $formattedEndTime = formatTime($row['end_time']);
                                echo "<tr><td>" . htmlspecialchars($row['facility']) . "</td><td>" . htmlspecialchars($formattedDate) . "</td><td>" . htmlspecialchars($formattedStartTime . ' - ' . $formattedEndTime) . "</td></tr>";
                            }
                        } else {
                            echo "<tr><td colspan='3'>No records found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
