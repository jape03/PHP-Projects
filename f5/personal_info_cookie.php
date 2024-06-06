<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No - 2</title>
    <?php
    session_start();
    if (isset($_SESSION['start_time'])) {
        $delay_display = time() - $_SESSION['start_time'];
        if ($delay_display < 40) {
            echo '<meta http-equiv="refresh" content="10">';
        }
    }
    ?>
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" value="<?php echo isset($_COOKIE['first_name']) ? htmlspecialchars($_COOKIE['first_name']) : ''; ?>" <?php echo isset($_SESSION['start_time']) ? 'readonly style="background-color: #e9e9e9;"' : ''; ?>><br><br>
        <label for="middle_name">Middle Name:</label>
        <input type="text" id="middle_name" name="middle_name" value="<?php echo isset($_COOKIE['middle_name']) ? htmlspecialchars($_COOKIE['middle_name']) : ''; ?>" <?php echo isset($_SESSION['start_time']) ? 'readonly style="background-color: #e9e9e9;"' : ''; ?>><br><br>
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" value="<?php echo isset($_COOKIE['last_name']) ? htmlspecialchars($_COOKIE['last_name']) : ''; ?>" <?php echo isset($_SESSION['start_time']) ? 'readonly style="background-color: #e9e9e9;"' : ''; ?>><br><br>
        <input type="hidden" name="submitted" value="1">
        <input type="submit" value="Submit">
        <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"><button type="button">Edit</button></a>
    </form>

    <?php
    if (isset($_POST['submitted']) && $_POST['submitted'] == 1) {
        if (!empty($_POST["first_name"]) && !empty($_POST["middle_name"]) && !empty($_POST["last_name"])) {
            setcookie("first_name", $_POST["first_name"], time() + 86400, "/");
            setcookie("middle_name", $_POST["middle_name"], time() + 86400, "/");
            setcookie("last_name", $_POST["last_name"], time() + 86400, "/");
            $_SESSION['start_time'] = time();

            header("Location: " . htmlspecialchars($_SERVER["PHP_SELF"]));
            exit();
        } else {
            echo "<p>All fields must be filled out.</p>";
        }
    }

    if (isset($_SESSION['start_time'])) {
        $delay_display = time() - $_SESSION['start_time'];
        echo "<div id='cookieDisplay'>";

        if ($delay_display >= 10 && $delay_display < 20) {
            echo "Cookies at 10 seconds:<br>";
        } elseif ($delay_display >= 20 && $delay_display < 30) {
            echo "Cookies at 20 seconds:<br>";
        } elseif ($delay_display >= 30 && $delay_display < 40) {
            echo "Cookies at 30 seconds:<br>";
        }

        if ($delay_display >= 10 && $delay_display < 40) {
            if (isset($_COOKIE['first_name'])) {
                echo "First Name: " . htmlspecialchars($_COOKIE['first_name']) . "<br>";
            }
            if (isset($_COOKIE['middle_name'])) {
                echo "Middle Name: " . htmlspecialchars($_COOKIE['middle_name']) . "<br>";
            }
            if (isset($_COOKIE['last_name'])) {
                echo "Last Name: " . htmlspecialchars($_COOKIE['last_name']) . "<br>";
            }
        } elseif ($delay_display >= 30) {
            setcookie("first_name", "", time() - 3600, "/");
            setcookie("middle_name", "", time() - 3600, "/");
            setcookie("last_name", "", time() - 3600, "/");
        }
        echo "</div>";
    }
    ?>
</body>

</html>
