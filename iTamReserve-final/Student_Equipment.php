<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="student.css">
    <title>Student Borrow Equipment</title>
</head>

<body>
    <div class="container">
        <header>
            <div class="logo">
                <img src="logo.png" alt="Logo">
                <div class="student-name">
                    Name of Student <!-- from database -->
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
                <form action="Invoice_Equipment.php" method="POST" enctype="multipart/form-data">
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