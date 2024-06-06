<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No - 2</title>
    <?php
    if (isset($_COOKIE['starttime'])) {
        $delay = time() - $_COOKIE['starttime'];
        if ($delay < 40) {
            echo '<meta http-equiv="refresh" content="10">';
        }
    }
    ?>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="firstname"><br><br>
        <label for="middlename">Middle Name:</label>
        <input type="text" id="middlename" name="middlename"><br><br>
        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="lastname"><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        setcookie("firstname", $_POST["firstname"], time() + 86400, "/");
        setcookie("middlename", $_POST["middlename"], time() + 86400, "/");
        setcookie("lastname", $_POST["lastname"], time() + 86400, "/");
        setcookie("starttime", time(), time() + 86400, "/");
    }

    if (isset($_COOKIE['starttime'])) {
        $delay = time() - $_COOKIE['starttime'];
        echo "<div id='cookieDisplay'>";

        if ($delay >= 10 && $delay < 20) {
            echo "Cookies at 10 seconds:<br>";
        } elseif ($delay >= 20 && $delay < 30) {
            echo "Cookies at 20 seconds:<br>";
        } elseif ($delay >= 30 && $delay < 40) {
            echo "Cookies at 30 seconds:<br>";
        }

        if ($delay >= 10) {
            if (isset($_COOKIE['firstname'])) {
                echo "First Name: " . $_COOKIE['firstname'] . "<br>";
            }
            if (isset($_COOKIE['middlename'])) {
                echo "Middle Name: " . $_COOKIE['middlename'] . "<br>";
            }
            if (isset($_COOKIE['lastname'])) {
                echo "Last Name: " . $_COOKIE['lastname'] . "<br>";
            }
        }
        echo "</div>";
    }
    ?>
</body>
</html>
