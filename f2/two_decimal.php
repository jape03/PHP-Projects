<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>3- Two Decimal</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Oswald:wght@200..700&family=Poppins&display=swap" rel="stylesheet">
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

        .main {
            padding: 20px;
            width: 80%;
            max-width: 800px;
            background-color: #f3f1ee;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            text-align: justify; 
            font-size: 18px;
            overflow-wrap: break-word; 
        }

        .main:hover {
            transform: scale(1.02);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }
    </style>

</head>

<body>
    <div class="main" name="main">
        <?php
        echo "00";
        for ($i = 0; $i < 10; $i++) {
            for ($j = 0; $j < 10; $j++) {
                if ($i == 0 && $j == 0) {
                    continue;
                }
                printf(", %02d", $i * 10 + $j);
            }
        }
        ?>
    </div>
</body>
</html>
