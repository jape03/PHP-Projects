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
            background: url('images/bg.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        p {
            font-family: 'Poppins', sans-serif;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            width: 100%;
        }

        .image-container {
            position: relative;
            border: 1px solid #dddddd;
            margin: 8px;
            overflow: hidden;
        }

        .image-container img {
            width: 100%;
            max-width: 300px;
            height: 300px;
            object-fit: cover;
            transition: opacity 0.3s ease;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.6);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .image-container:hover img {
            opacity: 0.5;
        }

        .image-container:hover .overlay {
            opacity: 1;
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="zeus.php" class="image-link">
            <div class="image-container">
                <img src="images/zeus.jpg" alt="Story1">
                <div class="overlay">
                    <p>Zeus</p>
                </div>
            </div>
        </a>
        <a href="poseidon.php" class="image-link">
            <div class="image-container">
                <img src="images/poseidon.jpg" alt="Story2">
                <div class="overlay">
                    <p>Poseidon</p>
                </div>
            </div>
        </a>
        <a href="hermes.php" class="image-link">
            <div class="image-container">
                <img src="images/hermes.jpg" alt="Story3">
                <div class="overlay">
                    <p>Hermes</p>
                </div>
            </div>
        </a>
        <a href="hades.php" class="image-link">
            <div class="image-container">
                <img src="images/hadess.jpg" alt="Story4">
                <div class="overlay">
                    <p>Hades</p>
                </div>
            </div>
        </a>
        <a href="ares.php" class="image-link">
            <div class="image-container">
                <img src="images/ares.jpg" alt="Story5">
                <div class="overlay">
                    <p>Ares</p>
                </div>
            </div>
        </a>
    </div>
</body>
</html>
