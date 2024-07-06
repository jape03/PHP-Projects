<?php
session_start();

$host = 'localhost';
$user_db = 'root';
$pass_db = '';

$conn = new mysqli($host, $user_db, $pass_db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name_db = 't7';

$create_db = "CREATE DATABASE IF NOT EXISTS $name_db";

if ($conn->query($create_db) === TRUE) {
    $conn->select_db($name_db);

    $create_table = "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        first_name VARCHAR(50) NOT NULL,
        middle_name VARCHAR(50),
        last_name VARCHAR(50) NOT NULL,
        username VARCHAR(50) NOT NULL UNIQUE,
        pass VARCHAR(255) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        birthday DATE NOT NULL,
        contact_number VARCHAR(20) NOT NULL,
        userlevel ENUM('admin', 'user') NOT NULL DEFAULT 'user',
        status ENUM('active', 'inactive') NOT NULL DEFAULT 'inactive'
    )";

    if ($conn->query($create_table) !== TRUE) {
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
    $birthday = $conn->real_escape_string($_POST["birthday"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $contact_number = $conn->real_escape_string($_POST["contact_number"]);
    $userlevel = $conn->real_escape_string($_POST["userlevel"]);
    $status = $conn->real_escape_string($_POST["status"]);

    if ($pass === $confirm_pass) {
        $sql = "INSERT INTO users (first_name, middle_name, last_name, username, pass, birthday, email, contact_number, userlevel, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssssss", $first_name, $middle_name, $last_name, $username, $pass, $birthday, $email, $contact_number, $userlevel, $status);

        try {
            if ($stmt->execute()) {
                $message = "Registration successful!";
            } else {
                throw new Exception("Database error: " . $stmt->error);
            }
        } catch (mysqli_sql_exception $e) {
            if ($e->getCode() == 1062) {
                $message = "User already exists!";
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
    <link rel="stylesheet" href="t7_style.css">
    <title>Add User</title>
</head>

<body>
    <div class="main">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="form-row">
                <div class="form-group half">
                    <label for="first_name">First Name:</label>
                    <input type="text" id="first_name" name="first_name" required>
                </div>
                <div class="form-group half">
                    <label for="middle_name">Middle Name:</label>
                    <input type="text" id="middle_name" name="middle_name">
                </div>
                <div class="form-group half">
                    <label for="last_name">Last Name:</label>
                    <input type="text" id="last_name" name="last_name" required>
                </div>
                <div class="form-group half">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group half">
                    <label for="pass">Password:</label>
                    <input type="password" id="pass" name="pass" required>
                </div>
                <div class="form-group half">
                    <label for="confirm_pass">Confirm Password:</label>
                    <input type="password" id="confirm_pass" name="confirm_pass" required>
                </div>
                <div class="form-group half">
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" required>
                </div>
                <div class="form-group half">
                    <label for="birthday">Birthday:</label>
                    <input type="date" id="birthday" name="birthday" required>
                </div>
                <div class="form-group half">
                    <label for="contact_number">Contact Number:</label>
                    <input type="text" id="contact_number" name="contact_number" required>
                </div>
                <div class="form-group half">
                    <label for="userlevel">User Level:</label>
                    <select id="userlevel" name="userlevel" required>
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <div class="form-group half">
                    <label for="status">Status:</label>
                    <select id="status" name="status" required>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
            </div>
            <input type="hidden" name="submitted" value="1">
            <div class="buttons">
                <input type="submit" value="Submit">
                <a href="admin_home.php"><button type="button">Back</button></a>
            </div>
            <?php if (!empty($message)) {
                $color = ($message === "Registration successful!") ? 'green' : 'red';
                echo "<p style='color: {$color}; text-align: center; margin-top: 20px;'>$message</p>";
            } ?>
        </form>
    </div>
</body>

</html>