<?php
session_start();
require_once("../../Backend/config/dbaccess.php");

$username = $_POST['username'];
$password = $_POST['password'];

$connection = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($connection->connect_error) {
    $_SESSION["error"] = "Connection failed: " . $connection->connect_error;
    header("Location: ../../Frontend/sites/login.php");
    exit;
}

$select = "SELECT * FROM users WHERE username = ? AND password = ?";
$stmt = $connection->prepare($select);

$hashedPassword = hash("sha256", $password);
$stmt->bind_param("ss", $username, $hashedPassword);

if ($stmt->execute()) {
    $userResult = $stmt->get_result();
    if ($userResult->num_rows > 0) {
        $userRow = $userResult->fetch_assoc();
        if ($userRow['accountstatus'] == '0') {
            $_SESSION["error"] = "Your account has been temporarily deactivated. Please contact support.";
            header("Location: ../../Frontend/sites/login.php");
            exit;
        }
        $_SESSION["currentUser"] = $userRow;
        header("Location: ../../Frontend/sites/index.php");
    } else {
        $_SESSION["error"] = "Invalid username or password";
        header("Location: ../../Frontend/sites/login.php");
    }
} else {
    $_SESSION["error"] = "Unable to complete the request.";
    header("Location: ../../Frontend/sites/login.php");
}

$stmt->close();
$connection->close();
?>
