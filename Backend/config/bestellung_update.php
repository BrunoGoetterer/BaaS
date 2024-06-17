<?php
session_start();

if (!isset($_SESSION['currentUser'])) {
    header("Location: ../login.php");
    exit();
}

$currentUser = $_SESSION['currentUser'];

require_once("../../Backend/config/dbaccess.php");

$connection = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Get the submitted data
$bookingID = $_POST['bookingID'];
$title = $_POST['title'];
$price = $_POST['price'];
$created_at = $_POST['created_at'];

// SQL query to update the booking
$update = "UPDATE orders SET title=?, price=?, created_at=? WHERE id=?";
$stmt = $connection->prepare($update);

// Bind parameters
$stmt->bind_param("sdsi", $title, $price, $created_at, $bookingID);

if ($stmt->execute()) {
    // Set success message in session
    $_SESSION['status'] = 'success';
    $_SESSION['message'] = 'Order updated successfully!';

    // Redirect back to the user management page
    header("Location: ../../Frontend/sites/user_management.php");
} else {
    // If an error exists, set error message in session
    $_SESSION['status'] = 'error';
    $_SESSION['message'] = 'An error occurred trying to update the order! Please try again or contact support.';

    // Redirect back to the user management page
    header("Location: ../../Frontend/sites/user_management.php");
}
?>
