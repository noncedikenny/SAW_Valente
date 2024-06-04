<?php
require_once("../utilities/dbconfig.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Delete user from database
$email = mysqli_real_escape_string($conn, $_SESSION['email']);
$sql = "DELETE FROM users WHERE email = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();

// Delete user's cart
echo '<script src="cart_logic.js">';
    echo "clearCart(\"{$_SESSION['email']}\");";
echo '</script>';

// Reuse the same script used for logout to delete cookies etc...
include('logout.php');