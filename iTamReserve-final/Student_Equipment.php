<?php
session_start();

// Function to create database and table if they do not exist
function createDatabaseAndTable($conn) {
    $dbName = 'iTamReserve';
    $createDbQuery = "CREATE DATABASE IF NOT EXISTS $dbName";
    if (mysqli_query($conn, $createDbQuery)) {
        mysqli_select_db($conn, $dbName);
        $tableCheck = "CREATE TABLE IF NOT EXISTS equipment (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50) UNIQUE,
            type VARCHAR(50),
            quantity INT,
            available_quantity INT
        )";
        if (!mysqli_query($conn, $tableCheck)) {
            die('Error creating table: ' . mysqli_error($conn));
        }
    } else {
        die('Error creating database: ' . mysqli_error($conn));
    }
}

// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'iTamReserve'); // Change 'root' and password accordingly
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

// Create database and table if they do not exist
createDatabaseAndTable($conn);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $firstName = mysqli_real_escape_string($conn, $_POST['first-name']);
    $lastName = mysqli_real_escape_string($conn, $_POST['last-name']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $contactNumber = mysqli_real_escape_string($conn, $_POST['contact-number']);
    $equipment = mysqli_real_escape_string($conn, $_POST['equipment']);
    $quantity = (int)mysqli_real_escape_string($conn, $_POST['quantity']);
    $borrowDate = mysqli_real_escape_string($conn, $_POST['borrow-date']);
    $returnDate = mysqli_real_escape_string($conn, $_POST['return-date']);
    $borrowTime = mysqli_real_escape_string($conn, $_POST['borrow-time']);
    $returnTime = mysqli_real_escape_string($conn, $_POST['return-time']);
    $purpose = mysqli_real_escape_string($conn, $_POST['purpose']);
    $idPicture = $_FILES['id-picture']['name'];

    // Move the uploaded file to the server
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($idPicture);
    move_uploaded_file($_FILES['id-picture']['tmp_name'], $target_file);

    // Check if there is enough available quantity
    $result = mysqli_query($conn, "SELECT available_quantity FROM equipment WHERE name='$equipment'");
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($row['available_quantity'] >= $quantity) {
            // Update the available quantity
            $new_quantity = $row['available_quantity'] - $quantity;
            $sql = "UPDATE equipment SET available_quantity='$new_quantity' WHERE name='$equipment'";
            if (mysqli_query($conn, $sql)) {
                // Store form data in session variables
                $_SESSION['invoice'] = [
                    'firstName' => $firstName,
                    'lastName' => $lastName,
                    'department' => $department,
                    'email' => $email,
                    'contactNumber' => $contactNumber,
                    'equipment' => $equipment,
                    'quantity' => $quantity,
                    'borrowDate' => $borrowDate,
                    'returnDate' => $returnDate,
                    'borrowTime' => $borrowTime,
                    'returnTime' => $returnTime,
                    'purpose' => $purpose,
                    'idPicture' => $target_file
                ];

                // Redirect to the invoice page
                header("Location: Invoice_Equipment.php");
                exit();
            } else {
                echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
            }
        } else {
            echo "<p>Not enough available quantity for $equipment.</p>";
        }
    } else {
        echo "<p>Equipment not found.</p>";
    }

    // Close connection
    mysqli_close($conn);
}
?>

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
                <form action="student.php" method="POST">
                    <button type="submit" class="home">Home</button>
                </form>
            </div>
        </header>
        <div class="main-content">
            <div class="form-section">
                <h2>Equipment Form</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
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
                    <label for="equipment">Equipment</label>
                    <select id="equipment" name="equipment" required>
                        <option value="" disabled selected>Select Equipment</option>
                        <option value="Sound System">Sound System</option>
                        <option value="Speaker">Speaker</option>
                        <option value="HDMI cord">HDMI cord</option>
                        <option value="Mouse">Mouse</option>
                        <option value="Keyboard">Keyboard</option>
                        <option value="HDMI Adapter">HDMI Adapter</option>
                        <option value="Extension Cord">Extension Cord</option>
                        <option value="Projector">Projector</option>
                    </select>
                    <label for="quantity">Quantity</label>
                    <input type="number" id="quantity" name="quantity" placeholder="Quantity" required>
                    <label for="borrow-date">Borrow Date</label>
                    <input type="date" id="borrow-date" name="borrow-date" required>
                    <label for="return-date">Return Date</label>
                    <input type="date" id="return-date" name="return-date" required>
                    <label for="borrow-time">Borrow Time</label>
                    <input type="time" id="borrow-time" name="borrow-time" required>
                    <label for="return-time">Time of Return</label>
                    <input type="time" id="return-time" name="return-time" required>
                    <label for="purpose">Purpose of Borrow</label>
                    <input type="text" id="purpose" name="purpose" placeholder="Purpose of Borrow" required>
                    <label for="id-picture">ID Picture</label>
                    <input type="file" id="id-picture" name="id-picture" accept=".jpg" required>
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
                        <?php
                        // Fetch equipment records from the database
                        $conn = mysqli_connect('localhost', 'root', '', 'iTamReserve'); // Change 'root' and password accordingly
                        if (!$conn) {
                            die('Connection failed: ' . mysqli_connect_error());
                        }

                        $result = mysqli_query($conn, "SELECT name, available_quantity FROM equipment");
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr><td>" . htmlspecialchars($row['name']) . "</td><td>" . htmlspecialchars($row['available_quantity']) . "</td></tr>";
                            }
                        } else {
                            echo "<tr><td colspan='2'>No records found</td></tr>";
                        }

                        mysqli_close($conn);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
