<?php
// Check if a session is not already active
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['status'])) {
    $status = $_SESSION['status'];
    if ($status === 'error') {
        echo '<div class="alert alert-danger" role="alert">' . $_SESSION['message'] . '</div>';
    }
    if ($status === 'success') {
        echo '<div class="alert alert-success" role="alert">' . $_SESSION['message'] . '</div>';
    }
    unset($_SESSION['status']);
    unset($_SESSION['message']);
}
?>
