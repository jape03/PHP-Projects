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
    <div class="header">
        <a href="personal_info.php">Personal Information</a>
        <a href="#CareerObjective">Career Objective</a>
        <a href="#Education">Educational Attainment</a>
        <a href="#Skills">Skills</a>
        <a href="#Affiliation">Affiliation</a>
        <a href="#WorkExp">Work Experience</a>
    </div>
    <div class="resume">
        <div class="main_section">
            <div class="picture-container">
                <!-- Add your picture here -->
            </div>
            <section id="PersonalInformation" class="PersonalInformation">
                <a href="personal_info.php"><h3>Personal Information</h3></a>
            </section>
            <section id="CareerObjective" class="CareerObjective">
                <a href="#CareerObjective"><h3>Career Objective</h3></a>
            </section>
            <section id="Education" class="Education">
                <a href="#Education"><h3>Educational Attainment</h3></a>
            </section>
            <section id="Skills" class="Skills">
                <a href="#Skills"><h3>Skills</h3></a>
            </section>
            <section id="Affiliation" class="Affiliation">
                <a href="#Affiliation"><h3>Affiliation</h3></a>
            </section>
            <section id="WorkExp" class="WorkExp">
                <a href="#WorkExp"><h3>Work Experience</h3></a>
            </section>
        </div>
    </div>
</body>

</html>
