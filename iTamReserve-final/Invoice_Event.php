<?php
session_start();

// Check if invoice data is available in session
if (!isset($_SESSION['invoice'])) {
    header("Location: home_redirect.php");
    exit();
}

// Get invoice data from session
$invoiceData = $_SESSION['invoice'];

// Format date and time
$eventDate = date("m-d-Y", strtotime($invoiceData['dateOfEvent']));
$startTime = date("g:i A", strtotime($invoiceData['startOfEvent']));
$endTime = date("g:i A", strtotime($invoiceData['endOfEvent']));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Reservation Invoice</title>
    <link rel="stylesheet" href="invoice.css">
</head>

<body>
    <div class="container">
        <header>
            <div class="logo">
                <img src="logo.png" alt="Logo">
                <div class="admin-name">
                    <?php echo htmlspecialchars($_SESSION['full_name']); ?>
                </div>
            </div>
            <div class="itamreserve-logo">
                <img src="iTamReservelogo.png" alt="itamreserve-logo">
            </div>
            <div class="nav-buttons">
                <form action="Admin.php" method="POST">
                    <button type="submit" class="home">Home</button>
                </form>
            </div>
        </header>
        <main>
            <div class="main-contents">
                <div class="invoice">
                    <h1>INVOICE</h1>
                    <div class="details">
                        <p><strong>Event Name:</strong> <?php echo htmlspecialchars($invoiceData['eventName']); ?></p>
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
