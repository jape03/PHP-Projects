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
    <title>User</title>
</head>
<body>
    <div class="main">
        <div class="content">
            <h1>User</h1> 
            <div class="info">
                <p>Welcome: <?php echo htmlspecialchars($user['first_name']); ?></p>
                <p>Userlevel: <?php echo htmlspecialchars($user['userlevel']); ?></p>
                <p>Birthday: <?php echo htmlspecialchars($user['birthday']); ?></p>
                <p>Contact Details: <?php echo htmlspecialchars($user['contact_number']); ?></p>
                <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
                <a href="user_image.php"><button>Upload Image</button></a>
                <a href="user_changepass.php"><button>Reset My Password</button></a>
            </div>
            <div class="image-area">
                <?php if (!empty($imagePath)): ?>
                    <img src="<?php echo htmlspecialchars($imagePath); ?>" alt="ID Picture" style="max-width: 200px; max-height: 200px;">
                <?php else: ?>
                    <p>No image uploaded</p>
                <?php endif; ?>
            </div>
        </div>
        <a href="login.php"><button>Logout</button></a>
    </div>
</body>
</html>
