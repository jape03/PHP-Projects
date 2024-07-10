<?php
session_start();

// Check if invoice data is available in session
if (!isset($_SESSION['invoice'])) {
    header("Location: home_redirect.php");
    exit();
}

// Get invoice data from session
$invoiceData = $_SESSION['invoice'];

// Fetch event details from the database
$conn = mysqli_connect('localhost', 'root', '', 'iTamReserve'); // Change 'root' and password accordingly
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

$eventId = $invoiceData['eventId'];
$eventDetails = mysqli_query($conn, "SELECT event_name, date_of_event, start_of_event, end_of_event FROM events WHERE id='$eventId'");
$event = mysqli_fetch_assoc($eventDetails);

mysqli_close($conn);

// Format date and time
$eventDate = date("m-d-Y", strtotime($event['date_of_event']));
$startTime = date("g:i A", strtotime($event['start_of_event']));
$endTime = date("g:i A", strtotime($event['end_of_event']));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Event Invoice</title>
    <link rel="stylesheet" href="invoice.css">
</head>

<body>
    <div class="container">
        <header>
            <div class="logo">
                <img src="logo.png" alt="Logo">
                <div class="user-name">
                    <?php echo htmlspecialchars($_SESSION['full_name']); ?>
                </div>
            </div>
            <div class="itamreserve-logo">
                <img src="iTamReservelogo.png" alt="itamreserve-logo">
            </div>
            <div class="nav-buttons">
                <form action="Student.php" method="POST">
                    <button type="submit" class="home">Home</button>
                </form>
            </div>
        </header>
        <main>
            <div class="main-contents">
                <div class="invoice">
                    <h1>INVOICE</h1>
                    <div class="details">
                        <p><strong>Name:</strong> <?php echo htmlspecialchars($invoiceData['firstName'] . ' ' . $invoiceData['lastName']); ?></p>
                        <p><strong>Department/Program:</strong> <?php echo htmlspecialchars($invoiceData['department']); ?></p>
                        <p><strong>Email Address:</strong> <?php echo htmlspecialchars($invoiceData['email']); ?></p>
                        <p><strong>Contact Number:</strong> <?php echo htmlspecialchars($invoiceData['contactNumber']); ?></p>
                        <p><strong>Event Name:</strong> <?php echo htmlspecialchars($event['event_name']); ?></p>
                        <p><strong>Date of Event:</strong> <?php echo htmlspecialchars($eventDate); ?></p>
                        <p><strong>Start of Event:</strong> <?php echo htmlspecialchars($startTime); ?></p>
                        <p><strong>End of Event:</strong> <?php echo htmlspecialchars($endTime); ?></p>
                    </div>
                    <div class="nav-buttons">
                        <form action="Start.php" method="POST">
                            <button type="submit" class="logout">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
