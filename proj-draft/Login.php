<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>

<body>
    <div class="main">
        <div class="login-form">
            <h1>Login</h1>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <input type="text" name="user_id" placeholder="User ID"><br>
                <input type="password" name="password" placeholder="Password"><br>
                <button type="submit" name="action" value="Login">Login</button>
            </form>
        </div>
    </div>

    <?php
    session_start(); // Start the session at the beginning of the script

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] === 'Login') {
        // Database connection
        $conn = mysqli_connect('localhost', 'root', '', 'iTamReserve'); // Change credentials accordingly
        if (!$conn) {
            die('Connection failed: ' . mysqli_connect_error());
        }

        // Escape user inputs for security
        $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        // Attempt select query execution to check credentials
        $sql = "SELECT access_level, password, first_name, last_name FROM users WHERE user_id = '$user_id'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            // Check if the password matches (stored in plain text)
            if ($password === $row['password']) {
                // Store data in session variables
                $_SESSION['user_id'] = $user_id;
                $_SESSION['access_level'] = $row['access_level'];
                $_SESSION['full_name'] = $row['first_name'] . ' ' . $row['last_name'];

                // Check access level and redirect
                if ($row['access_level'] == 'Admin') {
                    header('Location: Admin.php');
                    exit();
                } elseif ($row['access_level'] == 'Student') {
                    header('Location: Student.php');
                    exit();
                } else {
                    echo "<p>Access Denied: Unknown access level.</p>";
                }
            } else {
                echo "<p>Invalid user ID or password.</p>";
            }
        } else {
            echo "<p>Invalid user ID or password.</p>";
        }

        // Close connection
        mysqli_close($conn);
    }
    ?>

</body>

</html>
