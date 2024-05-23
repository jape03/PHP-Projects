<?php
include("header.php")
?>

<?php
$critical_thinking = 95;
$project_management = 75;
$leadership = 80;
$problem_solving = 95;
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

        .skills {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }


        .skills div {
            flex: 1;
        }

        .progress_bar {
            background-color: #ddd;
            border-radius: 5px;
            width: 100%;
            height: 20px;
            margin: 5px 0;
        }

        .progress_bar_fill {
            background-color: #040001;
            height: 100%;
            border-radius: 5px;
        }

        h3 {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="resume">
        <section id="skills" class="skills">
            <div>
                <h3>Skills</h3>
                <div>Critical Thinking</div>
                <div class="progress_bar">
                    <div class="progress_bar_fill" style="width: <?php echo $critical_thinking; ?>%;"></div>
                </div>
                <div>Project Management</div>
                <div class="progress_bar">
                    <div class="progress_bar_fill" style="width: <?php echo $project_management; ?>%;"></div>
                </div>
                <div>Leadership</div>
                <div class="progress_bar">
                    <div class="progress_bar_fill" style="width: <?php echo $leadership; ?>%;"></div>
                </div>
                <div>Problem Solving</div>
                <div class="progress_bar">
                    <div class="progress_bar_fill" style="width: <?php echo $problem_solving; ?>%;"></div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>

<?php
include("footer.php")
?>