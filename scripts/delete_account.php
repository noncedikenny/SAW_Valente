<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include("../utilities/dbconfig.php");

// Delete user from database
$email = mysqli_real_escape_string($conn, $_SESSION['email']);
$sql = "DELETE FROM users WHERE email = '$email'";

$stmt = $conn->prepare($sql);

$conn->query($sql);

$conn->close();

// Delete user's cart
echo '<script src="cart_logic.js">';
    echo "clearCart(\"{$_SESSION['email']}\");";
echo '</script>';

// Reuse the same script used for logout to delete cookies etc...
include('logout.php');