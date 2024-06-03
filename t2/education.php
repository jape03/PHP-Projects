<?php
include("header.php")
?>

<?php
$education_degree = "Bachelor of Science in Computer Science with Specialization in Software Engineering";
$education_institution = "FEU Institute of Technology, Manila";
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
        <section id="Education" class="Education">
            <h3>Educational Attainment</h3>
            <div>
                <h4><?php echo $education_degree; ?></h4>
                <p><?php echo $education_institution; ?></p>
            </div>
        </section>
    </div>
</body>

</html>

<?php
include("footer.php")
?>