<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>No-2</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Oswald:wght@200..700&family=Poppins&display=swap" rel="stylesheet">
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
</head>

<body>
    <?php
    $names = array(
        "aguilar", "albufera", "ambong", "andaya", "andor", "bangal", "berin", "besagas",
        "brecio", "cada", "caranto", "casin", "cilot", "cruz", "gabas", "ibarbia", "jimenez", "khandaker",
        "lappay", "manio"
    );
    ?>
    <table>
        <tr>
            <th colspan="6">The list of names</th>
        </tr>
        <tr>
            <th>Name</th>
            <th>Number of characters</th>
            <th>Uppercase first character</th>
            <th>Replace vowels with @</th>
            <th>Check position of character "a"</th>
            <th>Reverse Name</th>
        </tr>
        <?php foreach ($names as $name) : ?>
            <tr>
                <td><?php echo $name; ?></td>
                <td><?php echo strlen($name); ?></td>
                <td><?php echo ucfirst($name); ?></td>
                <td><?php echo str_replace(['a', 'e', 'i', 'o', 'u'], '@', $name); ?></td>
                <td><?php echo strpos($name, 'a') !== false ? strpos($name, 'a') : 0; ?></td>
                <td><?php echo strrev($name); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>
