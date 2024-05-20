<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'saw_cabinets');

/* Tenta di connettersi al database MySQL */
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Verifica la connessione
if($conn->connect_error){
    die("Connessione fallita: " . mysqli_connect_error());
}
?>