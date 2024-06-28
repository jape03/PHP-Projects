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
                    <input type="checkbox" id="remember" name="remember"><br><br>
                </span>
                <span>
                    <input type="submit" value="Submit">
                </span>
                <span>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"><button type="button">Edit</button></a>
                </span>
            </div>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!empty($_POST["username"]) && !empty($_POST["password"])) {
                $username = htmlspecialchars($_POST["username"]);
                $password = htmlspecialchars($_POST["password"]);

                if (isset($_POST["remember"])) {
                    setcookie("username", $username, time() + (86400 * 30), "/"); // 86400 = 1 day
                    setcookie("password", $password, time() + (86400 * 30), "/"); // 86400 = 1 day
                }

                echo "Username: $username<br>";
                echo "Password: $password<br>";
            }
        }
        ?>

    </div>
</body>

</html>
