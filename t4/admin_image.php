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

$imagePath = $_SESSION['imagePath'] ?? ''; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["imageFile"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["imageFile"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if(isset($_FILES["imageFile"]["tmp_name"])) {
        $check = getimagesize($_FILES["imageFile"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
            $error = "File is not an image.";
        }
    }
    if ($uploadOk == 0) {
        $error = $error ?? "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["imageFile"]["tmp_name"], $target_file)) {
            $_SESSION['imagePath'] = $target_file;
            $success = "The file ". htmlspecialchars( basename( $_FILES["imageFile"]["name"])). " has been uploaded.";
        } else {
            $error = "Sorry, there was an error uploading your file.";
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
    <link rel="stylesheet" href="t7_style.css">
    <title>Admin Image Upload</title>
</head>
<body>
    <div class="main">
        <h1>Admin</h1>
        <p>Welcome <?php echo htmlspecialchars($user['first_name']); ?></p>
        <p>Userlevel: <?php echo htmlspecialchars($user['userlevel']); ?></p>
        <p>Birthday: <?php echo htmlspecialchars($user['birthday']); ?></p>
        <p>Contact Details: <?php echo htmlspecialchars($user['contact_number']); ?></p>
        <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>

        <h2>Upload Image</h2>
        <?php if (!empty($error)) echo "<p style='color: red;'>$error</p>"; ?>
        <?php if (!empty($success)) echo "<p style='color: green;'>$success</p>"; ?>
        <?php if (!empty($imagePath)) echo "<img src='$imagePath' alt='Uploaded Image' style='max-width: 200px; max-height: 200px;'/>"; ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <input type="file" name="imageFile" id="imageFile" required>
            <a href="admin_home.php"><button type="button">Back</button></a>
            <button type="submit">Upload Image</button>
        </form>
    </div>
</body>
</html>
