<?php
include("header.php")
?>

<?php
$affiliation1 = "JPCS";
$affiliation2 = "ACM";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <section id="Affiliation" class="Affiliation">
            <h3>Affiliation</h3>
            <p><?php echo $affiliation1; ?></p>
            <p><?php echo $affiliation2; ?></p>
        </section>
    </div>
</body>

</html>

<?php
include("footer.php")
?>