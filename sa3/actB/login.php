<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="actB.css">
</head>
<body>
    <div class="container">
        <h2>Welcome!</h2>
        <form method="POST" action="login.php">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <input type="checkbox" id="remember_me" name="remember_me">
                <label for="remember_me">Remember Me</label>
            </div>
            <button type="submit">Login</button>
        </form>
        <div id="result">
        <?php
            session_start();

            $servername = "localhost"; 
            $username = "root"; 
            $password = ""; 
            $dbname = "SA3"; 

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $remember_me = isset($_POST['remember_me']);

                $stmt = $conn->prepare("SELECT username, password FROM users WHERE username = ?");
                if ($stmt === false) {
                    die("Prepare failed: " . htmlspecialchars($conn->error));
                }
                $stmt->bind_param("s", $username);

                $stmt->execute();

                $stmt->bind_result($db_username, $db_password);

                if ($stmt->fetch()) {
                    if (password_verify($password, $db_password)) {
                        $_SESSION['username'] = $username;

                        if ($remember_me) {
                            setcookie('username', $username, time() + (86400 * 30), "/");
                            setcookie('password', $password, time() + (86400 * 30), "/");
                        }

                        header("Location: home.php");
                        exit;
                    } else {
                        echo "<p class='error'>Invalid password</p>";
                    }
                } else {
                    echo "<p class='error'>Username not found</p>";
                }

                $stmt->close();
                $conn->close();
            }
            ?>
        </div>
        <a href="register.php">Register here</a>
    </div>
</body>
</html>
