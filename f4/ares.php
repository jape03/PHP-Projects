<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ares</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Oswald:wght@200..700&family=Poppins&display=swap" rel="stylesheet">
    <style>
        body,
        html {
            background: url('images/bg.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 10px;
            text-align: center;
        }

        img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        h1 {
            text-align: center;
            font-family: 'Anton', sans-serif;
            margin-bottom: 10px;
        }

        h2 {
            font-family: 'Oswald', sans-serif;
            margin-bottom: 20px;
        }

        p {
            line-height: 1.6;
        }
    </style>
</head>

<body>
    <div class="container">
        <img src="images/ares.jpg" alt="Ares" style="max-width: 400px;">
        <h1>Ares</h1>
        <h2>Greek God of War</h2>
        <p>Ares is the Greek god of war and courage. He is one of the Twelve Olympians, and the son of Zeus and Hera. The Greeks were ambivalent towards him. He embodies the physical valor necessary for success in war but can also personify sheer brutality and bloodlust, in contrast to his sister, the armored Athena, whose martial functions include military strategy and generalship. An association with Ares endows places, objects, and other deities with a savage, dangerous, or militarized quality.</p>
        <p>Although it would seem that a god who embodied war would be greatly respected and admired by the early Greeks, they seemed to have little use for Ares. This is likely because of his reckless and irresponsible behavior that often led him to be rash and act on his impulses instead of patiently contriving a thorough battle plan.</p>
        <p>Ares ultimately represents the destructive force that exists within us all. A force that must be consciously integrated and alchemized into that which is constructive.</p>

        <?php include 'go_back.php'; ?>
        
    </div>
</body>

</html>