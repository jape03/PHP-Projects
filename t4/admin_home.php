<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
$host = 'localhost';
$user_db = 'root';
$pass_db = '';
$name_db = 't7';

$conn = new mysqli($host, $user_db, $pass_db, $name_db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_SESSION['username'];

$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();
$stmt->close();

$users = $conn->query("SELECT * FROM users");

$conn->close();

$imagePath = $_SESSION['imagePath'] ?? '';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="t7_style.css">
    <title>Admin Dashboard</title>
</head>

<body>
    <div class="main">
        <div class="content" style="display: flex; justify-content: space-between;">
            <div class="info" style="flex: 1;">
                <h1>Admin</h1>
                <p>Welcome: <?php echo htmlspecialchars($user['first_name']); ?></p>
                <p>Userlevel: <?php echo htmlspecialchars($user['userlevel']); ?></p>
                <p>Birthday: <?php echo htmlspecialchars($user['birthday']); ?></p>
                <p>Contact Details: <?php echo htmlspecialchars($user['contact_number']); ?></p>
                <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
                <a href="admin_image.php"><button>Upload Image</button></a>
                <a href="admin_changepass.php"><button>Reset My Password</button></a>
            </div>
            <div class="image-area" style="flex: 1;">
                <?php if (!empty($imagePath)) : ?>
                    <img src="<?php echo htmlspecialchars($imagePath); ?>" alt="ID Picture" style="max-width: 200px; max-height: 200px;">
                <?php else : ?>
                    <p>No image uploaded</p>
                <?php endif; ?>
            </div>
        </div>
        <h2>Records</h2>
        <a href="admin_adduser.php"><button>Add New User</button></a>
        <div class="table-container">
            <table>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Contact No.</th>
                    <th>Email</th>
                    <th>Birthday</th>
                    <th>Username</th>
                    <th>Access Level</th>
                    <th>Status</th>
                </tr>
                <?php while ($row = $users->fetch_assoc()) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['first_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['middle_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['last_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['contact_number']); ?></td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td><?php echo htmlspecialchars($row['birthday']); ?></td>
                        <td><?php echo htmlspecialchars($row['username']); ?></td>
                        <td><?php echo htmlspecialchars($row['userlevel']); ?></td>
                        <td><?php echo htmlspecialchars($row['status']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>
        <a href="login.php"><button>Logout</button></a>
    </div>
</body>

</html>