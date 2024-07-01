<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="icon" type="image/png"
href="https://i.pinimg.com/564x/a5/71/1a/a5711a9ff4b107f56a6023b4cdb67a62.jpg">
    <link rel="stylesheet" href="actA.css">
</head>
<body>
<div class="container-wrapper">
    <div class="container">
        <h2>Registration</h2>
        <form method="POST" action="register.php">
            <div class="form-group">
                <label for="firstname">First Name:</label>
                <input type="text" id="firstname" name="firstname" required>
            </div>
            <div class="form-group">
                <label for="middlename">Middle Name:</label>
                <input type="text" id="middlename" name="middlename" required>
            </div>
            <div class="form-group">
                <label for="lastname">Last Name:</label>
                <input type="text" id="lastname" name="lastname" required>
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <div class="form-group">
                <label for="birthday">Birthday:</label>
                <input type="date" id="birthday" name="birthday" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="contact">Contact Number:</label>
                <input type="tel" id="contact" name="contact" required>
            </div>
            <button type="submit">Register</button>
        </form> 

        <p>Already have an account? Go back to <a href="login.php">Login Page</a></p>

        <div id="result">
            <?php
            session_start();

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $firstname = $_POST['firstname'];
                $middlename = $_POST['middlename'];
                $lastname = $_POST['lastname'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $confirm_password = $_POST['confirm_password'];
                $birthday = $_POST['birthday'];
                $email = $_POST['email'];
                $contact = $_POST['contact'];

                if ($password !== $confirm_password) {
                    echo "<p class='error'>Password and Confirm Password are not the same.</p>";
                } else {
                    $_SESSION['registered_users'][$username] = password_hash($password, PASSWORD_DEFAULT);
                    echo "<p>Registration successful! You can now <a href='login.php'>login</a>.</p>";
                }
            }
            ?>
        </div>
    </div>

    <div class="container">
        <h2>Registration Information</h2>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $password === $confirm_password) {
            echo "<p>Full Name: <strong>" . htmlspecialchars($firstname . ' ' . $middlename . ' ' . $lastname) . "</strong></p>";
            echo "<p>Username: <strong>" . htmlspecialchars($username) . "</strong></p>";
            echo "<p>Password: <strong>" . htmlspecialchars($password) . "</strong></p>";
            echo "<p>Birthday: <strong>" . htmlspecialchars($birthday) . "</strong></p>";
            echo "<p>Email: <strong>" . htmlspecialchars($email) . "</strong></p>";
            echo "<p>Contact Information: <strong>" . htmlspecialchars($contact) . "</strong></p>";
        }
        ?>
    </div>

    </div>
</body>
</html>
