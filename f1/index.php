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
        min-height: 100vh;
    }

    .resume {
        width: 80%;
        max-width: 1000px;
        background: #fff;
        margin: 20px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .header {
        background-color: #333;
        color: white;
        padding: 10px;
        text-align: center;
    }

    section {
        border-bottom: 1px solid #ccc;
        padding: 10px 0;
    }

    h3 {
        color: #333;
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
        background-color: #333;
        height: 100%;
        border-radius: 5px;
    }

    .skills,
    .languages {
        margin-top: 10px;
    }
</style>

<body>
    <div class="resume">
        <header class="header">
            <div class="info" name="name">John Paul Besagas</div>
            <div class="info" name="title">Software Engineer</div>
        </header>
        <section class="profile">
            <h3>Profile</h3>
            <p>I'm a software engineer skilled in C++, Python, and PHP. I excel in fast-paced environments and am dedicated to continual learning and staying current with industry practices.</p>
        </section>
        <section class="education">
            <h3>Education</h3>
            <p>Bachelor of Science in Computer Science with Specialization in Software Engineering, 2022-2026, FEU Institute of Technology, Manila</p>
        </section>
        <section class="employment">
            <h3>Employment</h3>
            <p>Software Developer at ABC Inc., Manila</p>
            <p>Software Engineer at XYZ Enterprise, Manila</p>
        </section>
        <section class="internship">
            <h3>Internship</h3>
            <p>Trainee Developer at A/B Corp., Manila</p>
            <p>Junior Developer</p>
        </section>
        <section class="certificate">
            <h3>Certificates</h3>
            <p>Linux Professional Institute Certification</p>
            <p>Python Institute Certifications</p>
            <p>Microsoft Technology Associate</p>
        </section>
        <div class="personal_details">
            <div>
                <h3>Personal Details</h3>
                <p>Date of Birth: April 3, 2004</p>
                <p>Place of Birth: Jagna, Bohol</p>
                <p>Gender: Male</p>
                <p>Nationality: Filipino</p>
                <p>Civil Status: Single</p>
                <p>Website: <a href="http://johnpaulbesagas.me">johnpaulbesagas.me</a></p>
            </div>
            <div class="skills_details">
                <h3>Skills</h3>
                <div>
                    <div>Leadership</div>
                    <div class="progress_bar">
                        <div class="progress_bar_fill" style="width: 70%;"></div>
                    </div>
                    <div>Project Management</div>
                    <div class="progress_bar">
                        <div class="progress_bar_fill" style="width: 65%;"></div>
                    </div>
                    <div>Critical Thinking</div>
                    <div class="progress_bar">
                        <div class="progress_bar_fill" style="width: 75%;"></div>
                    </div>
                    <div>Problem Solving</div>
                    <div class="progress_bar">
                        <div class="progress_bar_fill" style="width: 80%;"></div>
                    </div>
                </div>
            </div>
        </div>
        <section class="languages">
            <h3>Languages</h3>
            <div>English</div>
            <div class="progress_bar">
                <div class="progress_bar_fill" style="width: 90%;"></div>
            </div>
            <div>Tagalog</div>
            <div class="progress_bar">
                <div class="progress_bar_fill" style="width: 95%;"></div>
            </div>
        </section>
        <section class="hobbies">
            <h3>Hobbies</h3>
            <ul>
                <li>Coding</li>
                <li>Reading</li>
            </ul>
        </section>
    </div>
</body>

</html>