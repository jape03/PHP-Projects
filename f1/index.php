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
    /* .poppins-regular {
        font-family: "Poppins", sans-serif;
        font-weight: 400;
        font-style: normal;
    } */

    body,
    html {
        margin: 0;
        padding: 0;
    }

    .header {
        background-color: black;
        height: 150px;
        margin: 0;
    }

    .info {
        color: white;
    }

    .info[name="name"] {
        font-size: 40px;
        font-family: "Poppins", sans-serif;
        font-weight: 400;
        font-style: normal;
    }

    .info[name="title"] {
        font-family: "Poppins", sans-serif;
        font-weight: 100;
        font-style: normal;
        color: gray;
    }

    .profile {
        border: 2px solid #000;
        position: relative;
        padding-left: 20px;
    }
    
</style>

<body>
    <div class="header" name="header">
        <span class="info" name="name">John Paul Besagas</span> <br>
        <span class="info" name="title">Software Engineer </span> <br>
        <span class="info" name="email">202210802@fit.edu.ph</span>
        <span class="info" name="contact">09611974099</span>
        <span class="info" name="adress">Montalban, Rizal 1860</span>
    </div>
    <div class="profile" name="profile">
        <span class="profile_title" name="profile_title">Profile</span>
        <div class="profile_descrip" name=" profile_descrip">
            I'm a software engineer who knows their stuff. I'm great with C++, Python, and PHP and can handle everything from figuring out what's needed to getting it deployed. I'm a stickler for details and work great in fast-paced environments. I always want to keep learning and stay up-to-date with the latest tech and best practices.
        </div>
    </div>
</body>

</html>