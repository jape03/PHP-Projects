<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];

$host = 'localhost';
$user_db = 'root';
$pass_db = '';
$name_db = 'registration_f7';

$conn = new mysqli($host, $user_db, $pass_db, $name_db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT email, userlevel FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

$uploadMessage = "";
$imagePath = "";

if (isset($_POST["submit"])) {
    $target_dir = "uploads/"; 
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadMessage .= "File is not an image.<br>";
        $uploadOk = 0;
    }

    if (file_exists($target_file)) {
        $target_file = $target_dir . pathinfo($target_file, PATHINFO_FILENAME) . '_' . time() . '.' . $imageFileType;
    }

    if ($_FILES["fileToUpload"]["size"] > 500000) {
        $uploadMessage .= "Sorry, your file is too large.<br>";
        $uploadOk = 0;
    }

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $uploadMessage .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
        $uploadOk = 0;
    }

    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    if ($uploadOk == 0) {
        $uploadMessage .= "Sorry, your file was not uploaded.<br>";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $uploadMessage .= "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.<br>";
            $imagePath = $target_file;
        } else {
            $uploadMessage .= "Sorry, there was an error uploading your file.<br>";
        }
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="f7_style.css">
    <title>Admin Account</title>
</head>
<body>
    <div class="main">
        <h1>Admin Account</h1>
        <div style="display: flex; justify-content: space-between; align-items: flex-start;">
            <div>
                <p>Welcome</p>
                <p><?php echo htmlspecialchars($username); ?>(<?php echo htmlspecialchars($user['userlevel']); ?>)</p>
                <p>Userlevel: <?php echo htmlspecialchars($user['userlevel']); ?></p>
                <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
            </div>
            <div>
                <a href="login.php">Log-out</a><br>
                <a href="admin_adduser.php">Add User</a>
            </div>
        </div>
        <div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Upload Image" name="submit">
            </form>
        </div>
    </div>
</body>
</html>
