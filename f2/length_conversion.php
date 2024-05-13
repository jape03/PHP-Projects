<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1-Length Converter</title>
    <style>
        h1 {
            text-align: center;
        }

        body,
        html {
            height: 100%;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
        }

        .converter {
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        button {
            padding: 8px 15px;
            margin-top: 10px;
        }

        button {
            cursor: pointer;
            background-color: #007BFF;
            color: white;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
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

        .convert_button {
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>
    <div class="converter">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h1>Length Converter</h1>
            <div class="main_section" name="main_section">
                <div class="left_section" name="left_section">
                    <input type="text" name="length" placeholder="From"> <br>
                    <input type="radio" name="unit" value="Meter"> Meter<br>
                    <input type="radio" name="unit" value="Kilometer"> Kilometer<br>
                    <input type="radio" name="unit" value="Centimeter"> Centimeter<br>
                    <input type="radio" name="unit" value="Milimeter"> Milimeter<br>
                    <input type="radio" name="unit" value="Micrometer"> Micrometer<br>
                    <input type="radio" name="unit" value="Nanometer"> Nanometer<br>
                    <input type="radio" name="unit" value="Mile"> Mile<br>
                    <input type="radio" name="unit" value="Yard"> Yard<br>
                    <input type="radio" name="unit" value="Foot"> Foot<br>
                    <input type="radio" name="unit" value="Inch"> Inch<br>
                </div>
                <div class="divider"></div>
                <div class="right_section" name="right_section">
                    <input type="text" name="length" placeholder="To" disabled> <br>
                    <input type="radio" name="unit" value="Meter"> Meter<br>
                    <input type="radio" name="unit" value="Kilometer"> Kilometer<br>
                    <input type="radio" name="unit" value="Centimeter"> Centimeter<br>
                    <input type="radio" name="unit" value="Milimeter"> Milimeter<br>
                    <input type="radio" name="unit" value="Micrometer"> Micrometer<br>
                    <input type="radio" name="unit" value="Nanometer"> Nanometer<br>
                    <input type="radio" name="unit" value="Mile"> Mile<br>
                    <input type="radio" name="unit" value="Yard"> Yard<br>
                    <input type="radio" name="unit" value="Foot"> Foot<br>
                    <input type="radio" name="unit" value="Inch"> Inch<br>
                </div>
            </div>
            <div class="convert_button">
                <button type="submit" name="convert">Convert</button>
            </div>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['convert'])) {
            $length = $_POST['length'];
        }
        ?>
    </div>
</body>

</html>