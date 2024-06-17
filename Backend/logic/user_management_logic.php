<?php
// Check if session is not started, then start the session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once("../../Backend/config/dbaccess.php");

// Checks if there is a current user stored in the session. If there is, it assigns that user to the $currentUser variable.
if (isset($_SESSION["currentUser"])) {
    $currentUser = $_SESSION["currentUser"];
}

// Checks if a user is logged in and if he is an admin, if not redirect to login.php
if (!isset($currentUser) || $currentUser["role"] !== 1) {
    // Redirect to login.php
    header('Location: login.php');
    return;
}

// Ensure the database connection is established
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Select all users and return a result set with all users in the database
$sql = "SELECT * FROM users";
$userResult = $connection->query($sql);

// Function to check and display session status
function displaySessionStatus() {
    if (isset($_SESSION['status'])) {
        $status = $_SESSION['status'];
        $message = $_SESSION['message'];

        if ($status === 'error') { ?>
            <div class="alert alert-danger" role="alert">
                <?= htmlspecialchars($message) ?>
            </div>
        <?php } elseif ($status === 'success') { ?>
            <div class="alert alert-success" role="alert">
                <?= htmlspecialchars($message) ?>
            </div>
        <?php }

        unset($_SESSION['status']);
        unset($_SESSION['message']);
    }
}

// Function to fetch user bookings
function fetchUserBookings($connection, $userId) {
    $sql_bookings = "SELECT * FROM bookings WHERE userID = ?";
    $stmt = $connection->prepare($sql_bookings);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    return $stmt->get_result();
}
?>
