<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../Frontend/Bilder/tsunami.svg">
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
            margin-left: 50px;
            margin-right: 50px;
            background-image: url("../Frontend/Bilder/background2.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            font-family: 'Times New Roman', Times, serif;
        }

        .navbar-custom {
            background-color: rgb(34, 74, 110);
        }

        .booking-form {
            background-color: #f8f9fa;
            color: #343a40;
            padding: 20px;
            border-radius: 5px;
        }
    </style>

</head>

<body>

    <?php
    include "../../Backend/logic/header.php";
     ?>
 

    <div class="parallax">

        <?php
        if (isset($currentUser)) { ?>
            <div class="container" id="hello">
                We are looking forward to your stay,
                <?= $currentUser["username"] ?>!
            </div>
        <?php } ?>
        <style>
            #hello {
                margin-top: 130px;
                margin-bottom: 20px;
                text-align: center;
                font-size: 55px;
                color: white;
                font-family: 'Times New Roman', Times, serif;
                font-style: italic;
                text-shadow: 2px 2px 4px #000000;
            }
        </style>

        <div class="row justify-content-center">
            <div class="col-md-4">
                <?php
                if (isset($_SESSION['status'])) {
                    $status = $_SESSION['status'];

                    if ($status === 'error') { ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $_SESSION['message'] ?>
                        </div>
                    <?php } ?>

                    <?php if ($status === 'success') { ?>
                        <div class="alert alert-success" role="alert">
                            <?= $_SESSION['message'] ?>
                        </div>
                    <?php }

                    unset($_SESSION['status']);
                    unset($_SESSION['message']);
                }
                ?>

                <form class="mt-3 booking-form" action="../Backend/config/insert_booking.php" method="POST">
                    <div class="form-group">
                        <label for="quantity">Room Quantity</label>
                        <input type="number" id="quantity" name="quantity" class="form-control" required value="1">
                    </div>
                    <div class="form-group">
                        <label for="roomType">Room Type</label>
                        <select id="roomType" name="roomtype" class="form-control">
                            <option value="1">Standard Room</option>
                            <option value="2">Bungalow</option>
                            <option value="3">Luxury-Bungalow</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="bookingDate">Booking Date Start</label>
                        <input type="date" id="date_start" name="date_start" required class="form-control" min="<?php echo date("Y-m-d"); ?>">
                    </div>
                    <div class="form-group">
                        <label for="bookingDate">Booking Date End</label>
                        <input type="date" id="date_end" name="date_end" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="breakfast">Breakfast +€10</label>
                        <select id="breakfast" name="breakfast" required class="form-control">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="parking">Parking +€10</label>
                        <select id="parking" name="parking" required class="form-control">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pets">Pets +€15</label>
                        <select id="pets" name="pets" required class="form-control">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Book Room</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
