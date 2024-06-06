<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="f5_style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Oswald:wght@200..700&family=Poppins&display=swap" rel="stylesheet">
    <title>No - 1</title>
</head>

<body>
    <div class="main">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" value="<?php echo isset($_POST['first_name']) ? htmlspecialchars($_POST['first_name']) : ''; ?>" <?php echo isset($_POST['submitted']) ? 'readonly style="background-color: #e9e9e9;"' : ''; ?>><br><br>
            <label for="middle_name">Middle Name:</label>
            <input type="text" id="middle_name" name="middle_name" value="<?php echo isset($_POST['middle_name']) ? htmlspecialchars($_POST['middle_name']) : ''; ?>" <?php echo isset($_POST['submitted']) ? 'readonly style="background-color: #e9e9e9;"' : ''; ?>><br><br>
            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" value="<?php echo isset($_POST['last_name']) ? htmlspecialchars($_POST['last_name']) : ''; ?>" <?php echo isset($_POST['submitted']) ? 'readonly style="background-color: #e9e9e9;"' : ''; ?>><br><br>
            <label for="date_of_birth">Date of Birth:</label>
            <input type="date" id="date_of_birth" name="date_of_birth" value="<?php echo isset($_POST['date_of_birth']) ? htmlspecialchars($_POST['date_of_birth']) : ''; ?>" <?php echo isset($_POST['submitted']) ? 'readonly style="background-color: #e9e9e9;"' : ''; ?>><br><br>
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="<?php echo isset($_POST['address']) ? htmlspecialchars($_POST['address']) : ''; ?>" <?php echo isset($_POST['submitted']) ? 'readonly style="background-color: #e9e9e9;"' : ''; ?>><br><br>
            <input type="hidden" name="submitted" value="1">
            <div class="buttons">
                <input type="submit" value="Submit">
                <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"><button type="button">Edit</button></a>
            </div>
        </form>

        <?php
        if (isset($_POST['submitted']) && $_POST['submitted'] == 1) {
            if (
                !empty($_POST["first_name"]) && !empty($_POST["middle_name"]) && !empty($_POST["last_name"]) &&
                !empty($_POST["date_of_birth"]) && !empty($_POST["address"])
            ) {

                $first_name = $_POST["first_name"];
                $middle_name = $_POST["middle_name"];
                $last_name = $_POST["last_name"];
                $date_of_birth = $_POST["date_of_birth"];
                $address = $_POST["address"];

                echo "First Name: $first_name<br>";
                echo "Middle Name: $middle_name<br>";
                echo "Last Name: $last_name<br>";
                echo "Date of Birth: $date_of_birth<br>";
                echo "Address: $address<br>";
            } else {
                echo "All fields must be filled out.";
            }
        }
        ?>
    </div>
</body>

</html>