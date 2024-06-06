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
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" value="<?php echo isset($_GET['first_name']) ? htmlspecialchars($_GET['first_name']) : ''; ?>" <?php echo isset($_GET['submitted']) ? 'readonly style="background-color: #e9e9e9;"' : ''; ?>><br><br>
            <label for="middle_name">Middle Name:</label>
            <input type="text" id="middle_name" name="middle_name" value="<?php echo isset($_GET['middle_name']) ? htmlspecialchars($_GET['middle_name']) : ''; ?>" <?php echo isset($_GET['submitted']) ? 'readonly style="background-color: #e9e9e9;"' : ''; ?>><br><br>
            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" value="<?php echo isset($_GET['last_name']) ? htmlspecialchars($_GET['last_name']) : ''; ?>" <?php echo isset($_GET['submitted']) ? 'readonly style="background-color: #e9e9e9;"' : ''; ?>><br><br>
            <label for="date_of_birth">Date of Birth:</label>
            <input type="date" id="date_of_birth" name="date_of_birth" value="<?php echo isset($_GET['date_of_birth']) ? htmlspecialchars($_GET['date_of_birth']) : ''; ?>" <?php echo isset($_GET['submitted']) ? 'readonly style="background-color: #e9e9e9;"' : ''; ?>><br><br>
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="<?php echo isset($_GET['address']) ? htmlspecialchars($_GET['address']) : ''; ?>" <?php echo isset($_GET['submitted']) ? 'readonly style="background-color: #e9e9e9;"' : ''; ?>><br><br>
            <input type="hidden" name="submitted" value="1">
            <div class="buttons">
                <input type="submit" value="Submit">
                <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"><button type="button">Edit</button></a>
            </div>
        </form>

        <?php
        if (isset($_GET['submitted']) && $_GET['submitted'] == 1) {
            if (
                !empty($_GET["first_name"]) && !empty($_GET["middle_name"]) && !empty($_GET["last_name"]) &&
                !empty($_GET["date_of_birth"]) && !empty($_GET["address"])
            ) {

                $first_name = $_GET["first_name"];
                $middle_name = $_GET["middle_name"];
                $last_name = $_GET["last_name"];
                $date_of_birth = $_GET["date_of_birth"];

                $date = explode('-', $date_of_birth);
                $formatted_date = $date[1] . '/' . $date[2] . '/' . $date[0];

                $address = $_GET["address"];

                echo "First Name: $first_name<br>";
                echo "Middle Name: $middle_name<br>";
                echo "Last Name: $last_name<br>";
                echo "Date of Birth: $formatted_date<br>";
                echo "Address: $address<br>";
            } else {
                echo "All fields must be filled out.";
            }
        }
        ?>
    </div>
</body>

</html>