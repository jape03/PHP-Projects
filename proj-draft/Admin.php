<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Admin</title>
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
        <div class="admin-button">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <h1>Hello, <?php echo $_SESSION['full_name']; ?>!</h1>
                <button type="submit" name="action" value="Reserve Facility">Reserve Facility</button>
                <button type="submit" name="action" value="Borrow Equipment">Borrow Equipment</button>
                <button type="submit" name="action" value="Create Event">Create Event</button>
                <button type="submit" name="action" value="Logout">Logout</button>
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'Reserve Facility':
                header('Location: Admin_Facility.php');
                exit;
            case 'Borrow Equipment':
                header('Location: Admin_Equipment.php');
                exit;
            case 'Create Event':
                header('Location: Admin_Event.php');
                exit;
            case 'Logout':
                session_unset();
                session_destroy();
                header('Location: Login.php');
                exit;
        }
    }
    ?>
</body>

</html>
