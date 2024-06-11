<?php

// Check if a 'status' is set in the session
if (isset($_SESSION['status'])) {
    $status = $_SESSION['status'];

    // If the status is 'error', display an error alert with the message from the session
    if ($status === 'error') {
?>
        <div class="alert alert-danger" role="alert">
            <?= $_SESSION['message'] ?>
        </div>
<?php
    }
    // If the status is 'success', display a success alert with the message from the session
    if ($status === 'success') {
?>
        <div class="alert alert-success" role="alert">
            <?= $_SESSION['message'] ?>
        </div>
<?php
    }
}
// Remove 'status' and 'message' from the session
unset($_SESSION['status']);
unset($_SESSION['message']);
?>
