<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="t3_style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Oswald:wght@200..700&family=Poppins&display=swap" rel="stylesheet">
    <title>No - 1</title>
</head>

<body>
    <div class="main">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" value="<?php echo isset($_POST['first_name']) ? htmlspecialchars($_POST['first_name']) : ''; ?>" <?php echo isset($_POST['submitted']) ? 'readonly style="background-color: #e9e9e9;"' : ''; ?> required><br><br>
            <label for="middle_name">Middle Name:</label>
            <input type="text" id="middle_name" name="middle_name" value="<?php echo isset($_POST['middle_name']) ? htmlspecialchars($_POST['middle_name']) : ''; ?>" <?php echo isset($_POST['submitted']) ? 'readonly style="background-color: #e9e9e9;"' : ''; ?> required><br><br>
            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" value="<?php echo isset($_POST['last_name']) ? htmlspecialchars($_POST['last_name']) : ''; ?>" <?php echo isset($_POST['submitted']) ? 'readonly style="background-color: #e9e9e9;"' : ''; ?> required><br><br>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>" <?php echo isset($_POST['submitted']) ? 'readonly style="background-color: #e9e9e9;"' : ''; ?> required><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="<?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password']) : ''; ?>" <?php echo isset($_POST['submitted']) ? 'readonly style="background-color: #e9e9e9;"' : ''; ?> required><br><br>
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" value="<?php echo isset($_POST['confirm_password']) ? htmlspecialchars($_POST['confirm_password']) : ''; ?>" <?php echo isset($_POST['submitted']) ? 'readonly style="background-color: #e9e9e9;"' : ''; ?> required><br><br>
            <label for="date_of_birth">Date of Birth:</label>
            <input type="date" id="date_of_birth" name="date_of_birth" value="<?php echo isset($_POST['date_of_birth']) ? htmlspecialchars($_POST['date_of_birth']) : ''; ?>" <?php echo isset($_POST['submitted']) ? 'readonly style="background-color: #e9e9e9;"' : ''; ?> required><br><br>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" <?php echo isset($_POST['submitted']) ? 'readonly style="background-color: #e9e9e9;"' : ''; ?> required><br><br>
            <label for="contact_number">Contact Number:</label>
            <input type="text" id="contact_number" name="contact_number" value="<?php echo isset($_POST['contact_number']) ? htmlspecialchars($_POST['contact_number']) : ''; ?>" <?php echo isset($_POST['submitted']) ? 'readonly style="background-color: #e9e9e9;"' : ''; ?> required><br><br>
            <input type="hidden" name="submitted" value="1">
            <div class="buttons">
                <input type="submit" value="Submit">
                <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"><button type="button">Edit</button></a>
            </div>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (!empty($_POST["first_name"]) && !empty($_POST["middle_name"]) && !empty($_POST["last_name"]) &&
                !empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["confirm_password"]) &&
                !empty($_POST["date_of_birth"]) && !empty($_POST["email"]) && !empty($_POST["contact_number"])) {

                $first_name = htmlspecialchars($_POST["first_name"]);
                $middle_name = htmlspecialchars($_POST["middle_name"]);
                $last_name = htmlspecialchars($_POST["last_name"]);
                $username = htmlspecialchars($_POST["username"]);
                $password = htmlspecialchars($_POST["password"]);
                $confirm_password = htmlspecialchars($_POST["confirm_password"]);
                $date_of_birth = htmlspecialchars($_POST["date_of_birth"]);
                $email = htmlspecialchars($_POST["email"]);
                $contact_number = htmlspecialchars($_POST["contact_number"]);

                if ($password === $confirm_password) {
                    $date = explode('-', $date_of_birth);
                    $formatted_date = $date[1] . '/' . $date[2] . '/' . $date[0];

                    echo "First Name: $first_name<br>";
                    echo "Middle Name: $middle_name<br>";
                    echo "Last Name: $last_name<br>";
                    echo "Username: $username<br>";
                    echo "Password: $password <br>";
                    echo "Date of Birth: $formatted_date<br>";
                    echo "Email: $email<br>";
                    echo "Contact Number: $contact_number<br>";
                } else {
                    echo "Password and Confirm Password are not the same.<br>";
                }
            }
        }
        ?>

    </div>
</body>

</html>
