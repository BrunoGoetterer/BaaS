<?php
$dbUsername = "webtechie1";
$dbPassword = "admin1";
$dbHost = "localhost";
$dbName = "webtechie";

$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
