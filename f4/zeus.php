<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Zeus</title>
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
        <img src="images/zeus.jpg" alt="Zeus" style="max-width: 400px;">
        <h1>Zeus</h1>
        <h2>King of the Greek Gods</h2>
        <p>The Dice of Zeus always fall luckily.</p>
        <p>Zeus is the sky and thunder god in ancient Greek religion, who rules as king of the gods on Mount Olympus. His name is cognate with the first element of his Roman equivalent Jupiter. His mythology and powers are similar, though not identical, to those of Indo-European deities such as Jupiter, Perkunas, Perun, Indra, Dyaus, and Zojz.</p>
        <p>He was respected as an allfather who was chief of the gods and assigned roles to the others. Even the gods who are not his natural children address him as Father, and all the gods rise in his presence.</p>
        <p>Zeus is arguably one of the most well-known figures in Mythology and for good reason... The whole world watches when he cracks open the sky.</p>
        
        <?php include 'go_back.php'; ?>
    </div>

</body>

</html>