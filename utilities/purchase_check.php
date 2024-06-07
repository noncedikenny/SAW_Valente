<?php
$hasPurchased = false;
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $purchaseCheckSql = "SELECT * FROM user_purchases WHERE ProductName = ? AND UserEmail = ?";
    $purchaseCheckStmt = $conn->prepare($purchaseCheckSql);
    $purchaseCheckStmt->bind_param('ss', $productName, $email);
    $purchaseCheckStmt->execute();
    $purchaseCheckResult = $purchaseCheckStmt->get_result();

    if ($purchaseCheckResult->num_rows > 0) {
        $hasPurchased = true;
    }

    $purchaseCheckStmt->close();
    $conn->close();
}