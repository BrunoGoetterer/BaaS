<?php
session_start();

if (!isset($_SESSION['currentUser'])) {
    header("Location: ../login.php");
    exit();
}

$currentUser = $_SESSION['currentUser'];

require_once("dbaccess.php");

$connection = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Get the submitted data
$title = $_POST['title'];
$price = $_POST['price'];
$userID = $currentUser['id'];
$bookingID = $_POST['bookingID'];

// SQL query to update the booking
$update = "UPDATE bookings SET title=?, price=?, userID=? WHERE id=?";
$stmt = $connection->prepare($update); // prepare statement

// Bind parameters
$stmt->bind_param("sdii", $title, $price, $userID, $bookingID);

if ($stmt->execute()) {
    // Check if execution of prepared statement was successful 

    // Set success message in session
    $_SESSION['status'] = 'success';
    $_SESSION['message'] = 'Order updated successfully!';

    // Redirect back to the user management page
    header("Location: ../../Frontend/sites/user_management.php");
    exit();
} else {
    // If an error exists, set error message in session
    $_SESSION['status'] = 'error';
    $_SESSION['message'] = 'An error occurred trying to update the order! Please try again or contact support.';

    // Redirect back to the user management page
    header("Location: ../../Frontend/sites/user_management.php");
    exit();
}
?>
