<?php
session_start();

// Check if invoice data is available in session
if (!isset($_SESSION['invoice'])) {
    header("Location: home_redirect.php");
    exit();
}

// Get invoice data from session
$invoiceData = $_SESSION['invoice'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facility Reservation Invoice</title>
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
                <form action="home_redirect.php" method="POST">
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
                        <p><strong>Facility:</strong> <?php echo htmlspecialchars($invoiceData['facility']); ?></p>
                        <p><strong>Date of Reservation:</strong> <?php echo htmlspecialchars($invoiceData['reservationDate']); ?></p>
                        <p><strong>Time Slot:</strong> <?php echo htmlspecialchars($invoiceData['startTime'] . ' - ' . $invoiceData['endTime']); ?></p>
                        <p><strong>Purpose of Reservation:</strong> <?php echo htmlspecialchars($invoiceData['purpose']); ?></p>
                        <p><strong>ID Picture:</strong></p>
                        <div class="id-picture" style="text-align: center;">
                            <img src="<?php echo htmlspecialchars($invoiceData['idPicture']); ?>" alt="ID Picture" style="display: inline-block;">
                        </div>
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