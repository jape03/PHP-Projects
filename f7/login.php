<?php
session_start();

$host = 'localhost';
$user_db = 'root';
$pass_db = '';
$name_db = 'registration_f7';

$conn = new mysqli($host, $user_db, $pass_db, $name_db);

if ($conn->connect_error) {
    die("Connection failed " . $conn->connect_error);
}

$message = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitted'])) {
    $username = $conn->real_escape_string($_POST["username"]);
    $pass = $conn->real_escape_string($_POST["pass"]);

    if (!empty($username) && !empty($pass)) {
        $sql = "SELECT userlevel FROM users WHERE username = ? AND pass = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $pass);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $_SESSION['username'] = $username;
            if ($row['userlevel'] == 'admin') {
                header("Location: admin.php");
            } else {
                header("Location: user.php");
            }
            exit;
        } else {
            $message = "Username or password does not match.";
        }
        $stmt->close();
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
    <title>No - 2</title>
</head>
<body>
    <div class="main">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>
            <label for="pass">Password:</label>
            <input type="password" id="pass" name="pass" required><br><br>
            <input type="hidden" name="submitted" value="1">
            <div class="buttons">
                <input type="submit" value="Submit">
            </div>
        </form>
        <?php if (!empty($message)) echo "<p>$message</p>"; ?>
    </div>
</body>
</html>
