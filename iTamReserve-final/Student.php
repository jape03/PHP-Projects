<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="student.css">
    <title>Student</title>
</head>

<body>
<?php
    session_start(); // Start or resume an existing session
    if (!isset($_SESSION['user_id'])) {
        // If no session user ID exist, redirect to login page
        header('Location: Login.php');
        exit;
    }
    ?>
    <div class="main">
        <div class="student-button">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <h1>Hello, <?php echo $_SESSION['full_name']; ?>!</h1>
                <button type="submit" name="action" value="Reserve Facility">Reserve Facility</button>
                <button type="submit" name="action" value="Borrow Equipment">Borrow Equipment</button>
                <button type="submit" name="action" value="Join Event">Join Event</button>
                <button type="submit" name="action" value="Logout">Logout</button>
        </div>
        </form>
    </div>
</body>
<?php
if (isset($_POST['action']) && $_POST['action'] === 'Reserve Facility') {
    header('Location: Student_Facility.php');
    exit;
} elseif (isset($_POST['action']) && $_POST['action'] === 'Borrow Equipment') {
    header('Location: Student_Equipment.php');
    exit;
} elseif (isset($_POST['action']) && $_POST['action'] === 'Join Event') {
    header('Location: Student_Join.php');
    exit;
} elseif (isset($_POST['action']) && $_POST['action'] === 'Logout') {
    header('Location: Login.php');
    exit;
}

?>

</html>