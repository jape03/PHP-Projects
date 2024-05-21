<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>No-3</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Oswald:wght@200..700&family=Poppins&display=swap" rel="stylesheet">
</head>
<style>
    body,
    html {
        font-family: 'Poppins', sans-serif;
        background: #e8e8e8;
        justify-content: center;
    }

    table {
        border-collapse: collapse;
        width: 80%;
        margin: 0 auto;

    }

    th,
    td {
        border: 1px solid #dddddd;
        text-align: center;
        padding: 8px;
    }

    tr {
        text-align: center;
        background-color: #f2f2f2;
    }
</style>

<body>
    <?php
    function calculate($x, $y, $z) {
        $sum = $x + $y + $z;
        $difference = $x - $y - $z;
        $product = $x * $y * $z;
        $quotient = "Undefined";
        if ($y != 0 && $z != 0) {
            $quotient = $x / ($y * $z);
        }

        echo "<table>";
        echo "<tr><th colspan='2'>$x, $y, $z</th></tr>";
        echo "<tr><td>Addition</td><td>$sum</td></tr>";
        echo "<tr><td>Subtraction</td><td>$difference</td></tr>";
        echo "<tr><td>Multiplication</td><td>$product</td></tr>";
        echo "<tr><td>Division</td><td>$quotient</td></tr>";
        echo "</table>";
    }

    calculate(25, 13, 6);
    ?>
</body>
</html>
