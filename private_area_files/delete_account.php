<?php

session_start();

// Connessione al database
$servername_db = "localhost"; // Indirizzo del server MySQL
$username_db = "root"; // Nome utente del database
$password_db = ""; // Password del database
$dbname = "saw_cabinets"; // Nome del database

$conn = new mysqli($servername_db, $username_db, $password_db, $dbname);

// Verifica della connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Query per eliminare un elemento
$sql = "DELETE FROM users WHERE username = ?";

// Preparazione dello statement
$stmt = $conn->prepare($sql);

// Associazione dei parametri
$id = 1; // ID dell'elemento da eliminare
$stmt->bind_param("i", $_SESSION["username"]);

$stmt->execute();

// Chiusura dello statement e della connessione
$stmt->close();
$conn->close();

include('logout.php');