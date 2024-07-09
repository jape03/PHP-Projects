<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Student.css">
    <title>Student Join Event</title>
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
                <h2>Event Form</h2>
                <form action="Invoice_Join.php" method="POST" enctype="multipart/form-data">
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
                    <label for="event-name">Event Name</label>
                    <select id="event">
                        <option value="" disabled selected>SELECT Event</option>
                        <!-- Add options here from database of events created-->
                    </select>
                    <button type="submit">Join</button> <!-- Successfully Joined Message lang siguro tapos magre-reflect sa database nung Event-->
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
                            <th>No. of Participants</th>
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