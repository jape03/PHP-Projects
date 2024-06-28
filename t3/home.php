<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: actA_no3.php");
    exit;
}

$username = $_SESSION['username'];

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
        <div class="buttons">
            <a href="logout.php"><button type="button">Log Out</button></a>
        </div>
    </div>
</body>
</html>
