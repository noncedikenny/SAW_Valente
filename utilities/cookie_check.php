<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Quando un utente visita il sito, verifica se ha un token di accesso memorizzato nel browser
if (isset($_COOKIE['remember_token'])) {
    // Parametri di connessione al database
    $servername_db = "localhost"; // Indirizzo del server MySQL
    $username_db = "root"; // Nome utente del database
    $password_db = ""; // Password del database
    $dbname = "saw_cabinets"; // Nome del database

    // Connessione al database
    $conn = new mysqli($servername_db, $username_db, $password_db, $dbname);

    $cookie = $_COOKIE['remember_token'];

    $sql = "SELECT Email FROM users WHERE Cookie = '$cookie'";

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