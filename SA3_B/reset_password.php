<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container-wrapper">
    <div class="container">
        <?php
        session_start();

        if (!isset($_SESSION['username'])) {
            header("Location: login.php");
            exit;
        }

        $servername = "localhost"; 
        $dbUsername = "root"; 
        $dbPassword = ""; 
        $dbname = "SA3";  

        $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $username = $_SESSION['username'];
        $sql = "SELECT firstname, middlename, lastname, username, password, birthday, email, contact FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($firstname, $middlename, $lastname, $username, $password, $birthday, $email, $contact);
        $stmt->fetch();
        $stmt->close();

        echo "<h2>Welcome <strong>" . htmlspecialchars($firstname . ' ' . $middlename . ' ' . $lastname) . "</strong></h2>";
        echo "<p>Birthday: <strong>" . htmlspecialchars($birthday) . "</strong></p>";
        echo "<h2>Contact Information </h2>";
        echo "<p>Email: <strong>" . htmlspecialchars($email) . "</strong></p>";
        echo "<p>Contact Information: <strong>" . htmlspecialchars($contact) . "</strong></p>";
        ?>
    </div>
    <div class="container">
        <h2>Reset Password</h2>
        <?php

        function sanitize_input($data) {
            global $conn;
            return mysqli_real_escape_string($conn, htmlspecialchars($data));
        }

        function hash_password($password) {
            return password_hash($password, PASSWORD_DEFAULT);
        }

        function verify_password($input_password, $hashed_password) {
            return password_verify($input_password, $hashed_password);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $current_password = sanitize_input($_POST['current_password']);
            $new_password = sanitize_input($_POST['new_password']);
            $confirm_new_password = sanitize_input($_POST['confirm_new_password']);

            $sql = "SELECT password FROM users WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $stmt->bind_result($stored_password);
            $stmt->fetch();
            $stmt->close();

            if ($stored_password) {
                if (verify_password($current_password, $stored_password)) {
                    if ($new_password === $confirm_new_password) {
                        $hashed_password = hash_password($new_password);

                        $update_sql = "UPDATE users SET password = ? WHERE username = ?";
                        $stmt = $conn->prepare($update_sql);
                        $stmt->bind_param("ss", $hashed_password, $username);
                        
                        if ($stmt->execute()) {
                            echo "<p>Password updated successfully.</p>";
                        } else {
                            echo "<p>Error updating password: " . htmlspecialchars($stmt->error) . "</p>";
                        }
                        
                        $stmt->close();
                    } else {
                        echo "<p>New password and Confirm new password should be the same.</p>";
                    }
                } else {
                    echo "<p>Current password is not the same as the old password.</p>";
                }
            } else {
                echo "<p>User not found.</p>";
            }

            $conn->close();
        }
        ?>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="current_password">Enter Current Password:</label>
                <input type="password" id="current_password" name="current_password" required>
            </div>
            <div class="form-group">
                <label for="new_password">Enter New Password:</label>
                <input type="password" id="new_password" name="new_password" required>
            </div>
            <div class="form-group">
                <label for="confirm_new_password">Re-enter New Password:</label>
                <input type="password" id="confirm_new_password" name="confirm_new_password" required>
            </div>
            <button type="submit">Reset Password</button>
        </form>
        <p><a href="home.php" class="button-link">Go back to Home</a></p>
        <p><a href="logout.php" class="button-link">Logout</a></p>
    </div>
    </div>
</body>
</html>
