<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Oswald:wght@200..700&family=Poppins&display=swap" rel="stylesheet">
    <title>1-Measure Converter</title>
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: #e8e8e8;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .converter {
            padding: 20px;
            width: 70%;
            max-width: 600px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .main_section {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .left_section,
        .right_section {
            flex: 1;
        }

        .divider {
            width: 2px;
            background-color: #ccc;
            height: auto;
            margin: 0 20px;
        }

        h3 {
            margin-bottom: 10px;
            color: #666;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 20px;
            font-family: 'Poppins', sans-serif;
        }

        input[type="radio"] {
            margin-right: 10px;
        }

        button {
            padding: 10px 20px;
            background-color: #6a7fcb;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin: 0 5px;
            flex: 1;
            font-family: 'Poppins', sans-serif;
        }

        button:hover {
            background-color: #5a6ebf;

        }

        .convert_button {
            text-align: center;
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }

        .result {
            text-align: center;
            margin-top: 20px;
            padding: 10px;
            background-color: #f2f2f2;
            border-radius: 4px;
            color: #333;
        }

        .converter {
            padding: 20px;
            width: 70%;
            max-width: 600px;
            background-color: #f3f1ee;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;

        }

        .converter:hover {
            transform: scale(1.02);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }
    </style>
</head>

<body>
    <div class="converter">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h1>Measure Converter</h1>
            <div class="main_section">
                <div class="left_section">
                    <h3>From</h3>
                    <input type="text" name="length" placeholder="Enter Measure" value="<?php echo isset($_POST['length']) ? htmlspecialchars($_POST['length']) : ''; ?>">
                    <?php
                    $units = ["Meter", "Kilometer", "Centimeter", "Milimeter", "Micrometer", "Nanometer", "Mile", "Yard", "Foot", "Inch"];
                    foreach ($units as $unit) {
                        $checked = '';
                        if (isset($_POST['from_unit']) && $_POST['from_unit'] === $unit) {
                            $checked = 'checked';
                        }
                        echo "<input type='radio' name='from_unit' value='$unit' $checked> $unit<br>";
                    }
                    ?>
                </div>
                <div class="divider"></div>
                <div class="right_section">
                    <h3>To</h3>
                    <select name="to_unit">
                        <option value="" disabled selected>Select Unit</option>
                        <?php
                        $units = ["Meter", "Kilometer", "Centimeter", "Milimeter", "Micrometer", "Nanometer", "Mile", "Yard", "Foot", "Inch"];
                        foreach ($units as $unit) {
                            $selected = '';
                            if (isset($_POST['to_unit']) && $_POST['to_unit'] === $unit) {
                                $selected = 'selected';
                            }
                            echo "<option value='$unit' $selected>$unit</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="convert_button">
                <button type="submit" name="convert">Convert</button>
            </div>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['convert'])) {
            $length = floatval($_POST['length']);
            $from_unit = $_POST['from_unit'];
            $to_unit = $_POST['to_unit'];

            $conversion = array(
                "Meter" => 1,
                "Kilometer" => 1000,
                "Centimeter" => 0.01,
                "Milimeter" => 0.001,
                "Micrometer" => 0.000001,
                "Nanometer" => 0.000000001,
                "Mile" => 1609.344,
                "Yard" => 0.9144,
                "Foot" => 0.3048,
                "Inch" => 0.0254
            );


            if (!isset($conversion[$from_unit]) || !isset($conversion[$to_unit])) {
                echo "<div class='result'>Conversion not supported.</div>";
            } else {

                $length_in_meters = $length * $conversion[$from_unit];
                $converted_length = $length_in_meters / $conversion[$to_unit];
                $result = "{$length} {$from_unit} is equal to {$converted_length} {$to_unit}.";
                echo "<div class='result'>{$result}</div>";
            }
        }
        ?>
    </div>
</body>

</html>