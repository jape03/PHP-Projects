<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <title>TDL</title>
</head>

<body>

    <style>
        /* CSS */

        body {
            background-image: url("bg.jpg");
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            font-family: "Anton", sans-serif;
            color: lightcoral;
            font-weight: 400;
            font-style: normal;
            margin-top: 0;
            text-align: center;
        }

        .box {
            position: relative;
            display: inline-block;
            max-width: 100%;
            padding: 20px;
            border: 2px solid #333;
            border-radius: 10px;
            background-color: #f0f0f0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            font-family: Arial, sans-serif;
            font-size: 16px;
            color: #333;
            margin: 0 auto;

        }

        button {
            background-color: #eee;
            border: none;
            padding: 1rem;
            font-size: 1rem;
            width: 10em;
            border-radius: 1rem;
            color: lightcoral;
            box-shadow: 0 0.4rem #dfd9d9;
            cursor: pointer;
        }

        button:active {
            color: white;
            box-shadow: 0 0.2rem #dfd9d9;
            transform: translateY(0.2rem);
        }

        button:hover:not(:disabled) {
            background: lightcoral;
            color: white;
            text-shadow: 0 0.1rem #bcb4b4;
        }

        button:disabled {
            cursor: auto;
            color: grey;
        }

        .enterText {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border: none;
            width: auto;
            height: 50px;
            padding: 10px;
        }

        .enterText input[type="text"] {
            background-color: white;
            width: 350px;
            height: 40px;
            outline: none;
            border: none;
        }

        .text {
            margin: 10px;
            padding: 10px;
        }
    </style>
    <h1>TO DO LIST</h1>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <div class="container">
            <div class="box">
                <span class="enterText">
                    <input type="text" name="text[]" placeholder="Enter task ...">
                    <button class="add" type="submit" name="submit" value="submit_" style="float: right;">ADD TASK</button>
                    <button class="clear" type="submit" name="clear" value="clear" style="float: right;">CLEAR</button>
                </span>
                <div class="display">
                    <?php

                    session_start();

                    if (isset($_POST["submit"])) {
                        if (isset($_POST["text"]) && isset($_POST["checkbox"])) {
                            if (!isset($_SESSION['tasks'])) {
                                $_SESSION['tasks'] = [];
                            }
                        }
                        foreach ($_POST["text"] as $task) {
                        }
                        if (!empty($task)) {
                            $_SESSION["tasks"][] = $task;
                        }
                    }

                    if (isset($_POST["clear"])) {
                        unset($_SESSION["tasks"]);
                    }

                    if (isset($_SESSION["tasks"])) {
                        foreach ($_SESSION["tasks"] as $display) {
                            echo '<div class="checkbox-container"><span class="text">'
                                .
                                $display
                                .
                                '</span><input class="checkbox" type="checkbox" name="checkbox" value="checkbox_"></div>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
</body>
</html>