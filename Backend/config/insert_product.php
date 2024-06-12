<?php
require_once("../config/dbaccess.php");

$connection = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

$tags = $_POST['tags'];
$title = $_POST['title'];
$price = $_POST['price'];
$imagePath = '';

session_start();

if (isset($_FILES["image"]) && $_FILES['image']['error'] == 0) {
    $image = $_FILES["image"]["name"];
    $uploadDir = "../uploads/products";
    $imagePathBase = "uploads/products";
    $imagePath = $imagePathBase . "/" . $image;
    $imageStoragePath = $uploadDir . "/" . $image;

    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    move_uploaded_file($_FILES["image"]["tmp_name"], $imageStoragePath);
}

// SQL query to insert data into the 'products' table
$insert = "INSERT INTO products (tags, title, price, image) VALUES (?,?,?,?)";

$stmt = $connection->prepare($insert); // prepare statement

// Bind parameters
$stmt->bind_param("ssds", $tags, $title, $price, $imagePath);

// Check if execution of prepared statement was successful 
if ($stmt->execute()) {
    $_SESSION['status'] = "success";
    $_SESSION["message"] = "Product uploaded successfully!";
    // Redirect back to the product upload page with a success message
    header("Location: ../../Frontend/sites/productupload.php");
} else {
    $_SESSION['status'] = "error";
    $_SESSION["message"] = "An error occurred while uploading the product! Please try again.";
    // If an error exists, redirect to the product upload page with an error message
    header("Location: ../../Frontend/sites/productupload.php");
}

$stmt->close(); // close statement
$connection->close(); // close connection
?>
