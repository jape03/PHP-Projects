<?php

function volume_cube($side_length)
{
    return pow($side_length, 3);
}

function volume_rectangular_prism($length, $width, $height)
{
    return $length * $width * $height;
}

function volume_cylinder($radius, $height)
{
    return pi() * pow($radius, 2) * $height;
}

function volume_cone($radius, $height)
{
    return (1 / 3) * pi() * pow($radius, 2) * $height;
}

function volume_pyramid($base_area, $height)
{
    return (1 / 3) * $base_area * $height;
}

function volume_sphere($radius)
{
    return (4 / 3) * pi() * pow($radius, 3);
}

$examples = array(
    "Cube" => array('s' => 3),
    "Right Rectangular Prism" => array('l' => 3, 'w' => 4, 'h' => 5),
    "Cylinder" => array('r' => 3, 'h' => 5),
    "Pyramid" => array('B' => 6, 'h' => 4),
    "Cone" => array('r' => 3, 'h' => 5),
    "Sphere" => array('r' => 3)
);

$formulas = array(
    "Cube" => "V = s³",
    "Right Rectangular Prism" => "V = l × w × h",
    "Cylinder" => "V = π r² h",
    "Pyramid" => "V = (1/3) Bh",
    "Cone" => "V = (1/3) π r² h",
    "Sphere" => "V = (4/3) π r³"
);


foreach ($examples as $shape => $values) {
    switch ($shape) {
        case 'Cube':
            $volumes[$shape] = volume_cube($values['s']); // Change 'side_length' to 's'
            break;
        case 'Right Rectangular Prism':
            $volumes[$shape] = volume_rectangular_prism($values['l'], $values['w'], $values['h']); // Change 'length' to 'l', 'width' to 'w', and 'height' to 'h'
            break;
        case 'Cylinder':
            $volumes[$shape] = volume_cylinder($values['r'], $values['h']); // Change 'radius' to 'r'
            break;
        case 'Pyramid':
            $volumes[$shape] = volume_pyramid($values['B'], $values['h']); // Change 'base_area' to 'base_area'
            break;
        case 'Cone':
            $volumes[$shape] = volume_cone($values['r'], $values['h']); // Change 'radius' to 'r'
            break;
        case 'Sphere':
            $volumes[$shape] = volume_sphere($values['r']); // Change 'radius' to 'r'
            break;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Oswald:wght@200..700&family=Poppins&display=swap" rel="stylesheet">
    <title></title>
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
    <table>
        <thead>
            <tr>
                <th>Shape</th>
                <th>Values</th>
                <th>Formula</th>
                <th>Volume</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($formulas as $shape => $formula) : ?>
                <tr>
                    <td><?php echo $shape; ?></td>
                    <td>
                        <?php
                        $values = $examples[$shape];
                        $value_str = '';
                        foreach ($values as $key => $value) {
                            $value_str .= "$key = $value, ";
                        }
                        $value_str = rtrim($value_str, ', ');
                        echo $value_str;
                        ?>
                    </td>
                    <td><?php echo $formula; ?></td>
                    <td><?php echo number_format($volumes[$shape], 2); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>