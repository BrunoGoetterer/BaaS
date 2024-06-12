<!DOCTYPE html>
<html lang="en">


<!-- Hier kommt in die Seite "Meine Bestellungen" hin, Logik ist bereits vorhanden allerdings noch veraltete Datenbank  -->


<head>
    <link rel="icon" href="Bilder/tsunami.svg">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Reservations</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    

    <link rel="stylesheet" type="text/css" href="../CSS/bestellungen.css">
</head>


<body>

<?php
  include "../../Backend/logic/header.php"; 
  ?>

    <div class="parallax">

    <!-- Check if there is a current user and say  Welcome to your reservations "username" -->
    <?php
        if (isset($currentUser)) { ?>
            <div class="container" id="hello">
               Welcome to your bookings <?= $currentUser["username"] ?>!
            </div>
        <?php } ?>
    
        <?php
    // Include your database connection file
    require_once("../../Backend/config/dbaccess.php"); 

    // Create  new mysqli object which will be used to interact with the database
    $connection = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    // Select all users and return a result set with all users in the database
    $sql = "SELECT * FROM users";
    $userResult = $connection->query($sql);

    $query = "SELECT * FROM bookings WHERE userID = " . $currentUser['id'];
    $result_bookings = $connection->query($query);

   
            // Check if a booking exists for the user
            if ($result_bookings->num_rows > 0) {
              $bookingCount = 1;
              while ($row_booking = $result_bookings->fetch_assoc()) {
                ?>
                <div class="d-flex justify-content-center">
                  <button class='btn btn-primary' type='button' data-bs-toggle='collapse'
                    data-bs-target='#booking<?= $bookingCount ?>' aria-expanded='false'
                    aria-controls='booking<?= $bookingCount ?>'>
                    Booking
                    <?= $bookingCount ?>
                  </button>
                  <div class='collapse' id='booking<?= $bookingCount ?>'>
                    <div class='card card-body' style='width: 70%; margin: auto;'>
                    <form action='../../Backend/config//bestellung_update.php' method='post'>
                    <input type='hidden' name='bookingID' value='<?= $row_booking["id"] ?>' disabled>
                    <label for='quantity'>Quantity:</label>
                    <input type='text' id='quantity' name='quantity' value='<?= $row_booking["quantity"] ?>' disabled><br>
                    <label for='roomtype'>Room Type:</label>
                    <input type='text' id='roomtype' name='roomtype' value='<?= $row_booking["roomtype"] ?>' disabled><br>
                    <label for='date_start'>Start Date:</label>
                    <input type='text' id='date_start' name='date_start' value='<?= $row_booking["date_start"] ?>' disabled><br>
                    <label for='date_end'>End Date:</label>
                    <input type='text' id='date_end' name='date_end' value='<?= $row_booking["date_end"] ?>' disabled><br>
                    <label for='breakfast'>Breakfast:</label>
                    <input type='text' id='breakfast' name='breakfast' value='<?= $row_booking["breakfast"] ?>' disabled><br>
                    <label for='parking'>Parking:</label>
                    <input type='text' id='parking' name='parking' value='<?= $row_booking["parking"] ?>' disabled><br>
                    <label for='pets'>Pets:</label>
                    <input type='text' id='pets' name='pets' value='<?= $row_booking["pets"] ?>' disabled><br>
                    <label for='creationdate'>Creation Date:</label>
                    <input type='text' id='creationdate' name='creationdate' value='<?= $row_booking["creationdate"] ?>' disabled><br>
                    <label for='status'>Status:</label>
                    <input type='text' id='status' name='status' value='<?= $row_booking["status"] ?>'disabled><br>
                    <label for='price'>Price:</label>
                    <input type='text' id='price' name='price' value='<?= $row_booking["price"] ?>' disabled><br>
                </form>
                      
                    </div>
                  </div>
                </div>
                <?php
                $bookingCount++;
              }
            } else {
                ?>
                <form class='text-center'>
                    <input type='text' id='booking' name='booking' value='No current bookings' readonly>
                </form>
        <?php

            }
            ?>
        </div>
        
        










</body>

</html>