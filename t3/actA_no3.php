<?php
session_start();

$static_user = "jypy03";
$static_pass = "123";

if (isset($_SESSION['username'])) {
    header("Location: home.php"); 
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $static_user && $password === $static_pass) {
        $_SESSION['username'] = $username; 
        header("Location: home.php"); 
        exit;
    } else {
        $error = "Invalid username or password!";
    }

    if (isset($_POST["remember"]) && $_POST["remember"] === 'on') {
        setcookie("username", $username, time() + (86400 * 30), "/"); 
        setcookie("password", $password, time() + (86400 * 30), "/"); 
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="t3_style.css">
    <title>Login</title>
</head>
<body>
    <div class="main">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
            <div class="buttons">
                <span>
                    <label for="remember">Remember Me</label>
                    <input type="checkbox" id="remember" name="remember"><br><br>
                </span>
                <span>
                    <input type="submit" value="Submit">
                </span>
                <span>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"><button type="button">Edit</button></a>
                </span>
            </div>
            <?php if (!empty($error)) echo "<p>$error</p>"; ?>
        </form>
    </div>
</body>
</html>
