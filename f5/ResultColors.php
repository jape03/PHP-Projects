<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="f5_style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Oswald:wght@200..700&family=Poppins&display=swap" rel="stylesheet">
    <title>ResultColors</title>
</head>

<body>
    <div class="main">
        <?php
        session_start();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $_SESSION['favorite_color1'] = htmlspecialchars($_POST['favorite_color1']);
            $_SESSION['favorite_color2'] = htmlspecialchars($_POST['favorite_color2']);
            $_SESSION['favorite_color3'] = htmlspecialchars($_POST['favorite_color3']);
            $_SESSION['favorite_color4'] = htmlspecialchars($_POST['favorite_color4']);
            $_SESSION['favorite_color5'] = htmlspecialchars($_POST['favorite_color5']);

            echo "<p>My Favorite Color 1: <span style='background-color: " . $_SESSION['favorite_color1'] . "; padding: 5px; border-radius: 5px; margin-left: 10px;'>" . $_SESSION['favorite_color1'] . "</span></p>";
            echo "<p>My Favorite Color 2: <span style='background-color: " . $_SESSION['favorite_color2'] . "; padding: 5px; border-radius: 5px; margin-left: 10px;'>" . $_SESSION['favorite_color2'] . "</span></p>";
            echo "<p>My Favorite Color 3: <span style='background-color: " . $_SESSION['favorite_color3'] . "; padding: 5px; border-radius: 5px; margin-left: 10px;'>" . $_SESSION['favorite_color3'] . "</span></p>";
            echo "<p>My Favorite Color 4: <span style='background-color: " . $_SESSION['favorite_color4'] . "; padding: 5px; border-radius: 5px; margin-left: 10px;'>" . $_SESSION['favorite_color4'] . "</span></p>";
            echo "<p>My Favorite Color 5: <span style='background-color: " . $_SESSION['favorite_color5'] . "; padding: 5px; border-radius: 5px; margin-left: 10px;'>" . $_SESSION['favorite_color5'] . "</span></p>";
        }
        ?>
        <div class="button">
            <a href="FavoriteColor.php"><button type="button">Back</button></a>
        </div>
    </div>
</body>

</html>