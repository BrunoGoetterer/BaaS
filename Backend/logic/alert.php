<?php
function displayAlert() {
    if (isset($_SESSION['status']) && isset($_SESSION['message'])) {
        $status = $_SESSION['status'];
        $message = $_SESSION['message'];

        if ($status === 'error') {
            echo "<div class='alert alert-danger' role='alert'>$message</div>";
        } elseif ($status === 'success') {
            echo "<div class='alert alert-success' role='alert'>$message</div>";
        }

        unset($_SESSION['status']);
        unset($_SESSION['message']);
    }
}
?>
