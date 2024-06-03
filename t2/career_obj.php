<?php
include("header.php")
?>
<?php
$career_obj = "I am a software engineer with expertise in C++, Python, and PHP. I aim to advance my technical skills and specialize in emerging technologies to contribute to innovative software solutions. I aspire to take on leadership roles in technology projects, engaging in collaborative environments and making a significant impact in the field of software engineering.";
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
        <section id="CareerObjective" class="CareerObjective">
            <h3>Career Objective</h3>
            <p> <?php echo $career_obj; ?></p>
        </section>
    </div>
</body>

</html>

<?php
include("footer.php")
?>