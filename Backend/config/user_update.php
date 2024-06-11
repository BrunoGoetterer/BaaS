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
$userID = $_POST['userID'];
$username = $_POST['username'];
$useremail = $_POST['useremail'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$role = $_POST['role'];
$accountstatus = $_POST['accountstatus'];
$anrede = isset($_POST['anrede']) ? $_POST['anrede'] : '';

// SQL query to update the user
$update = "UPDATE users SET username=?, useremail=?, anrede=?, firstname=?, lastname=?, role=?, accountstatus=? WHERE id=?";
$stmt = $connection->prepare($update); // prepare statement

// Bind parameters
$stmt->bind_param("sssssiii", $username, $useremail, $anrede, $firstname, $lastname, $role, $accountstatus, $userID);


if ($stmt->execute()) {
    // Check if execution of prepared statement was successful 

    // Set success message in session
    $_SESSION['status'] = 'success';
    $_SESSION['message'] = 'User updated successfully!';

    // Redirect back to the user management page
    header("Location: ../user_management.php");
} else {
    // If an error exists, set error message in session
    $_SESSION['status'] = 'error';
    $_SESSION['message'] = 'An error occurred trying to update the user! Please try again or contact support.';

    // Redirect back to the user management page
    header("Location: ../user_management.php");
}
?>