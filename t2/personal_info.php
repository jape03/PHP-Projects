<?php
include("header.php");

$name = "John Paul Besagas";
$title = "Software Engineer";
$email = "202210802@fit.edu.ph";
$phone = "09611974099";
$address = "Montalban, Rizal 1860";
$date_of_birth = "April 3, 2004";
$place_of_birth = "Jagna, Bohol";
$gender = "Male";
$nationality = "Filipino";
$civil_status = "Single";
$website_url = "johnpaulbesagas.me";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Oswald:wght@200..700&family=Poppins&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .resume {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            box-sizing: border-box;
            overflow: hidden;
            position: relative;
        }

        h3 {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="resume">
        <section id="PersonalInformation" class="PersonalInformation">
            <h3>Personal Information</h3>
            <p>Name: <?php echo $name; ?></p>
            <p>Title: <?php echo $title; ?></p>
            <p>Email: <?php echo $email; ?></p>
            <p>Phone: <?php echo $phone; ?></p>
            <p>Address: <?php echo $address; ?></p>
            <p>Date of Birth: <?php echo $date_of_birth; ?></p>
            <p>Place of Birth: <?php echo $place_of_birth; ?></p>
            <p>Gender: <?php echo $gender; ?></p>
            <p>Nationality: <?php echo $nationality; ?></p>
            <p>Civil Status: <?php echo $civil_status; ?></p>
            <p>Website: <a href="http://<?php echo $website_url; ?>" target="_blank"><?php echo $website_url; ?></a></p>
        </section>
    </div>
</body>

</html>

<?php
include("footer.php");
?>