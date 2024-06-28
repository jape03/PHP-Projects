<?php
session_start();

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitted'])) {
    if (!empty($_POST["username"]) && !empty($_POST["password"])) {
        $username = htmlspecialchars($_POST["username"]);
        $password = htmlspecialchars($_POST["password"]);

        $_SESSION['username'] = $username;

        if (isset($_POST["remember"])) {
            setcookie("username", $username, time() + (86400 * 30), "/"); 
            setcookie("password", $password, time() + (86400 * 30), "/"); 
        } else {
            setcookie("username", "", time() - 3600, "/"); 
            setcookie("password", "", time() - 3600, "/"); 
        }

        $_SESSION['message'] = "Login Successfully!";
    } else {
        $_SESSION['message'] = "Enter both username and password.";
    }

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="t3_style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Oswald:wght@200..700&family=Poppins&display=swap" rel="stylesheet">
    <title>No - 2</title>
</head>

<body>
    <div class="main">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo isset($_COOKIE['username']) ? htmlspecialchars($_COOKIE['username']) : ''; ?>" required><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="<?php echo isset($_COOKIE['password']) ? htmlspecialchars($_COOKIE['password']) : ''; ?>" required><br><br>
            <input type="hidden" name="submitted" value="1">
            <div class="buttons">
                <span>
                    <label for="remember">Remember Me</label>
                    <input type="checkbox" id="remember" name="remember" <?php echo isset($_COOKIE['username']) ? 'checked' : ''; ?>><br><br>
                </span>
                <span>
                    <input type="submit" value="Submit">
                </span>
            </div>
        </form>

        <?php
        if (!empty($message)) {
            echo "<p>$message</p>";
        }
        ?>
    </div>
</body>

</html>
