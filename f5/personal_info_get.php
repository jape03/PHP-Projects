<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No - 1</title>
</head>
<style>
</style>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> " method="GET">
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name"><br><br>
        <label for="middle_name">Middle Name:</label>
        <input type="text" id="middle_name" name="middle_name"><br><br>
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name"><br><br>
        <label for="date_of_birth">Date of Birth:</label>
        <input type="text" id="date_of_birth" name="date_of_birth"><br><br>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address"><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $first_name = $_GET["first_name"];
    $middle_name = $_GET["middle_name"];
    $last_name = $_GET["last_name"];
    $date_of_birth = $_GET["date_of_birth"];
    $address = $_GET["address"];

    echo "First Name: $first_name<br>";
    echo "Middle Name: $middle_name<br>";
    echo "Last Name: $last_name<br>";
    echo "Date of Birth: $date_of_birth<br>";
    echo "Address: $address<br>";
    }
?>

