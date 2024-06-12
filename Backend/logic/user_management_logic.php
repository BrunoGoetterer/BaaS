<?php
session_start();
require_once("../../Backend/config/dbaccess.php");

// Checks if there is a current user stored in the session. If there is, it assigns that user to the $currentUser variable.
if (isset($_SESSION["currentUser"])) {
    $currentUser = $_SESSION["currentUser"];
}

// Checks if a user is logged and if he is an admin, if not redirect to login.php
if (!isset($currentUser) || $currentUser["role"] !== 1) {
    // Redirect to login.php
    header('Location: login.php');
    return;
}

// Create new mysqli object which will be used to interact with the database
$connection = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check for connection errors
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Select all users and return a result set with all users in the database
$sql = "SELECT * FROM users";
$userResult = $connection->query($sql);

// Function to check and display session status
function displaySessionStatus() {
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
}

// Function to fetch user bookings
function fetchUserBookings($connection, $userId) {
    $sql_bookings = "SELECT * FROM bookings WHERE userID = " . $userId;
    return $connection->query($sql_bookings);
}
?>
