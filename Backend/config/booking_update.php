<?php
session_start();

if (!isset($_SESSION['currentUser'])) {
    header("Location: ../login.php");
    exit();
}

$currentUser = $_SESSION['currentUser'];

require_once("dbaccess.php");

$connection = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Get the submitted data
$quantity = $_POST['quantity'];
$roomtype = $_POST['roomtype'];
$date_start = $_POST['date_start'];
$date_end = $_POST['date_end'];
$breakfast = $_POST['breakfast'];
$parking = $_POST['parking'];
$pets = $_POST['pets'];
$userID = $currentUser['id'];
$bookingID = $_POST['bookingID'];
$status = intval($_POST['status']); // converts this string to an integer

// Convert date_start and date_end to DateTime objects
$dateStart = new DateTime($date_start);
$dateEnd = new DateTime($date_end);

// Calculate the difference between the two dates
$interval = $dateStart->diff($dateEnd);

// Get the number of nights as the difference in days
$nights = $interval->days;

// Determine base price based on room type
switch ($roomtype) {
    case 1:
        $basePrice = 250;
        break;
    case 2:
        $basePrice = 450;
        break;
    case 3:
        $basePrice = 650;
        break;
    default:
        $basePrice = 0;
        break;
}

// Calculate additional price based on selected options
$additionalPrice = ($parking * 10) + ($pets * 10) + ($breakfast * 15);

// Calculate total price
$price = ($basePrice + $additionalPrice) * $nights;

// SQL query to update the booking
$update = "UPDATE bookings SET quantity=?, roomtype=?, date_start=?, date_end=?, breakfast=?, parking=?, pets=?, userID=?, status=?, price=? WHERE id=?";
$stmt = $connection->prepare($update); // prepare statement

// Bind parameters
$stmt->bind_param("iissiiiiidi", $quantity, $roomtype, $date_start, $date_end, $breakfast, $parking, $pets, $userID, $status, $price, $bookingID);

if ($stmt->execute()) {
    // Check if execution of prepared statement was successful 

    // Set success message in session
    $_SESSION['status'] = 'success';
    $_SESSION['message'] = 'Booking updated successfully!';

    // Redirect back to the user management page
    header("Location: ../user_management.php");
} else {
    // If an error exists, set error message in session
    $_SESSION['status'] = 'error';
    $_SESSION['message'] = 'An error occurred trying to update the booking! Please try again or contact support.';

    // Redirect back to the user management page
    header("Location: ../user_management.php");
}
?>