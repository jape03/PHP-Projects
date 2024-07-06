<?php
session_start();

$host = 'localhost';
$user_db = 'root';
$pass_db = '';
$name_db = 't7';

$conn = new mysqli($host, $user_db, $pass_db, $name_db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];

$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();
$stmt->close();

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_pass'])) {
    $current_pass = $_POST['current_pass'];
    $new_pass = $_POST['new_pass'];
    $confirm_new_pass = $_POST['confirm_new_pass'];

    if ($current_pass !== $user['pass']) {
        $message = "Current password is not correct.";
    } elseif ($new_pass !== $confirm_new_pass) {
        $message = "New password and Confirm new password must be the same.";
    } else {
        $update_pass = $conn->prepare("UPDATE users SET pass = ? WHERE username = ?");
        $update_pass->bind_param("ss", $new_pass, $username);
        if ($update_pass->execute()) {
            $message = "Password successfully updated!";
        } else {
            $message = "Failed to update password.";
        }
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
    <title>Reset Password - Admin</title>
</head>
<body>
    <div class="main">
        <h1>Welcome, <?php echo htmlspecialchars($username); ?>!</h1>
        <p>Birthday: <?php echo htmlspecialchars($user['birthday']); ?></p>
        <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
        <p>Contact Number: <?php echo htmlspecialchars($user['contact_number']); ?></p>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="current_pass">Current Password:</label>
            <input type="password" id="current_pass" name="current_pass" required><br><br>
            <label for="new_pass">New Password:</label>
            <input type="password" id="new_pass" name="new_pass" required><br><br>
            <label for="confirm_new_pass">Confirm New Password:</label>
            <input type="password" id="confirm_new_pass" name="confirm_new_pass" required><br><br>
            <input type="submit" name="update_pass" value="Update Password">
            <a href="admin_home.php"><button type="button">Back</button></a>
        </form>
        <?php if (!empty($message)) echo "<p>$message</p>"; ?>
    </div>
</body>
</html>
