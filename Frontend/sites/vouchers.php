<?php
include "../../Backend/logic/voucher_logic.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="../../Frontend/Bilder/123.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Vouchers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/vouchers.css"> 
    <link rel="stylesheet" type="text/css" href="../CSS/vouchers.css">
</head>
<body>
    <?php include "../../Backend/logic/header.php"; ?>

    <div class="container mt-5">
        <h2>Manage Vouchers</h2>

        <?php if (isset($message)): ?>
            <div class="alert alert-info"><?= $message ?></div>
        <?php endif; ?>

        <form action="vouchers.php" method="POST">
            <div class="mb-3">
                <label for="value" class="form-label">Value</label>
                <input type="number" class="form-control" id="value" name="value" required>
            </div>
            <div class="mb-3">
                <label for="expiry_date" class="form-label">Expiry Date</label>
                <input type="date" class="form-control" id="expiry_date" name="expiry_date" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Voucher</button>
        </form>

        <h3 class="mt-5">Voucher List</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Value</th>
                    <th>Expiry Date</th>
                    <th>Status</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
    <?php foreach ($vouchers as $voucher): 
        // Determine the status class based on voucher status
        $statusClass = ($voucher['status'] === 'used' || $voucher['status'] === 'expired') ? 'highlight' : '';
        ?>
        <tr class="voucher <?= $statusClass ?>" data-status="<?= htmlspecialchars($voucher['status']) ?>">
            <td><?= htmlspecialchars($voucher['code']) ?></td>
            <td><?= htmlspecialchars($voucher['value']) ?></td>
            <td><?= htmlspecialchars($voucher['expiry_date']) ?></td>
            <td><?= htmlspecialchars($voucher['status']) ?></td>
            <td><?= htmlspecialchars($voucher['created_at']) ?></td>
        </tr>
    <?php endforeach; ?>
</tbody>
        </table>
    </div>
    <script src="../js/vouchers.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
