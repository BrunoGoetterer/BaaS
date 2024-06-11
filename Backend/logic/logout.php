<?php
session_start();
unset($_SESSION['currentUser']);
session_destroy();
header("Location: ../../Frontend/sites/login.php");
exit;
?>
