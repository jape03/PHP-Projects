<?php
session_start();

if (!isset($_SESSION["display"])) {
    $_SESSION["display"] = "";
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["number"])) {
        $_SESSION["display"] .= $_POST["number"];
    } elseif (isset($_POST["decimal"])) {
        $_SESSION["display"] .= $_POST["decimal"];
    } elseif (isset($_POST["operator"])) {
        $_SESSION["display"] .= $_POST["operator"];
    } elseif (isset($_POST["calculate"])) {
        $_SESSION["display"] = eval("return " . $_SESSION["display"] . ";");
    } elseif (isset($_POST["clear"])) {
        $_SESSION["display"] = "";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* CSS */

        body {
            background-color: #f0f0f0;
            background-image: url(kokik.jpg);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            font-family: cursive;
            margin-top: 30px;
            color: #6c5b7b;
        }

        .display {
            font-size: 2em;
            width: 90%;
            max-width: 500px;
            height: 100px;
            background-color: #fff;
            border: 6px solid #f67280;
            border-radius: 15px;
            margin: auto;
            margin-top: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6c5b7b;
        }

        .calcu {
            width: 300px;
            max-width: 90%;
            border: 10px solid #f67280;
            border-radius: 15px;
            background-color: #ebebeb;
            padding: 20px;
            margin: 50px auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .button_row {
            width: 100%;
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .button {
            width: 60px;
            height: 60px;
            border: none;
            border-radius: 10px;
            font-size: 1.2em;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            background-color: #6c5b7b;
            color: #fff;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
        }

        .button:hover {
            background-color: #f67280;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
        }

        .button-container {
            display: inline-block;
            margin: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .button-container button {
            background-color: #EA4C89;
            border: none;
            border-radius: 8px;
            color: #FFFFFF;
            cursor: pointer;
            font-family: "Haas Grot Text R Web", "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 14px;
            font-weight: 500;
            height: 40px;
            line-height: 20px;
            outline: none;
            padding: 10px 16px;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s;
            user-select: none;

        }

        .button-container button:hover,
        .button-container button:focus {
            background-color: #F082AC;
        }
    </style>
</head>

<body>
    <h1>CALCULATOR</h1>
    <div class="calcu">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
            <div class="display" name="display"><?php echo htmlspecialchars($_SESSION["display"]); ?></div>
            <div class="button_row">
                <button class="button" type="submit" name="number" value="7">7</button>
                <button class="button" type="submit" name="number" value="8">8</button>
                <button class="button" type="submit" name="number" value="9">9</button>
                <button class="button" type="submit" name="operator" value="*">*</button>
            </div>
            <div class="button_row">
                <button class="button" type="submit" name="number" value="4">4</button>
                <button class="button" type="submit" name="number" value="5">5</button>
                <button class="button" type="submit" name="number" value="6">6</button>
                <button class="button" type="submit" name="operator" value="-">-</button>
            </div>
            <div class="button_row">
                <button class="button" type="submit" name="number" value="1">1</button>
                <button class="button" type="submit" name="number" value="2">2</button>
                <button class="button" type="submit" name="number" value="3">3</button>
                <button class="button" type="submit" name="operator" value="+">+</button>
            </div>
            <div class="button_row">
                <button class="button" type="submit" name="number" value="0">0</button>
                <button class="button" type="submit" name="decimal" value=".">.</button>
                <button class="button" type="submit" name="operator" value="/">/</button>
                <button class="button" type="submit" name="calculate" value="=">=</button>
            </div>
        </form>
    </div>
    <div class="button-container">
        <form action="index.php" method="post">
            <button type="submit" name="clear" value="clear">CLEAR</button>
        </form>
    </div>
</body>

</html>