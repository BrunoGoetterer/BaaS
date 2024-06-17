<?php
$dbUsername = "webtechie1";
$dbPassword = "admin1";
$dbHost = "localhost";
$dbName = "webtechie";

$connection = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>
