<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Quando un utente visita il sito, verifica se ha un token di accesso memorizzato nel browser
if (isset($_COOKIE['remember_token'])) {
    include("dbconfig.php");

    $cookie = $_COOKIE['remember_token'];

    $sql = "SELECT * FROM users WHERE Cookie = '$cookie'";

    // Esecuzione della query
    $result = $conn->query($sql);

    if($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['firstname'] = $row['FirstName'];
        $_SESSION['lastname'] = $row['LastName'];
        $_SESSION['email'] = $row['Email'];
    }

    // Chiusura della connessione
    $conn->close();
}