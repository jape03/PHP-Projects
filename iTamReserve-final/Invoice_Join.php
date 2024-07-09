<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Invoice</title>
    <link rel="stylesheet" href="invoice.css">
</head>

<body>
    <div class="container">
        <header>
            <div class="logo">
                <img src="logo.png" alt="Logo">
                <div class="student-name"> <!-- admin-name or student-name -->
                    Name of Student <!-- from database -->
                </div>
            </div>
            <div class="itamreserve-logo">
                <img src="iTamReservelogo.png" alt="itamreserve-logo">
            </div>
            <div class="nav-buttons">
                <form action="Student.php" method="POST"> <!-- depends if student or admin yung logged -->
                    <button type="submit" class="home">Home</button>
                </form>
            </div>
        </header>
        <main>
            <div class="main-contents">
                <div class="invoice">
                    <h1>INVOICE</h1>
                    <div class="details">
                        <p><strong>Name:</strong></p>
                        <p><strong>Department/Program:</strong></p>
                        <p><strong>Email Address:</strong></p>
                        <p><strong>Contact Number:</strong></p>
                        <p><strong>Event Name:</strong></p> <!-- galing dun sa db ng pinili niyang event -->
                        <p><strong>Location:</strong></p> <!-- galing dun sa db ng pinili niyang event -->
                        <p><strong>Date of Event:</strong></p> <!-- galing dun sa db ng pinili niyang event -->
                        <p><strong>Time of Event:</strong></p> <!-- galing dun sa db ng pinili niyang event -->
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