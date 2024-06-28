<?php
session_start();

$host = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'registration';

$conn = new mysqli($host, $dbUser, $dbPass, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['username'])) {
    header("Location: actB_no2.php");
    exit;
}

$username = $_SESSION['username'];

$userDetails = $conn->prepare("SELECT date_of_birth, email, contact_number FROM users WHERE username = ?");
$userDetails->bind_param("s", $username);
$userDetails->execute();
$result = $userDetails->get_result();
$user = $result->fetch_assoc();

$message = '';

// LOGIC TO CHANGE THE PASSWORD of the user

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: actB_no2.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="t3_style.css">
    <title>Home</title>
</head>
<body>
    <div class="main">
        <h1>Welcome, <?php echo htmlspecialchars($username); ?>!</h1>
        <p>Birthday: <?php echo htmlspecialchars($user['date_of_birth']); ?></p>
        <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
        <p>Contact Number: <?php echo htmlspecialchars($user['contact_number']); ?></p>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="currentPassword">Current Password:</label>
            <input type="password" id="currentPassword" name="currentPassword" required><br><br>
            <label for="newPassword">New Password:</label>
            <input type="password" id="newPassword" name="newPassword" required><br><br>
            <label for="confirmNewPassword">Confirm New Password:</label>
            <input type="password" id="confirmNewPassword" name="confirmNewPassword" required><br><br>
            <input type="submit" name="updatePassword" value="Update Password">
        </form>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <input type="submit" name="logout" value="Log Out">
        </form>

        <?php if (!empty($message)) echo "<p>$message</p>"; ?>
    </div>
</body>
</html>
