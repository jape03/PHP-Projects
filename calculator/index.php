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
        try {
            $_SESSION["display"] = eval("return " . $_SESSION["display"] . ";");
        } catch (ParseError $e) {
            $_SESSION["display"] = "Error";
        }
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <title>Document</title>
    <style>
        /* CSS */

        h1 {
            text-align: center;
            font-family: "Sofia", sans-serif;
            color: palevioletred;
            font-size: 100px;
        }

        .button_ {
            text-align: center;

        }

        body {
            background-image: url("kokik.jpg");
        }

        .display {
            text-align: center;
            font-size: 50px;
            font-family: "Sofia", sans-serif;
            color: #ee9ca7;
            width: 100%;
            height: 140px;
            background-color: white;
            border: 6px solid pink;
            border-radius: 10px;
            margin: auto;
        }

        .button_row {
            font-family: cursive;
            display: flex;
            justify-content: space-between;

        }

        .calcu {
            width: 500px;
            height: 400px;
            border: 10px solid pink;
            border-radius: 10px;
            background-color: lightgrey;
            padding: 40px;
            margin: 100px auto;
        }

        .button {
            background-image: linear-gradient(to right, #ee9ca7 0%, #ffdde1  51%, #ee9ca7  100%);
            margin: 10px;
            padding: 15px 45px;
            text-align: center;
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: whitesmoke;            
            box-shadow: 0 0 20px #eee;
            border-radius: 10px;
            display: block;
        }

        .grad:hover {
            background-position: right center; 
            color: #fff;
            text-decoration: none;
          }
         
    </style>
</head>

<body>

    <h1>CALCULATOR</h1>
    <div class="calcu">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
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
        <div class="display" name="display"><?php echo htmlspecialchars($_SESSION["display"]); ?></div>
    </div>
    <div class="button_">
        <form action="index.php" method="post">
            <button type="submit" name="clear" value="clear_">CLEAR</button>
            <a href="#" class="grad"></a>
        </form>
    </div>
</body>

</html>