<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="actA.css">
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
echo "<p>Your visit to our website has been successful. Start now! </p>";
echo "<a href='logout.php'>Logout</a>";
echo "</div>";
?>

</body>
</html>
