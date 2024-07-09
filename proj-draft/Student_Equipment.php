<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Borrow Equipment</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", arial, sans-serif;
        }

        body {
            background-color: #2f4f2f;
            color: white;
        }

        .container {
            background-image: url('BG.png');
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

        .admin-name {
            font-size: 18px;
            font-weight: bold;
            color: #FCD703;
            margin-left: 20px;
        }

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
            margin-left: 10px;
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

        .nav-buttons button:hover {
            background-color: rgba(254, 243, 31, 0.8);
        }

        .main-content {
            display: flex;
            justify-content: space-between;
            width: calc(65% - 10px);
        }

        .form-section,
        .record-section {
            background-color: #C2D4C3;
            padding: 20px;
            border-radius: 10px;
            width: 600px;
        }

        .form-section {
            margin-right: 10px;
        }

        .record-section {
            margin-left: 10px;
        }

        h2 {
            color: #002B16;
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #002B16;
            padding-bottom: 10px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            color: #002B16;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input,
        select {
            padding: 10px;
            margin-bottom: 13px;
            border: none;
            border-radius: 5px;
            width: 535px;
        }

        input[id="first-name"],
        input[id="last-name"] {
            width: 265px;
        }

        input[type="file"] {
            padding: 0;
        }

        button[type="submit"] {
            padding: 5px;
            border: none;
            background-color: #002B16;
            color: white;
            font-size: 12px;
            border-radius: 20px;
            width: 100px;
            cursor: pointer;
            align-self: center;
        }

        button[type="submit"]:hover {
            background-color: rgba(254, 243, 31, 0.8);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid white;
        }

        th {
            background-color: #002B16;
            color: white;
            width: 80px;
            text-align: center;
            border: 1px solid #ccc;
        }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <div class="logo">
                <img src="logo.png" alt="Logo">
                <div class="student-name">
                    <h1>Name of Student</h1> <!-- from database -->
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
            <div class="form-section">
                <h2>Equipment Form</h2>
                <form action="ReservationInvoice.php" method="POST" enctype="multipart/form-data">
                    <label for="first-name">Name</label>
                    <div class="name-input">
                        <input type="text" id="first-name" placeholder="First Name">
                        <input type="text" id="last-name" placeholder="Last Name">
                    </div>
                    <label for="department">Department/Program</label>
                    <input type="text" id="department" placeholder="Department/Program">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" placeholder="Email Address">
                    <label for="contact-number">Contact Number</label>
                    <input type="text" id="contact-number" placeholder="Contact Number">
                    <label for="equipment">Equipment</label>
                    <select id="equipment">
                        <option value="">SELECT Equipment</option>
                        <!-- Add options here -->
                    </select>
                    <label for="quantity">Quantity</label>
                    <input type="number" id="quantity" placeholder="Quantity">
                    <label for="borrow-date">Borrow Date</label>
                    <input type="date" id="borrow-date">
                    <label for="return-date">Return Date</label>
                    <input type="date" id="return-date">
                    <label for="borrow-time">Borrow Time</label>
                    <input type="time" id="borrow-time">
                    <label for="return-time">Time of Return</label>
                    <input type="time" id="return-time">
                    <label for="purpose">Purpose of Borrow</label>
                    <input type="text" id="purpose" placeholder="Purpose of Borrow">
                    <label for="id-picture">ID Picture</label>
                    <input type="file" id="id-picture" accept=".jpg">
                    <button type="submit">Submit</button>
                </form>
            </div>
            <div class="record-section">
                <h2>Equipment Record</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Equipment</th>
                            <th>Available Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Add records here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>