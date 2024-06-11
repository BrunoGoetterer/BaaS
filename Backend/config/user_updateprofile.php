<?php

// This function gets the value from Post or from the current users data if value is not found it returns an empty string.

function getValueOrDefault($name, $currentUser)
{
    if (isset($_POST[$name]) && !empty($_POST[$name])) {
        return $_POST[$name];
    }

    if (isset($currentUser[$name]) && !empty($currentUser[$name])) {
        return $currentUser[$name];
    }

    return "";
}

session_start();

if (!isset($_SESSION['currentUser'])) {
    header("Location: ../login.php");
    exit();
}

$currentUser = $_SESSION['currentUser'];

require_once("dbaccess.php");

$connection = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Get the submitted data
$userID = $currentUser['id'];
$useremail = getValueOrDefault('useremail', $currentUser);
$firstname = getValueOrDefault('firstname', $currentUser);
$lastname = getValueOrDefault('lastname', $currentUser);
$anrede = getValueOrDefault('anrede', $currentUser);

// SQL query to update the user
$update = "UPDATE users SET useremail=?, anrede=?, firstname=?, lastname=? WHERE id=?";
$stmt = $connection->prepare($update); // prepare statement

// Bind parameters
$stmt->bind_param("ssssi", $useremail, $anrede, $firstname, $lastname, $userID);

if ($stmt->execute()) {
    // Check if execution of prepared statement was successful 

    // Update the user in the session. Retrieves the  value from the form data or the current user's data thanks to our getValueOrDefault function.
    $_SESSION['currentUser'] = [
        "id" => $userID,
        "username" => $currentUser["username"],
        "password" => $currentUser["password"],
        "useremail" => $useremail,
        "anrede" => $anrede,
        "firstname" => $firstname,
        "lastname" => $lastname,
        "role" => $currentUser["role"]
    ];

    // Set success message in session
    $_SESSION['status'] = 'success';
    $_SESSION['message'] = 'User updated successfully!';

    // Redirect back to the user management page
    header("Location: ../profile.php");
} else {
    // If an error exists, set error message in session
    $_SESSION['status'] = 'error';
    $_SESSION['message'] = 'An error occurred trying to update the user! Please try again or contact support.';

    // Redirect back to the user management page
    header("Location: ../profile.php");
}
