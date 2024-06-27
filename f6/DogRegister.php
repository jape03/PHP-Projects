<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dogregister";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $stmt = $conn->prepare("INSERT INTO dogs (name, breed, age, address, color, height, weight) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssissss", $name, $breed, $age, $address, $color, $height, $weight);

    $name = $_POST['name'];
    $breed = $_POST['breed'];
    $age = (int)$_POST['age'];
    $address = $_POST['address'];
    $color = $_POST['color'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];

    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $_SESSION['message'] = "Dog registered successfully";
    } else {
        $_SESSION['message'] = "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="f6_style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Oswald:wght@200..700&family=Poppins&display=swap" rel="stylesheet">
    <title>Dog Register</title>
</head>

<body>
    <div class="main">
        <h1>Dog Register</h1>
        <form action="DogRegister.php" method="post" style="display: inline;">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="breed">Breed:</label>
            <input type="text" id="breed" name="breed" required>
            <label for="age">Age:</label>
            <input type="text" id="age" name="age" required>
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>
            <label for="color">Color:</label>
            <input type="text" id="color" name="color" required>
            <label for="height">Height:</label>
            <input type="text" id="height" name="height" required>
            <label for="weight">Weight:</label>
            <input type="text" id="weight" name="weight" required>
            <input type="submit" value="Register Dog">
        </form>

        <?php
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
        ?>

        <form action="DogView.php" method="get" style="display: inline;">
            <input type="submit" value="View Dogs">
        </form>

    </div>
</body>

</html>