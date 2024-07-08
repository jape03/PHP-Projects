<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Admin</title>

</head>

<body>
    <div class="main">
        <div class="admin-button">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <h1>Hello, Admin!</h1>
                <button type="submit" name="action" value="Reserve Facility">Reserve Facility</button>
                <button type="submit" name="action" value="Borrow Equipment">Borrow Equipment</button>
                <button type="submit" name="action" value="Create Event">Create Event</button>
                <button type="submit" name="action" value="Logout">Logout</button>
        </div>
        </form>
    </div>
</body>
<?php
if (isset($_POST['action']) && $_POST['action'] === 'Reserve Facility') {
    header('Location: Admin_Facility.php');
    exit;
} elseif (isset($_POST['action']) && $_POST['action'] === 'Borrow Equipment') {
    header('Location: Admin_Equipment.php');
    exit;
} elseif (isset($_POST['action']) && $_POST['action'] === 'Create Event') {
    header('Location: Admin_Event.php');
    exit;
} elseif (isset($_POST['action']) && $_POST['action'] === 'Logout') {
    header('Location: Login.php');
    exit;
}

?>

</html>