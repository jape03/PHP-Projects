<?php
session_start(); // Start the session to use session variables

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dogregister";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO dogs (name, breed, age, address, color, height, weight) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssissss", $name, $breed, $age, $address, $color, $height, $weight);

    // Set parameters and execute
    $name = $_POST['name'];
    $breed = $_POST['breed'];
    $age = (int)$_POST['age']; // Casting to integer to ensure age is a number
    $address = $_POST['address'];
    $color = $_POST['color'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];

    $stmt->execute();

    // Check if the insert was successful
    if ($stmt->affected_rows > 0) {
        $_SESSION['message'] = "Dog registered successfully";
    } else {
        $_SESSION['message'] = "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    // Redirect to the same page to avoid form resubmission on refresh
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
        <form action="DogRegister.php" method="post">
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
            echo $_SESSION['message']; // Display the session message
            unset($_SESSION['message']); // Clear the session message
        }
        ?>
    </div>
</body>
</html>
