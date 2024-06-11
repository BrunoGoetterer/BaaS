<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
<link rel="icon" href="Bilder/tsunami.svg">
  <meta charset="UTF-8">
  <title>The Rooms</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


    <style>
.parallax {
            /* The image used */
            background-color:transparent;
    
            /* Set a specific height and create the parallax scrolling effect */
            height: 100vh;
            background-attachment: absolute;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
          
        }

        body {
            margin-left:50px;
            margin-right:50px;
            height:100px;
            size:100px;
            background-image: url("Bilder/background2.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

        .navbar-custom {
            background-color: rgb(34, 74, 110);
            opacity: 0.9;
        }

        .card {
          margin-left:5%;
          margin-top:30%;
          width: 70%;
          height: 80%;
          border-color: rgb(34, 74, 110);
        }

      

    </style>
</head>

<body>

<?php
  include "../../Backend/logic/header.php"; 
  ?>
    
    <div class="parallax">
  
<div class="row row-cols-1 row-cols-md-3 g-2">
<div class="col">
    <div class="card h-70">
        <img src="Bilder/bild1.jpeg" class="card-img-top" alt="Standard" width="600" height="300">
        <div class="card-body">
            <h4 class="card-title">Standard Room</h4>
            <p class="card-text">Our standard rooms offer a serene retreat with a king-sized bed, private bathroom, 
              high-speed Wi-Fi, flat-screen TV, mini-fridge, and access to all hotel amenities. Enjoy a refreshing shower or invigorating bath, 
              stay connected with our high-speed Wi-Fi.You have access to all the hotel's amenities, including the sparkling pool, invigorating fitness center, and more.</p>
        </div>
        <div class="card-footer d-flex align-items-center">
    <small class="text-body-secondary">250€ per night</small>
    <a href="booking.php" class="btn btn-primary" style="margin-left: auto; display: block;">Book Room</a>
</div>
    </div>
</div>
<div class="col">
    <div class="card h-70">
        <img src="Bilder/bild2.jpg" class="card-img-top" alt="Bungalow" width="600" height="300">
        <div class="card-body">
            <h4 class="card-title">Bungalow</h4>
            <p class="card-text">Nestled amidst lush, swaying palm trees and overlooking the crystal-clear waters of the turquoise ocean, 
              the tropical hotel bungalow is a paradise retreat like no other. Located on a pristine, 
              sun-kissed beach in a secluded corner of a tropical paradise, this bungalow offers the perfect blend of luxury and nature.</p>
        </div>
        <div class="card-footer d-flex align-items-center">
    <small class="text-body-secondary">450€ per night</small>
    <a href="booking.php" class="btn btn-primary" style="margin-left: auto; display: block;">Book Room</a>
</div>
    </div>
</div>
<div class="col">
    <div class="card h-70">
        <img src="Bilder/bild3.jpg" class="card-img-top" alt="Luxury-Bungalow" width="600" height="300">
        <div class="card-body">
            <h4 class="card-title">Luxury-Bungalow</h4>
            <p class="card-text">Indulge in the epitome of tropical luxury in our exquisite bungalow, where opulent comfort meets breathtaking 
              natural beauty. Unwind in spacious, elegantly appointed interiors, 
              complemented by a private pool and butler service, ensuring an unforgettable retreat.</p>
        </div>
        <div class="card-footer d-flex align-items-center">
    <small class="text-body-secondary">650€ per night</small>
    <a href="booking.php" class="btn btn-primary" style="margin-left: auto; display: block;">Book Room</a>
</div>
    </div>
</div>
</div>
</div> 
      </div>
      

      
</body>

</html>