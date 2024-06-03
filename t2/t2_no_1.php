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
            <th colspan="4">My Fruits</th>
        </tr>
        <tr>
            <td>Image</th>
            <td>Name</th>
            <td>Description</th>
            <td>Facts</td>
        </tr>
        <?php

        $fruits = array(
            array(
                "name" => "Apple",
                "images" => "https://raw.githubusercontent.com/jape03/PHP-Projects/main/t2/images_t2/apple.jpg",
                "description" => "The apple is one of the pome (fleshy) fruits. Apples at harvest vary widely in size, shape, colour, and acidity, but most are fairly round and some shade of red or yellow. The thousands of varieties fall into three broad classes: cider, cooking, and dessert varieties.",
                "Facts" => "Rich in protective polyphenols, studies also suggest that including foods like apples in your regular diet may reduce the risk of certain cancers and from developing conditions such as type 2 diabetes."
            ),
            array(
                "name" => "Avocado",
                "images" => "https://raw.githubusercontent.com/jape03/PHP-Projects/main/t2/images_t2/avocado.jpg",
                "description" => "An avocado is a bright green fruit with a large pit and dark leathery skin. It's also known as alligator pear or butter fruit. Avocados are a favorite of the produce section. They're the go-to ingredient for guacamole dips.",
                "Facts" => "Avocados have been applauded for their nutrient density, with just half an average fruit counting as 1 portion of your 5-a-day. They’re an excellent source of monounsaturated fat and vitamin E, and a good source of folate – all of which benefit the heart."
            ),
            array(
                "name" => "Banana",
                "images" => "https://raw.githubusercontent.com/jape03/PHP-Projects/main/t2/images_t2/banana.jpg",
                "description" => "Bananas are long, curved fruits with smooth, yellow, and sometimes slightly green skin. The average length of a banana is about 7 to 9 inches, and it is about 2 to 3 inches in diameter.",
                "Facts" => "Bananas are another high pectin fruit, this soluble fibre helps promote feelings of fullness, may reduce bloating and has a soothing effect on the gut."
            ),
            array(
                "name" => "Blackberries",
                "images" => "https://raw.githubusercontent.com/jape03/PHP-Projects/main/t2/images_t2/blackberries.jpg",
                "description" => "The berries are 1 to 3cm diameter, changing colour from green to red to black as it ripens — each berry an aggregate of many single-seeded juicy segments (drupelets).",
                "Facts" => "Although low in calories, blackberries have even more vitamin C, folate and fibre than the much-acclaimed blueberry."
            ),
            array(
                "name" => "Blackcurrants",
                "images" => "https://raw.githubusercontent.com/jape03/PHP-Projects/main/t2/images_t2/blackcurrants.jpg",
                "description" => "small dark berries from bushes that are extensively grown in Europe and consumed in a variety of products, although the primary product is juice.",
                "Facts" => "With 30 times more vitamin C and 40% more protective polyphenols than blueberries, these are the undeclared stars of the fruit garden. Numerous studies suggest they’re of benefit for high blood pressure and other cardiovascular illnesses."
            ),
            array(
                "name" => "Blueberries",
                "images" => "https://raw.githubusercontent.com/jape03/PHP-Projects/main/t2/images_t2/blueberries.jpg",
                "description" => "These small, round berries are about 0.2–0.6 inches (5–16 mm) in diameter, and their color can range from blue to purple",
                "Facts" => "Reputed for being rich in naturally occurring plant compounds such as ellagic acid and anthocyanins – these compounds in blueberries have protective properties, which help the body combat a long list of diseases."
            ),
            array(
                "name" => "Cherries",
                "images" => "https://raw.githubusercontent.com/jape03/PHP-Projects/main/t2/images_t2/cherries.jpg",
                "description" => "The perfect Cherry is rounded with a slight heart shape and dimple at its stem end. The skin is thin and taut with deep red coloring.",
                "Facts" => "Another valuable source of anthocyanins, cherries appear to have anti-inflammatory effects. Initial research has shown that these plant compounds may be beneficial in inflammatory conditions including arthritis."
            ),
            array(
                "name" => "Cranberries",
                "images" => "https://raw.githubusercontent.com/jape03/PHP-Projects/main/t2/images_t2/cranberries.jpg",
                "description" => "Cranberries are small, hard, round, red fruits known for their bitter or tart flavor.",
                "Facts" => "There are many studies supporting cranberry juice as a means to help prevent a UTI and its reoccurrence, but it appears to be less effective once the infection has taken hold."
            ),
            array(
                "name" => "Grapefruit",
                "images" => "https://raw.githubusercontent.com/jape03/PHP-Projects/main/t2/images_t2/grapefruit.jpg",
                "description" => "a natural cross between pomelo and orange and its origin dates back to the 18th century. It is known for large fruit size, thick peel, and typical citrus fruit taste with bitter tinges, which is due to the high content of naringin, limonoids, and furanocoumarins.",
                "Facts" => "Eating citrus fruit regularly is thought to improve heart health since a diet high in citrus flavonoids – the plant compounds found in the likes of grapefruit – may help lower the risk of stroke."
            ),
            array(
                "name" => "Grapes",
                "images" => "https://raw.githubusercontent.com/jape03/PHP-Projects/main/t2/images_t2/grapes.jpg",
                "description" => "a fruit, botanically a berry, of genus Vitis and family Vitaceae. Grapes grow in clusters of 15–300 in different colors (crimson, black, dark blue, yellow, green, orange, pink, and white) and are specifically a nonclimacteric type and deciduous crop.",
                "Facts" => "The plant compounds in grapes, including resveratrol and quercetin, are thought to benefit the cardiovascular system, protecting it from inflammatory damage."
            )
        );


        sort($fruits);

        foreach ($fruits as $fruit) {
            echo '<tr>';
            echo '<td><img src="' . $fruit['images'] . '" class="image" alt="' . $fruit['name'] . '"></td>';
            echo '<td>' . $fruit['name'] . '</td>';
            echo '<td>' . $fruit['description'] . '</td>';
            echo '<td>' . $fruit['Facts'] . '</td>';
            echo '</tr>';
        }

        ?>

    </table>

</body>

</html>