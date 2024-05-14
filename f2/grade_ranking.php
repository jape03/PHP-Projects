<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Oswald:wght@200..700&family=Poppins&display=swap" rel="stylesheet">
    <title>2- Grade Ranking</title>
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: #e8e8e8;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        h3 {
            font-family: 'Poppins', sans-serif;
            margin-bottom: 10px;
        }

        .main_section {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .left_section,
        .right_section {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .divider {
            width: 2px;
            background-color: #ccc;
            height: auto;
            margin: 0 20px;
        }

        .main {
            padding: 20px;
            width: 80%;
            max-width: 800px;
            background-color: #f3f1ee;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .main:hover {
            transform: scale(1.02);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        input[type="text"] {
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: calc(100% - 22px);
        }

        .pic img {
            width: 100%;
            max-width: 200px;
            height: auto;

        }

        button {
            padding: 10px 20px;
            background-color: #6a7fcb;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin: 0 5px;
            flex: 1;
            font-family: 'Poppins', sans-serif;

        }

        .submit {
            text-align: center;
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }

        .submit button:hover {
            background-color: #5a6ebf;
        }

        .name,
        .rank {
            text-align: center;
            font-size: 1.1em;
            color: #333;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="main">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="name">
                <h3>Name</h3>
                <input type="text" name="enter_name" placeholder="Enter Name" value="<?php
                                                                                        if (isset($_POST['enter_name'])) {
                                                                                            echo htmlspecialchars($_POST['enter_name']);
                                                                                        }
                                                                                        ?>">
                <div class="main_section">
                    <div class="left_section">
                        <h3>Grade</h3>
                        <input type="text" name="enter_grade" placeholder="Grade" value="<?php
                                                                                            if (isset($_POST['enter_grade'])) {
                                                                                                echo htmlspecialchars($_POST['enter_grade']);
                                                                                            }
                                                                                            ?>">
                    </div>
                    <div class="divider"></div>
                    <div class="right_section">
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['enter_grade'])) {
                            $name = htmlspecialchars($_POST['enter_name']);
                            $grade = intval($_POST['enter_grade']);

                            function getGradeCategory($grade)
                            {
                                if ($grade >= 93) return 'A';
                                if ($grade >= 90) return 'A-';
                                if ($grade >= 87) return 'B+';
                                if ($grade >= 83) return 'B';
                                if ($grade >= 80) return 'B-';
                                if ($grade >= 77) return 'C+';
                                if ($grade >= 73) return 'C';
                                if ($grade >= 70) return 'C-';
                                if ($grade >= 67) return 'D+';
                                if ($grade >= 63) return 'D';
                                if ($grade >= 60) return 'D-';
                                return 'F';
                            }

                            $grade_category = getGradeCategory($grade);

                            echo '<div class="name">' . $name . '</div>';
                            echo '<div class="pic"><img src="pic.png" alt="Grade Picture"></div>';
                            echo '<div class="rank">Grade: ' . $grade_category . '</div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="submit">
                <button type="submit" name="submit">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>