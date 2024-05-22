<?php

session_start();

include("../utilities/dbconfig.php");

$email = mysqli_real_escape_string($conn, $_SESSION['email']);
$sql = "DELETE FROM users WHERE email = '$email'";

// Preparazione dello statement
$stmt = $conn->prepare($sql);

// Esecuzione della query
$conn->query($sql);

// Chiusura dello statement e della connessione
$conn->close();

echo '<script src="cart_logic.js">';
    echo "document.addEventListener('DOMContentLoaded', (event) => {";
        echo "clearCart(\"{$_SESSION['email']}\");";
    echo '});';
echo '</script>';

include('logout.php');