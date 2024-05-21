<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>No-1</title>
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

        .image {
            width: 100px;
            height: auto;
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
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Image</th>
            <th>Age</th>
            <th>Birthday</th>
            <th>Contact Number</th>
        </tr>
        <?php


        $richest = array(
            array("name" => "Bernard Arnault", "images" => "Bernard.jpg", "age" => "75", "birthday" => "March 5, 1949", "contact_num" => "09273846501"),
            array("name" => "Elon Musk", "images" => "Elon.jpg", "age" => "52", "birthday" => "June 28, 1971", "contact_num" => "09123456789"),
            array("name" => "Jeff Bezos", "images" => "Jeff.jpg", "age" => "60", "birthday" => "January 12, 1964", "contact_num" => "09384756210"),
            array("name" => "Mark Zuckerberg", "images" => "Mark.jpg", "age" => "40", "birthday" => "May 14, 1984", "contact_num" => "09561237849"),
            array("name" => "Larry Ellison", "images" => "Larry.png", "age" => "79", "birthday" => "August 17, 1944", "contact_num" => "09472618503"),
            array("name" => "Warren Buffett", "images" => "Warren.jpg", "age" => "93", "birthday" => "August 30, 1930", "contact_num" => "09203948576"),
            array("name" => "Bill Gates", "images" => "Bill.jpg", "age" => "68", "birthday" => "October 28, 1955", "contact_num" => "09628374510"),
            array("name" => "Steve Jobs", "images" => "Steve.jpg", "age" => "56", "birthday" => "October 5, 2011", "contact_num" => "09182736450"),
            array("name" => "Mukesh Ambani", "images" => "Mukesh.jpg", "age" => "67", "birthday" => "April 19, 1957", "contact_num" => "09364572819"),
            array("name" => "Sergey Brin", "images" => "Sergey.jpg", "age" => "50", "birthday" => "August 21, 1973", "contact_num" => "09487120365")

        );

        sort($richest);

        foreach ($richest as $no => $person) {

            echo '<tr>';
            echo '<td>' . ($no + 1) . '</td>';
            echo '<td>' . $person['name'] . '</td>';
            echo '<td><img src="' . $person['images'] . '" class="image" alt="' . $person['name'] . '"></td>';
            echo '<td>' . $person['age'] . '</td>';
            echo '<td>' . $person['birthday'] . '</td>';
            echo '<td>' . $person['contact_num'] . '</td>';
            echo '</tr>';
        }
        ?>

    </table>
</body>

</html>