<?php
require_once("../../Backend/config/dbaccess.php"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="../../Frontend/Bilder/123.png">
<meta charset="UTF-8">
<title>Products</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="../CSS/product.css">
<link rel="stylesheet" href="../CSS/showproducts.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>

<?php include "../../Backend/logic/header.php"; ?>

<h2 class="title">Baas newest Products:</h2>
<div class="container">
    <?php include "../../Backend/logic/showproducts.php"; ?>
</div>

</body>
</html>
