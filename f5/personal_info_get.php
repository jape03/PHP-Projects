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
    <form action="" method="GET">
        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="firstname"><br><br>
        <label for="middlename">Middle Name:</label>
        <input type="text" id="middlename" name="middlename"><br><br>
        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="lastname"><br><br>
        <label for="dateOfBirth">Date of Birth:</label>
        <input type="text" id="dateOfBirth" name="dateOfBirth"><br><br>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address"><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $firstname = $_GET["firstname"];
    $middlename = $_GET["middlename"];
    $lastname = $_GET["lastname"];
    $dateOfBirth = $_GET["dateOfBirth"];
    $address = $_GET["address"];

    echo "First Name: $firstname<br>";
    echo "Middle Name: $middlename<br>";
    echo "Last Name: $lastname<br>";
    echo "Date of Birth: $dateOfBirth<br>";
    echo "Address: $address<br>";
    }
?>

