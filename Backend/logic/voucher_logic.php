<?php
session_start();
include '../../Backend/config/dbaccess.php'; 

if (!isset($_SESSION['currentUser']) || $_SESSION['currentUser']['role'] !== 1) {
    header("Location: ../../Frontend/sites/login.php");
    exit();
}

function generateVoucherCode($length = 5) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $length > $i; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

// Use the consistent connection variable name
if (!isset($connection)) {
    die("Database connection failed");
}

// Update status of expired vouchers
$currentDate = date('Y-m-d');
$stmt = $connection->prepare("UPDATE vouchers SET status = 'expired' WHERE expiry_date < ? AND status = 'valid'");
$stmt->bind_param("s", $currentDate);
$stmt->execute();
$stmt->close();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $value = $_POST['value'];
    $expiry_date = $_POST['expiry_date'];
    $code = generateVoucherCode();

    $stmt = $connection->prepare("INSERT INTO vouchers (code, value, expiry_date) VALUES (?, ?, ?)");
    $stmt->bind_param("sds", $code, $value, $expiry_date);

    if ($stmt->execute()) {
        $message = "Voucher created successfully!";
    } else {
        $message = "Error creating voucher: " . $connection->error;
    }

    $stmt->close();
}

$result = $connection->query("SELECT * FROM vouchers");
$vouchers = $result->fetch_all(MYSQLI_ASSOC);
?>
