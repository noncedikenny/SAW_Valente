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

include('logout.php');