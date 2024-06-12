<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../../Frontend/Bilder/123.png">
    
    <meta charset="UTF-8">
    <title>User Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="../CSS/user_management.css">
</head>

<body>

    <?php
    include "../../Backend/logic/header.php";
    include "../../Backend/logic/user_management_logic.php";
    ?>

    <div class="container">
        <?php
        // Check if the query was successful
        if ($userResult && $userResult->num_rows > 0) {
            // Loop through the results -> each iteration of the loop corresponds to one user
            while ($userRow = $userResult->fetch_assoc()) {
                $result_bookings = fetchUserBookings($connection, $userRow["id"]);
                ?>
                <div class='container d-flex justify-content-center align-items-center'
                    style='margin-top: 150px; min-height:50vh; width: 50%; background-color: #f8f9fa; color: #343a40;  border-radius: 15px;'>
                    <div class='content-wrapper'>
                        <form action='../../Backend/config/user_update.php' method='post'>
                            <?php displaySessionStatus(); ?>
                            <input type='hidden' name='bookingID' value='<?= $userRow["id"] ?>'>
                            <label for='username'>Username:</label>
                            <!-- hidden because it is only used to pass userID to user_update -> not meant for user interaction -->
                            <input type='hidden' name='userID' value='<?= $userRow["id"] ?>'>

                            <input type='text' id='username' name='username' value='<?= $userRow["username"] ?>'><br>
                            <label for='useremail'>Email:</label>
                            <input type='email' id='useremail' name='useremail' value='<?= $userRow["useremail"] ?>'><br>
                            <label for='firstname'>First Name:</label>
                            <input type='text' id='firstname' name='firstname' value='<?= $userRow["firstname"] ?>'><br>
                            <label for='lastname'>Last Name:</label>
                            <input type='text' id='lastname' name='lastname' value='<?= $userRow["lastname"] ?>'><br>
                            <label for='role'>Role:</label>
                            <input type='int' id='role' name='role' value='<?= $userRow["role"] ?>'><br>
                            <label for='accountstatus'>Account Status:</label>
                            <select id='accountstatus' name='accountstatus'>
                                <option value='1' <?= $userRow["accountstatus"] == '1' ? "selected" : "" ?>>Active</option>
                                <option value='0' <?= $userRow["accountstatus"] == '0' ? "selected" : "" ?>>Deactivated</option>
                            </select><br>
                            <button type="submit" class="btn btn-dark" style='margin-top:2%'>Update User</button>
                        </form><br />
                        <label for='booking'>Booking:</label>

                        <?php
                        // Check if a booking exists for the user
                        if ($result_bookings && $result_bookings->num_rows > 0) {
                            $bookingCount = 1;
                            while ($row_booking = $result_bookings->fetch_assoc()) {
                                ?>
                                <div>
                                    <button class='btn btn-primary mb-3' type='button' data-bs-toggle='collapse'
                                        data-bs-target='#booking-<?= $row_booking['id'] ?>' aria-expanded='false'
                                        aria-controls='booking<?= $bookingCount ?>'>
                                        Booking <?= $bookingCount ?>
                                    </button>
                                    <div class='collapse' id='booking-<?= $row_booking['id'] ?>'>
                                        <div class='card card-body'>
                                            <form action='../../Backend/config/bestellung_update.php' method='post'>
                                                <input type='hidden' name='bookingID' value='<?= $row_booking["id"] ?>'>
                                                <label for='quantity'>Quantity:</label>
                                                <input type='text' id='quantity' name='quantity' value='<?= $row_booking["quantity"] ?>'><br>
                                                <label for='roomtype'>Room Type:</label>
                                                <input type='text' id='roomtype' name='roomtype' value='<?= $row_booking["roomtype"] ?>'><br>
                                                <label for='date_start'>Start Date:</label>
                                                <input type='text' id='date_start' name='date_start' value='<?= $row_booking["date_start"] ?>'><br>
                                                <label for='date_end'>End Date:</label>
                                                <input type='text' id='date_end' name='date_end' value='<?= $row_booking["date_end"] ?>'><br>
                                                <label for='breakfast'>Breakfast:</label>
                                                <input type='text' id='breakfast' name='breakfast' value='<?= $row_booking["breakfast"] ?>'><br>
                                                <label for='parking'>Parking:</label>
                                                <input type='text' id='parking' name='parking' value='<?= $row_booking["parking"] ?>'><br>
                                                <label for='pets'>Pets:</label>
                                                <input type='text' id='pets' name='pets' value='<?= $row_booking["pets"] ?>'><br>
                                                <label for='creationdate'>Creation Date:</label>
                                                <input type='text' id='creationdate' name='creationdate' value='<?= $row_booking["creationdate"] ?>'><br>
                                                <input type='text' id='price' name='price' value='<?= $row_booking["price"] ?>'><br>
                                                <label for='status'>Status:</label>
                                                <select id='status' name='status'>
                                                    <option value='1' <?= $row_booking["status"] == 1 ? "selected" : "" ?>>New</option>
                                                    <option value='2' <?= $row_booking["status"] == 2 ? "selected" : "" ?>>Confirmed</option>
                                                    <option value='3' <?= $row_booking["status"] == 3 ? "selected" : "" ?>>Canceled</option>
                                                </select><br>
                                                <input type='submit' style='margin-top:2%' value='Update Booking'>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $bookingCount++;
                            }
                        } else {
                            ?>
                            <input type='text' id='booking' name='booking' value='No current bookings'><br>
                            <?php
                        }
                        ?>

                    </div>
                </div>
                <?php
            }
        } else {
            echo "No users found";
        }

        // Close the connection
        if ($connection) {
            $connection->close();
        }
        ?>
    </div>
</body>

</html>
