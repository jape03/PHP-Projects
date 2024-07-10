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
                <div class="form-group">
                    <input type="text" id="email" name="email" placeholder="Email">
                    <input type="text" id="contact" name="contact" placeholder="Contact Number">
                </div>
                <button type="submit" name="action" value="Create">Create</button>
                <button type="submit" name="action" value="Back">Back</button>
                <?php
                session_start(); // Start the session at the beginning of the script

                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
                    if ($_POST['action'] === 'Back') {
                        header('Location: Start.php');
                        exit;
                    }

                    if ($_POST['action'] === 'Create') {
                        // Database connection
                        $conn = mysqli_connect('localhost', 'root', '', 'iTamReserve'); // Change credentials accordingly
                        if (!$conn) {
                            die('Connection failed: ' . mysqli_connect_error());
                        }

                        // Escape user inputs for security
                        $first_name = mysqli_real_escape_string($conn, $_POST['fname']);
                        $last_name = mysqli_real_escape_string($conn, $_POST['lname']);
                        $user_id = mysqli_real_escape_string($conn, $_POST['ID']);

                        // Validate accesslevel
                        $access_level = '';
                        if (isset($_POST['accesslevel'])) {
                            $access_level = mysqli_real_escape_string($conn, $_POST['accesslevel']);
                        } else {
                            echo "<div class='error-message'><p>Please fill out all required fields.</p></div>";
                            exit; // Stop further execution if access level is not set
                        }

                        $password = mysqli_real_escape_string($conn, $_POST['password']);
                        $email = mysqli_real_escape_string($conn, $_POST['email']);
                        $contact = mysqli_real_escape_string($conn, $_POST['contact']);

                        // Check if all required fields are filled
                        if (empty($first_name) || empty($last_name) || empty($user_id) || empty($access_level) || empty($password) || empty($email) || empty($contact)) {
                            echo "<div class='error-message'><p>Please fill out all required fields.</p></div>";
                        } else {
                            // Check if user_id already exists
                            $check_query = "SELECT user_id FROM users WHERE user_id = '$user_id'";
                            $check_result = mysqli_query($conn, $check_query);
                            if (mysqli_num_rows($check_result) > 0) {
                                echo "<div class='error-message'><p>Error: User ID '$user_id' already exists. Please choose a different ID.</p></div>";
                            } else {
                                // Attempt insert query execution
                                $sql = "INSERT INTO users (first_name, last_name, user_id, access_level, password, email, contact_number) 
                                        VALUES ('$first_name', '$last_name', '$user_id', '$access_level', '$password', '$email', '$contact')";

                                if (mysqli_query($conn, $sql)) {
                                    echo "<div class='success-message'><p>Account created successfully!</p></div>";
                                } else {
                                    echo "<div class='error-message'><p>ERROR: Could not able to execute $sql. " . mysqli_error($conn) . "</p></div>";
                                }
                            }
                        }

                        // Close connection
                        mysqli_close($conn);
                    }
                }
                ?>
            </form>
        </div>
    </div>
</body>

</html>