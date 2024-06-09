<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="f5_style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Oswald:wght@200..700&family=Poppins&display=swap" rel="stylesheet">
    <title>No - 3</title>
</head>

<body>
    <div class="main">
        <form action="ResultColors.php" method="POST">
            <table>
                <h2>Enter your favorite colors</h2>
                <tr>
                    <td><label for="favorite_color1">Favorite Color 1:</label></td>
                    <td><input type="text" name="favorite_color1" id="favorite_color1" required></td>
                </tr>
                <tr>
                    <td><label for="favorite_color2">Favorite Color 2:</label></td>
                    <td><input type="text" name="favorite_color2" id="favorite_color2" required ></td>
                </tr>
                <tr>
                    <td><label for="favorite_color3">Favorite Color 3:</label></td>
                    <td><input type="text" name="favorite_color3" id="favorite_color3" required ></td>
                </tr>
                <tr>
                    <td><label for="favorite_color4">Favorite Color 4:</label></td>
                    <td><input type="text" name="favorite_color4" id="favorite_color4"required ></td>
                </tr>
                <tr>
                    <td><label for="favorite_color5">Favorite Color 5:</label></td>
                    <td><input type="text" name="favorite_color5" id="favorite_color5" required></td>
                </tr>
                <tr>
                    <td colspan="2"><button type="submit">Send Colors</button></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>