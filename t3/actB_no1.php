<?php
session_start();

$host = 'localhost';
$dbUser = 'root';
$dbPass = '';

$conn = new mysqli($host, $dbUser, $dbPass);

if ($conn->connect_error) {
    die("Initial connection failed: " . $conn->connect_error);
}

$dbName = 'registration';
$createDbQuery = "CREATE DATABASE IF NOT EXISTS $dbName";
if ($conn->query($createDbQuery) === TRUE) {
    $conn->select_db($dbName);

    $createTableQuery = "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        first_name VARCHAR(50) NOT NULL,
        middle_name VARCHAR(50),
        last_name VARCHAR(50) NOT NULL,
        username VARCHAR(50) NOT NULL UNIQUE,
        pass VARCHAR(255) NOT NULL,
        date_of_birth DATE NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        contact_number VARCHAR(20) NOT NULL
    )";

    if ($conn->query($createTableQuery) !== TRUE) {
        die("Error creating table: " . $conn->error);
    }
} else {
    die("Error creating database: " . $conn->error);
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitted'])) {
    $first_name = $conn->real_escape_string($_POST["first_name"]);
    $middle_name = $conn->real_escape_string($_POST["middle_name"]);
    $last_name = $conn->real_escape_string($_POST["last_name"]);
    $username = $conn->real_escape_string($_POST["username"]);
    $pass = $conn->real_escape_string($_POST["pass"]);
    $confirm_pass = $conn->real_escape_string($_POST["confirm_pass"]);
    $date_of_birth = $conn->real_escape_string($_POST["date_of_birth"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $contact_number = $conn->real_escape_string($_POST["contact_number"]);

    if ($pass === $confirm_pass) {
        $sql = "INSERT INTO users (first_name, middle_name, last_name, username, pass, date_of_birth, email, contact_number) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssss", $first_name, $middle_name, $last_name, $username, $pass, $date_of_birth, $email, $contact_number);

        try {
            if ($stmt->execute()) {
                $message = "Registration successful!";
            } else {
                throw new Exception("Database error: " . $stmt->error);
            }
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() == 1062) { 
                $message = "User already exists.";
            } else {
                $message = $e->getMessage();
            }
        }
        $stmt->close();
    } else {
        $message = "Password and Confirm Password are not the same.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="t3_style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Oswald:wght@200..700&family=Poppins&display=swap" rel="stylesheet">
    <title>No - 1</title>
</head>

<body>
    <div class="main">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" value="<?php echo isset($_POST['first_name']) ? htmlspecialchars($_POST['first_name']) : ''; ?>" required><br><br>
            <label for="middle_name">Middle Name:</label>
            <input type="text" id="middle_name" name="middle_name" value="<?php echo isset($_POST['middle_name']) ? htmlspecialchars($_POST['middle_name']) : ''; ?>" required><br><br>
            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" value="<?php echo isset($_POST['last_name']) ? htmlspecialchars($_POST['last_name']) : ''; ?>" required><br><br>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>" required><br><br>
            <label for="password">Password:</label>
            <input type="password" id="pass" name="pass" required><br><br>
            <label for="confirm_pass">Confirm password:</label>
            <input type="password" id="confirm_pass" name="confirm_pass" required><br><br>
            <label for="date_of_birth">Date of Birth:</label>
            <input type="date" id="date_of_birth" name="date_of_birth" value="<?php echo isset($_POST['date_of_birth']) ? htmlspecialchars($_POST['date_of_birth']) : ''; ?>" required><br><br>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required><br><br>
            <label for="contact_number">Contact Number:</label>
            <input type="text" id="contact_number" name="contact_number" value="<?php echo isset($_POST['contact_number']) ? htmlspecialchars($_POST['contact_number']) : ''; ?>" required><br><br>
            <input type="hidden" name="submitted" value="1">
            <div class="buttons">
                <input type="submit" value="Submit">
                <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"><button type="button">Edit</button></a>
            </div>
        </form>
        <?php
        if (!empty($message)) {
            echo "<p>$message</p>";
        }
        ?>
    </div>
</body>

</html>