<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="f6_style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Oswald:wght@200..700&family=Poppins&display=swap" rel="stylesheet">
    <title>DogView</title>
</head>

<body>
    <div class="main">
        <?php
        session_start();

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

        // Query the database for all dog records
        $sql = "SELECT name, breed, age, address, color, height, weight FROM dogs";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table><tr><th>Name</th><th>Breed</th><th>Age</th><th>Address</th><th>Color</th><th>Height</th><th>Weight</th></tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["name"]. "</td><td>" . $row["breed"]. "</td><td>" . $row["age"]. "</td><td>" . $row["address"]. "</td><td>" . $row["color"]. "</td><td>" . $row["height"]. "</td><td>" . $row["weight"]. "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>

        <div class="button">
            <a href="DogRegister.php"><button type="button">Back</button></a>
        </div>
    </div>
</body>

</html>
