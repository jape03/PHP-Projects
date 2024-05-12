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

    .logo {
        width: 16px;
        height: 16px;
        margin-right: 10px;
      
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
            <div class="info" name="name">John Paul Besagas</div>
            <div class="info" name="title">Software Engineer</div>
            <div class="contact">
                <div class="contact-item">
                    <img class="logo" name="email_pic" src="email.png">
                    <span class="info" name="email">202210802@fit.edu.ph</span>
                </div>
                <div class="contact-item">
                    <img class="logo" name="phone_pic" src="phone.png">
                    <span class="info" name="phone">09611974099</span>
                </div>
                <div class="contact-item">
                    <img class="logo" name="loc_pic" src="loc.png">
                    <span class="info" name="address">Montalban, Rizal 1860</span>
                </div>
            </div>
        </div>
        <div class="main_section">
            <div class="left_section">
                <section class="profile">
                    <h3>Profile</h3>
                    <p>I'm a software engineer skilled in C++, Python, and PHP. I excel in fast-paced environments and am dedicated to continual learning and staying current with industry practices.</p>
                </section>
                <section class="education">
                    <h3>Education</h3>
                    <div>
                        <span class="degree">Bachelor of Science in Computer Science with Specialization in Software Engineering</span>
                    </div>
                    <div class="institution">FEU Institute of Technology, Manila</div>
                </section>
                <section class="employment">
                    <h3>Employment</h3>
                    <div>
                        <div class="job1">Software Developer</div>
                        <div class="job1_descrip">ABC Inc. Manila</div>
                        <div class="job2">Software Engineer</div>
                        <div class="job2_descrip">XYZ Enterprise. Manila</div>
                    </div>
                </section>
                <section class="internship">
                    <h3>Internship</h3>
                    <p>Trainee Developer</p>
                    <p>Junior Developer</p>
                </section>
                <section class="certificate">
                    <h3>Certificates</h3>
                    <ul>
                        <li>Linux Professional Institute Certification</li>
                        <li>Python Institute Certifications</d>
                        <li>Microsoft Technology Associate</li>
                    </ul>
                </section>
            </div>
            <div class="divider"></div>
            <div class="right_section">
                <section class="personal_details">
                    <div>
                        <h3>Personal Details</h3>
                        <div class="personal_info">Date of Birth</div>
                        <div class="infox">April 3, 2004</div>
                        <div class="personal_info">Place of Birth</div>
                        <div class="infox">Jagna, Bohol</div>
                        <div class="personal_info">Gender</div>
                        <div class="infox">Male</div>
                        <div class="personal_info">Nationality</div>
                        <div class="infox">Filipino</div>
                        <div class="personal_info">Civil Status</div>
                        <div class="infox">Single</div>
                        <div class="personal_info">Website</div>
                        <div class="infox"><a href="johnpaulbesagas.me">johnpaulbesagas.me</a></div>
                    </div>
                </section>
                <section class="skills_details">
                    <div>
                        <h3>Skills</h3>
                        <div>Critical Thinking</div>
                        <div class="progress_bar">
                            <div class="progress_bar_fill" style="width: 95%;"></div>
                        </div>
                        <div>Project Management</div>
                        <div class="progress_bar">
                            <div class="progress_bar_fill" style="width: 75%;"></div>
                        </div>
                        <div>Leadership</div>
                        <div class="progress_bar">
                            <div class="progress_bar_fill" style="width: 80%;"></div>
                        </div>
                        <div>Problem Solving</div>
                        <div class="progress_bar">
                            <div class="progress_bar_fill" style="width: 95%;"></div>
                        </div>
                    </div>
                </section>
                <section class="pl">
                    <h3>Programming Language</h3>
                    <div class="language_container">
                        <div class="column">
                            <ul>
                                <li>C++</li>
                                <li>Java</li>
                                <li>Python</li>
                            </ul>
                        </div>
                        <div class="column">
                            <ul>
                                <li>PHP</li>
                                <li>HTML</li>
                                <li>CSS</li>
                            </ul>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</body>
</html>