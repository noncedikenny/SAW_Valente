<?php
require_once("../utilities/dbconfig.php");

header('Content-Type: application/json');

// Avvia la sessione
session_start();

// Verifica se l'utente è loggato
if (!isset($_SESSION['islogged'])) {
    echo json_encode(['success' => false, 'message' => 'Devi effettuare il login per votare.']);
    exit;
}

// Ricevi i dati JSON inviati
$input = json_decode(file_get_contents('php://input'), true);

if (is_null($input) || !isset($input['product']) || !isset($input['email']) || !isset($input['rating'])) {
    echo json_encode(['success' => false, 'message' => 'Dati non validi.']);
    exit;
}

$product = $input['product'];
$email = $input['email'];
$rating = $input['rating'];

// Verifica se esiste già una valutazione per questo prodotto da parte di questo utente
$sql = "SELECT 1 FROM product_ratings WHERE ProductName = ? AND UserEmail = ?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    echo json_encode(['success' => false, 'message' => 'Errore nella preparazione della query di verifica.']);
    exit();
}

$stmt->bind_param('ss', $product, $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    // Aggiorna la valutazione esistente
    $sql = "UPDATE product_ratings SET Rating = ? WHERE ProductName = ? AND UserEmail = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        echo json_encode(['success' => false, 'message' => 'Errore nella preparazione della query di aggiornamento.']);
        exit();
    }

    $stmt->bind_param('iss', $rating, $product, $email);
} else {
    // Inserisci una nuova valutazione
    $sql = "INSERT INTO product_ratings (ProductName, UserEmail, Rating) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        echo json_encode(['success' => false, 'message' => 'Errore nella preparazione della query di inserimento.']);
        exit();
    }

    $stmt->bind_param('ssi', $product, $email, $rating);
}

// Esegui la query
if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Valutazione inviata con successo.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Errore nell\'invio della valutazione.']);
}

// Chiudi la statement e la connessione
$stmt->close();
$conn->close();
?>
