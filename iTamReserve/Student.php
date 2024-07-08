<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Student</title>
    <style>
        .student-button {
            position: absolute;
            bottom: 150px;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            width: 100%;
        }

        .student-button button {
            font-family: "Poppins", arial, sans-serif;
            font-size: 16px;
            display: block;
            width: 350px;
            margin: 10px auto;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4caf50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 20px;
            transition: background-color 0.3s ease;
        }

        .student-button button:hover {
            background-color: rgba(254, 243, 31, 0.8);
        }
    </style>
</head>

<body>
    <div class="main">
        <div class="student-button">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <h1>Hello, Student!</h1> <!-- from database -->
                <button type="submit" name="action" value="Reserve Facility">Reserve Facility</button>
                <button type="submit" name="action" value="Borrow Equipment">Borrow Equipment</button>
                <button type="submit" name="action" value="Logout">Logout</button>
        </div>
        </form>
    </div>
</body>
<?php
if (isset($_POST['action']) && $_POST['action'] === 'Reserve Facility') {
    header('Location: Student_Facility.php');
    exit;
} elseif (isset($_POST['action']) && $_POST['action'] === 'Borrow Equipment') {
    header('Location: Student_Equipment.php');
    exit;
} elseif (isset($_POST['action']) && $_POST['action'] === 'Logout') {
    header('Location: Login.php');
    exit;
}

?>

</html>