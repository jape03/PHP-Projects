<?php

// Header
$name = "John Paul Besagas";
$title = "Software Engineer";
$email = "202210802@fit.edu.ph";
$phone = "09611974099";
$address = "Montalban, Rizal 1860";

// Personal Details
$date_of_birth = "April 3, 2004";
$place_of_birth = "Jagna, Bohol";
$gender = "Male";
$nationality = "Filipino";
$civil_status = "Single";
$website_url = "johnpaulbesagas.me";

// Profile 
$profile_description = "I'm a software engineer skilled in C++, Python, and PHP. I excel in fast-paced environments and dedicated to continuous learning.";

// Education
$education_degree = "Bachelor of Science in Computer Science with Specialization in Software Engineering";
$education_institution = "FEU Institute of Technology, Manila";

// Employment 
$job1_title = "Software Developer";
$job1_description = "ABC Inc. Manila";
$job2_title = "Software Engineer";
$job2_description = "XYZ Enterprise. Manila";

// Skills 
$critical_thinking = 95;
$project_management = 75;
$leadership = 80;
$problem_solving = 95;

// Certificates
$certificates = [
    "Linux Professional Institute Certification",
    "Python Institute Certifications",
    "Microsoft Technology Associate"
];

// Programming Languages
$languages = ["C++", "Java", "Python", "PHP", "HTML", "CSS"];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Oswald:wght@200..700&family=Poppins&display=swap" rel="stylesheet">

</head>
<style>
    body,
    html {
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
        background-color: #f4f4f4;
        display: flex;
        justify-content: center;
        align-items: flex-start;
        height: 100%;
    }

    section {
        border-bottom: 1px solid #ccc;
        padding: 10px 0;
    }

    h3 {
        color: #333;
    }

    a {
        color: gray;
    }

    .personal_details,
    .skills_details {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
    }

    .personal_details div,
    .skills_details div {
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

    .skills,
    .languages {
        margin-top: 10px;
    }

    .header {
        background-color: #040001;
        color: white;
        width: auto;
        min-width: 100%;
        padding: 25px 50px;
        text-align: left;
        box-sizing: border-box;

    }

    .info[name="name"] {
        margin-bottom: 5px;
        font-size: 46px;
    }

    .info[name="title"] {
        margin-bottom: 20px;
        color: gray;
        font-size: 18px;
    }

    .contact {
        display: flex;
        justify-content: left;
        gap: 20px;

    }

    .resume {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 80%;
        max-width: 1000px;
        background: #fff;
        margin: 20px auto;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .education>div {
        display: flex;
        justify-content: space-between;
        align-items: baseline;
    }

    .infox,
    .job1_descrip,
    .job2_descrip,
    .info[name="email"],
    .info[name="phone"],
    .info[name="address"] {
        font-size: 16px;
        color: gray;
        margin-bottom: 5px;

    }

    .job1,
    .job2 {
        font-size: 16px;
        margin-bottom: 5px;
    }

    .institution {
        display: block;
        font-size: 16px;
        margin-bottom: 5px;
        color: gray;
    }

    .left_section,
    .right_section {
        flex: 1;
        padding: 20px;
    }

    .divider {
        width: 1px;
        background-color: #ccc;
        margin: 0 20px;
    }

    .main_section {
        display: flex;
        width: 100%;
        justify-content: space-between;
    }

    .contact-item {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .logo {
        width: 18px;
        height: 18px;
        margin-right: 8px;
        vertical-align: middle;
    }

    .info {
        display: flex;
        align-items: center;
    }

    .language_container {
        display: flex;
    }

    .column {
        flex: 1;
    }
</style>

<body>
    <div class="resume">
        <div class="header">
            <div class="info" name="name"><?php echo $name; ?></div>
            <div class="info" name="title"><?php echo $title; ?></div>
            <div class="contact">
                <div class="contact-item">
                    <img class="logo" name="email_pic" src="email.png">
                    <span class="info" name="email"><?php echo $email; ?></span>
                </div>
                <div class="contact-item">
                    <img class="logo" name="phone_pic" src="phone.png">
                    <span class="info" name="phone"><?php echo $phone; ?></span>
                </div>
                <div class="contact-item">
                    <img class="logo" name="loc_pic" src="loc.png">
                    <span class="info" name="address"><?php echo $address; ?></span>
                </div>
            </div>
        </div>
        <div class="main_section">
            <div class="left_section">
                <section class="profile">
                    <h3>
                        <a href="profile.php">Profile</a>
                    </h3>
                </section>
                <section class="education">
                    <h3>Education</h3>
                </section>
                <section class="employment">
                    <h3>Employment</h3>
                </section>
                <section class="certificate">
                    <h3>Certificates</h3>
                </section>
            </div>
            <div class="divider"></div>
            <div class="right_section">
                <section class="personal_details">
                    <div>
                        <h3>Personal Details</h3>
                    </div>
                </section>
                <section class="skills_details">
                    <div>
                        <h3>Skills</h3>
                    </div>
                </section>
                <section class="pl">
                    <h3>Programming Language</h3>
                </section>
            </div>
        </div>
    </div>
</body>
</html>