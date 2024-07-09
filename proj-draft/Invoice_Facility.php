<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facility Reservation Invoice</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", Arial, sans-serif;
        }

        body {
            background-color: #2f4f2f;
            color: white;
        }

        .container {
            background-image: url('BG.png');
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            margin-bottom: 20px;
        }

        .logo {
            display: flex;
            flex-direction: row;
            align-items: center;
            text-align: center;
        }

        .logo img {
            width: 40px;
            height: 50px;
        }

        .itamreserve-logo {
            position: fixed;
            top: 25px;
            left: 50%;
            transform: translateX(-50%);
        }

        .itamreserve-logo img {
            width: 300px;
            height: 35px;
        }

        .admin-name,
        .student-name {
            font-size: 18px;
            font-weight: bold;
            color: #FCD703;
            margin-left: 20px;
        }

        h1 {
            font-size: 18px;
            font-weight: bold;
        }

        .nav-buttons {
            display: flex;
        }

        .nav-buttons form {
            margin: auto;
        }

        .nav-buttons button {
            padding: 5px 20px;
            border: none;
            background-color: #4CAF50;
            color: white;
            font-size: 12px;
            border-radius: 20px;
            cursor: pointer;
        }

        .nav-buttons button.home {
            background-color: #002B16;
            margin-right: 20px;
        }

        .nav-buttons button.logout {
            background-color: #002B16;
        }

        .nav-buttons button.home:hover,
        .nav-buttons button.logout:hover {
            background-color: rgba(254, 243, 31, 0.8);
        }

        .main-contents {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        .invoice {
            background-color: #C2D4C3;
            padding: 20px;
            border-radius: 10px;
            width: 500px;
            max-width: 800px;
        }

        .invoice h1 {
            text-align: center;
            color: #002B16;
            margin-bottom: 20px;
            font-size: 24px;
            border-bottom: 2px solid #002B16;
            padding-bottom: 10px;
        }

        .details {
            margin-bottom: 20px;
        }

        .details p {
            margin-bottom: 10px;
            color: #002B16;
        }

        .details strong {
            color: #002B16;
        }

        .id-picture img {
            width: 150px;
            height: auto;
            display: block;
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <div class="logo">
                <img src="logo.png" alt="Logo">
                <div class="admin-name">
                    <h1>Name of Admin/Student</h1> <!-- from database -->
                </div>
            </div>
            <div class="itamreserve-logo">
                <img src="iTamReservelogo.png" alt="itamreserve-logo">
            </div>
            <div class="nav-buttons">
                <form action="Admin.php" method="POST"> <!-- depends if student or admin yung logged -->
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
                        <p><strong>Facility:</strong></p>
                        <p><strong>Date of Reservation:</strong></p>
                        <p><strong>Time Slot:</strong></p>
                        <p><strong>Purpose of Reservation:</strong></p>
                        <p><strong>ID Picture:</strong></p>
                        <div class="id-picture">
                            <img src="path_to_id_picture.png" alt="ID Picture">
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