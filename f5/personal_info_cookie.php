<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No - 2</title>
    <?php
    if (isset($_COOKIE['start_time'])) {
        $delay_display = time() - $_COOKIE['start_time'];
        if ($delay_display < 40) {
            echo '<meta http-equiv="refresh" content="10">';
        }
    }
    ?>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name"><br><br>
        <label for="middle_name">Middle Name:</label>
        <input type="text" id="middle_name" name="middle_name"><br><br>
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name"><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        setcookie("first_name", $_POST["first_name"], time() + 86400, "/");
        setcookie("middle_name", $_POST["middle_name"], time() + 86400, "/");
        setcookie("last_name", $_POST["last_name"], time() + 86400, "/");
        setcookie("start_time", time(), time() + 86400, "/");
    }

    if (isset($_COOKIE['start_time'])) {
        $delay_display = time() - $_COOKIE['start_time'];
        echo "<div id='cookieDisplay'>";

        if ($delay_display >= 10 && $delay_display < 20) {
            echo "Cookies at 10 seconds:<br>";
        } elseif ($delay_display >= 20 && $delay_display < 30) {
            echo "Cookies at 20 seconds:<br>";
        } elseif ($delay_display >= 30 && $delay_display < 40) {
            echo "Cookies at 30 seconds:<br>";
        }

        if ($delay_display >= 10) {
            if (isset($_COOKIE['first_name'])) {
                echo "First Name: " . $_COOKIE['first_name'] . "<br>";
            }
            if (isset($_COOKIE['middle_name'])) {
                echo "Middle Name: " . $_COOKIE['middle_name'] . "<br>";
            }
            if (isset($_COOKIE['last_name'])) {
                echo "Last Name: " . $_COOKIE['last_name'] . "<br>";
            }
        }
        echo "</div>";
    }
    ?>
</body>
</html>
