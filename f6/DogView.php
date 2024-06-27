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
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT name, breed, age, address, color, height, weight FROM dogs";
        $result = $conn->query($sql);
        ?>
        <?php if ($result->num_rows > 0) : ?>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Breed</th>
                    <th>Age</th>
                    <th>Address</th>
                    <th>Color</th>
                    <th>Height</th>
                    <th>Weight</th>
                </tr>
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <td><?= htmlspecialchars($row["name"]) ?></td>
                        <td><?= htmlspecialchars($row["breed"]) ?></td>
                        <td><?= htmlspecialchars($row["age"]) ?></td>
                        <td><?= htmlspecialchars($row["address"]) ?></td>
                        <td><?= htmlspecialchars($row["color"]) ?></td>
                        <td><?= htmlspecialchars($row["height"]) ?></td>
                        <td><?= htmlspecialchars($row["weight"]) ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else : ?>
            <p>0 results</p>
        <?php endif; ?>
        <?php $conn->close(); ?>
        <div class="button">
            <a href="DogRegister.php"><button type="button">Back</button></a>
        </div>
    </div>
</body>
</html>