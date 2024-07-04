<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="f7_style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Oswald:wght@200..700&family=Poppins&display=swap" rel="stylesheet">
    <title>View Users</title>
</head>
<body>
    <div class="main">
        <?php
        session_start();
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "registration_f7";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT username, email, userlevel, status FROM users";
        $result = $conn->query($sql);
        ?>
        <?php if ($result->num_rows > 0) : ?>
            <table>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Userlevel</th>
                    <th>Status</th>
                </tr>
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <td><?= htmlspecialchars($row["username"]) ?></td>
                        <td><?= htmlspecialchars($row["email"]) ?></td>
                        <td><?= htmlspecialchars($row["userlevel"]) ?></td>
                        <td><?= htmlspecialchars($row["status"]) ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else : ?>
            <p>0 results</p>
        <?php endif; ?>
        <?php $conn->close(); ?>
        <div class="button">
            <a href="admin.php"><button type="button">Back</button></a>
        </div>
    </div>
</body>
</html>
