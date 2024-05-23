<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Oswald:wght@200..700&family=Poppins&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        a {
            color: #333;
            text-decoration: none;
            margin: 0 10px;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #007bff;
        }

        .header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
            font-family: 'Poppins', sans-serif;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .header a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
            transition: color 0.3s ease;
        }

        .header a:hover {
            color: #007bff;
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

        .resume .main_section {
            display: flex;
            flex-wrap: wrap;
        }

        .resume .main_section section {
            width: 100%;
            margin-bottom: 20px;
        }

        .section h3 {
            font-family: 'Poppins', sans-serif;
            font-size: 24px;
            color: #333;
            margin: 0 0 10px;
            padding-bottom: 5px;
            border-bottom: 2px solid #333;
            text-decoration: none;
        }

        .section h3:hover {
            color: #007bff;
        }

        .picture-container {
            position: absolute;
            top: 20px;
            right: 20px;
            border: 2px solid #333;
            width: 100px;
            height: 100px;
            overflow: hidden;
        }

        .picture-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <div class="resume">
        <div class="main_section">
            <div class="picture-container">
                <img src="https://raw.githubusercontent.com/jape03/PHP-Projects/main/t2/images_t2/pic.jpg" alt="pic">
            </div>
            <section id="PersonalInformation" class="PersonalInformation">
                <a href="personal_info.php">
                    <h3>Personal Information</h3>
                </a>
            </section>
            <section id="CareerObjective" class="CareerObjective">
                <a href="career_obj.php">
                    <h3>Career Objective</h3>
                </a>
            </section>
            <section id="Education" class="Education">
                <a href="education.php">
                    <h3>Educational Attainment</h3>
                </a>
            </section>
            <section id="Skills" class="Skills">
                <a href="skills.php">
                    <h3>Skills</h3>
                </a>
            </section>
            <section id="Affiliation" class="Affiliation">
                <a href="affiliation.php">
                    <h3>Affiliation</h3>
                </a>
            </section>
            <section id="WorkExp" class="WorkExp">
                <a href="work_exp.php">
                    <h3>Work Experience</h3>
                </a>
            </section>
        </div>
    </div>
</body>

</html>