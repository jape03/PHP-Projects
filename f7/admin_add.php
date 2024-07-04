<?php
session_start();

$host = 'localhost';
$user_db = 'root';
$pass_db = '';

$conn = new mysqli($host, $user_db, $pass_db);

if ($conn->connect_error) {
    die("Connection failed " . $conn->connect_error);
}

$name_db = 'registration_f7';

$create_db = "CREATE DATABASE IF NOT EXISTS $name_db";

if ($conn->query($create_db) === TRUE) {
    $conn->select_db($name_db);

    $create_table = "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL UNIQUE,
        pass VARCHAR(255) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        userlevel ENUM('admin', 'user') NOT NULL DEFAULT 'user',
        status ENUM('active', 'inactive') NOT NULL DEFAULT 'inactive'
    )";

    if ($conn->query($create_table) !== TRUE) {
        die("Error creating table " . $conn->error);
    }
} else {
    die("Error creating database " . $conn->error);
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitted'])) {
    $username = $conn->real_escape_string($_POST["username"]);
    $pass = $conn->real_escape_string($_POST["pass"]);
    $confirm_pass = $conn->real_escape_string($_POST["confirm_pass"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $userlevel = $conn->real_escape_string($_POST["userlevel"]);
    $status = $conn->real_escape_string($_POST["status"]);

    if ($pass === $confirm_pass) {
        $sql = "INSERT INTO users (username, pass, email, userlevel, status) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $username, $pass, $email, $userlevel, $status);

        try {
            if ($stmt->execute()) {
                $message = "Registration successful!";
            } else {
                throw new Exception("Database error " . $stmt->error);
            }
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() == 1062) { 
                $message = "User already exists! ";
            } else {
                $message = $e->getMessage();
            }
        }
        $stmt->close();
    } else {
        $message = "Password and Confirm Password must be the same.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="f7_style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Oswald:wght@200..700&family=Poppins&display=swap" rel="stylesheet">
    <title>No - 1</title>
</head>

<body>
    <div class="main">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>" required><br><br>
            <label for="password">Password:</label>
            <input type="password" id="pass" name="pass" required><br><br>
            <label for="confirm_pass">Confirm Password:</label>
            <input type="password" id="confirm_pass" name="confirm_pass" required><br><br>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required><br><br>
            <label for="userlevel">User Level:</label>
            <select id="userlevel" name="userlevel" required>
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select><br><br>
            <label for="status">Status:</label>
            <select id="status" name="status" required>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select><br><br>
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
