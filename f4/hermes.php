<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hermes</title>
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
        <img src="images/hermes.jpg" alt="Hermes" style="max-width: 400px;">
        <h1>Hermes</h1>
        <h2>Greek Messenger God</h2>
        <p>"If thou but settest foot on this path, thou shalt see it everywhere"</p>
        <p>Hermes is considered the herald of the gods. He is also considered the protector of human heralds, travellers, thieves, merchants, and orators. He is able to move quickly and freely between the worlds of the mortal and the divine, aided by his winged sandals. Hermes plays the role of the psychopomp or "soul guide"—a conductor of souls into the afterlife.</p>
        <p>In myth, Hermes functions as the emissary and messenger of the gods, and is often presented as the son of Zeus and Maia, the Pleiad. Hermes is regarded as "the divine trickster".</p>
        <p>Hermes began as a god with strong chthonic, or underworld, associations. He was a psychopomp, leader of souls along the road between "the Under and the Upper world".</p>

        <?php include 'go_back.php'; ?>
        
    </div>
</body>

</html>