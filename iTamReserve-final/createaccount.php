<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Create Account</title>
</head>
<body>
    <div class="main">
        <div class="create-form">
            <h1>Create Account Form</h1>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <div class="form-group">
                    <input type="text" id="fname" name="fname" placeholder="First Name">
                    <input type="text" id="lname" name="lname" placeholder="Last Name">
                </div>
                <div class="form-group">
                    <div style="display: inline-block;">
                        <input type="text" id="ID" name="ID" placeholder="ID Number">
                    </div>
                    <div style="display: inline-block;">
                        <select id="accesslevel" name="accesslevel">
                            <option value="" disabled selected>Access Level</option>
                            <option value="Admin">Admin</option>
                            <option value="Student">Student</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <input type="password" id="password" name="password" placeholder="Password">
                    <input type="password" id="confirmpass" name="confirmpass" placeholder="Confirm Password">
                </div>
                <input type="text" id="email" name="email" placeholder="Email">
                <input type="text" id="contact" name="contact" placeholder="Contact Number">
                <button type="submit" name="action" value="Create">Create</button>
                <button type="submit" name="action" value="Back">Back</button>
            </form>
        </div>
    </div>
</body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
    if ($_POST['action'] === 'Back') {
        header('Location: Start.php');
        exit;
    }

    if ($_POST['action'] === 'Create') {
        // Attempt initial connection without specifying a database
        $conn = mysqli_connect('localhost', 'root', ''); // Change 'root' and password accordingly
        if (!$conn) {
            die('Connection failed: ' . mysqli_connect_error());
        }

        // Create database if it does not exist
        $dbName = 'iTamReserve'; // Specify the database name
        $createDbQuery = "CREATE DATABASE IF NOT EXISTS $dbName";
        if (mysqli_query($conn, $createDbQuery)) {
            mysqli_select_db($conn, $dbName); // Select the new database

            // Check if table exists and create if not
            $tableCheck = "CREATE TABLE IF NOT EXISTS users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                first_name VARCHAR(50),
                last_name VARCHAR(50),
                user_id VARCHAR(50) UNIQUE,
                access_level VARCHAR(20),
                password VARCHAR(255),
                email VARCHAR(100),
                contact_number VARCHAR(15)
            )";
            if (!mysqli_query($conn, $tableCheck)) {
                die('Error creating table: ' . mysqli_error($conn));
            }
        } else {
            die('Error creating database: ' . mysqli_error($conn));
        }

        // Escape user inputs for security
        $first_name = mysqli_real_escape_string($conn, $_POST['fname']);
        $last_name = mysqli_real_escape_string($conn, $_POST['lname']);
        $user_id = mysqli_real_escape_string($conn, $_POST['ID']);
        $access_level = mysqli_real_escape_string($conn, $_POST['accesslevel']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $contact = mysqli_real_escape_string($conn, $_POST['contact']);

        // Attempt insert query execution
        $sql = "INSERT INTO users (first_name, last_name, user_id, access_level, password, email, contact_number) VALUES ('$first_name', '$last_name', '$user_id', '$access_level', '$password', '$email', '$contact')";
        if (mysqli_query($conn, $sql)) {
            echo "<p>Account created successfully!</p>";
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }

        // Close connection
        mysqli_close($conn);
    }
}
?>

</html>
