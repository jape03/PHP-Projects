<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Admin Facility Reservation</title>
</head>

<body>
    <div class="container">
        <header>
            <div class="logo">
                <img src="logo.png" alt="Logo">
                <div class="admin-name">
                    <h1>Name of Admin</h1> <!-- from database -->
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
            <div class="form-section">
                <h2>Facility Reservation Form</h2>
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
                    <label for="facility">Facility</label>
                    <select id="facility">
                        <option value="" disabled selected>Select Facility</option>
                        <!-- Add options here -->
                    </select>
                    <label for="reservation-date">Date of Reservation</label>
                    <input type="date" id="reservation-date">
                    <label for="start-time-slot">Start Time</label>
                    <input type="time" id="start-time-slot">
                    <label for="end-time-slot">End Time</label>
                    <input type="time" id="end-time-slot">
                    <label for="purpose">Purpose of Reservation</label>
                    <input type="text" id="purpose" placeholder="Purpose of Reservation">
                    <label for="id-picture">ID Picture</label>
                    <input type="file" id="id-picture" accept=".jpg">
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
                        <!-- Add records here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>