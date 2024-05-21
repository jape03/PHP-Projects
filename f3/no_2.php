<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>No-2</title>
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
    $numbers = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);

    $sum = array_sum($numbers);
    $subtraction = $numbers[0];
    for ($i = 1; $i < count($numbers); $i++) {
        $subtraction -= $numbers[$i];
    }
    $product = array_product($numbers);
    $quotient = $numbers[0];
    for ($i = 1; $i < count($numbers); $i++) {
        if ($numbers[$i] != 0) {
            $quotient /= $numbers[$i];
        } else {
            $quotient = "Undefined";
            break;
        }
    }

    ?>
    <table>
        <tr>
            <th colspan="2"><?php echo implode(', ', $numbers); ?></th>
        <tr>
            <td>Addition</td>
            <td><?php echo $sum; ?></td>
        </tr>
        <tr>
            <td>Subtraction</td>
            <td><?php echo $subtraction; ?></td>
        </tr>
        <tr>
            <td>Multiplication</td>
            <td><?php echo $product; ?></td>
        </tr>
        <tr>
            <td>Division</td>
            <td><?php echo $quotient; ?></td>
        </tr>
        </tr>
    </table>
</body>

</html>