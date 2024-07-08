<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>iTamReserve</title>
</head>

<body>
    <div class="main">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="button-container">
                <button type="submit" name="action" value="Login">Login</button>
                <button type="submit" name="action" value="Create Account">Create Account</button>
            </div>
        </form>
    </div>
</body>

<?php

if (isset($_POST['action']) && $_POST['action'] === 'Login') {
    header('Location: Login.php');
    exit;
} elseif (isset($_POST['action']) && $_POST['action'] === 'Create Account') {
    header('Location: createaccount.php');
    exit;
}
?>

</html>