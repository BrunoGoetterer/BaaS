<?php

require_once("../config/dbaccess.php");

$connection = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

$anrede = $_POST['anrede'];
$firstName = $_POST['firstname'];
$lastName = $_POST['lastname'];
$username = $_POST['username'];
$useremail = $_POST['useremail'];
$address = $_POST['address']; 
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];

$password = hash("sha256", $_POST['password1']);

$insert = "INSERT INTO users (anrede, firstname, lastname, username, useremail, address, city, state, zip, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $connection->prepare($insert); // prepare statement

// Bind parameters
$stmt->bind_param("ssssssssis", $anrede, $firstName, $lastName, $username, $useremail, $address, $city, $state, $zip, $password);


session_start();

if ($stmt->execute()) { // Check If execution of prepared statement was successful
    // Redirect back to the registration page with a success message
    $_SESSION['status'] = "success";
    $_SESSION['message'] = "You have been registered successfully!";
    header("Location: ../../Frontend/sites/registration.php");
} else {
    // If an error exists, redirect to the registration page with an error message
    $_SESSION['status'] = "error";
    $_SESSION['message'] = "An error occurred while registering your account! Please contact support.";
    header("Location: ../../Frontend/sites/registration.php");
}

$stmt->close(); // close statement
$connection->close(); // close connection
?>
