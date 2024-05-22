<?php
$name = "John Paul Besagas";
$title = "Software Engineer";
$email = "202210802@fit.edu.ph";
$phone = "09611974099";
$address = "Montalban, Rizal 1860";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Resume</title>
    <link rel="stylesheet" href="styles.css">
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
    <header class="header">
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
    </header>
</body>
</html>
