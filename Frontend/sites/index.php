<!DOCTYPE html>
<html lang="en">

<head>
<link rel="icon" href="../../Frontend/Bilder/123.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ocean Breeze</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <style>
        .parallax {
            /* The image used */
            background-color: transparent;

            /* Set a specific height and create the parallax scrolling effect */
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }


        body {
            margin: 0;
            padding: 0;
            background-image: url("../../Frontend/Bilder/backgroundLego.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            color: white;
       
        }

        .navbar-custom {
            background-color: rgb(34, 74, 110);
        }

        .images {
            display: flex;
            justify-content: center;
            margin-top: 100px;
            
        }

        .photo img {
            width: 200;
            height: 200;
        }

        #hello {
            margin-top: 130px;
            margin-bottom: 20px;
            text-align: center;
            font-size: 55px;
            font-style: italic;
            text-shadow: 2px 2px 4px #000000;
        }
    </style>

</head>


<body>

    <?php
    // Include the header file
    include "../../Backend/logic/header.php";

    // Check if currentUser is set
    if (isset($currentUser)) {
        ?>
        <div class="container" id="hello">
            Hello, <?= $currentUser["username"] ?>!
        </div>
    <?php } ?>

    <div class="images">
        <div class="photo">
            <img src="../../Frontend/Bilder/welcomeLego.png"   alt="photo" />
        </div>
    </div>

</body>

</html>
