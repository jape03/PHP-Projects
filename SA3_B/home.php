<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

echo "<div class='container'>";
echo "<h2>Welcome, " . htmlspecialchars($_SESSION['username']) . "!</h2>";
echo "<p>You have successfully accessed our website. Get started!</p>";
echo "<p><a href='logout.php' class='button-link'>Logout</a></p>";
echo "<p><a href='reset_password.php' class='button-link'>Reset Password</a></p>";
echo "</div>";

?>

</body>
</html>
