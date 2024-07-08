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
    </div>
</body>

<?php
if (isset($_POST['action']) && $_POST['action'] === 'Back') {
    header('Location: Start.php');
    exit;
}
?>

</html>