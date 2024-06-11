<?php
require_once("../../Backend/config/dbaccess.php");

$connection = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// SQL query to get all entries from the 'products' table
$query = "SELECT * FROM products ORDER BY datum DESC";
$result = $connection->query($query);

if ($result->num_rows > 0) {
    $counter = 0;
    while($row = $result->fetch_assoc()) {
        if ($counter % 3 == 0) {
            echo '<div class="row">';
        }
?> 
        <div class="col-md-4 mb-4">
            <div class="card product-card">
                <img src="../../Backend/<?= $row['image'] ?>" class="card-img-top" alt="<?= $row['title'] ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= $row['title'] ?></h5>
                    <p class="card-text"><?= $row['price'] ?> €</p>
                </div>
            </div>
        </div>
<?php
        $counter++;
        if ($counter % 3 == 0) {
            echo '</div>';
        }
    }
    if ($counter % 3 != 0) {
        echo '</div>';
    }
}
?>
