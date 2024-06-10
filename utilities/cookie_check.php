<?php
require_once("dbconfig.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Quando un utente visita il sito, verifica se ha un token di accesso memorizzato nel browser
if (isset($_COOKIE['remember_token'])) {
    $cookie = $_COOKIE['remember_token'];

    $sql = "SELECT * FROM users WHERE Cookie IS NOT NULL";

    // Esecuzione della query
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        if (password_verify($cookie, $row['Cookie']) && strtotime($row['CookieExpiration']) > time()) {
            $_SESSION['firstname'] = $row['FirstName'];
            $_SESSION['lastname'] = $row['LastName'];
            $_SESSION['email'] = $row['Email'];
            $_SESSION['islogged'] = true;
        }
    }

    // Chiusura della connessione
    $conn->close();
}