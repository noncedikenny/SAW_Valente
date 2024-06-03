<?php
header('Content-Type: application/json');

require_once("../utilities/dbconfig.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$input = json_decode(file_get_contents('php://input'), true);

if (is_null($input) || !isset($input['cart'])) {
    echo json_encode(['success' => false, 'message' => 'Dati del carrello non validi.']);
    exit();
}

$cart = $input['cart'];
$purchaseDate = $input['purchaseDate'] ?? date('Y-m-d');  // Usa la data di oggi se non è fornita

if (!is_array($cart)) {
    echo json_encode(['success' => false, 'message' => 'Formato del carrello non valido.']);
    exit();
}

$email = $_SESSION["email"] ?? '';

if (empty($email)) {
    echo json_encode(['success' => false, 'message' => 'Utente non autenticato.']);
    exit();
}

if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Connessione al database fallita.']);
    exit();
}

foreach ($cart as $item) {
    $productName = $conn->real_escape_string($item["name"]);

    $sql = "INSERT INTO user_purchases (ProductName, UserEmail, PurchaseDate) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $productName, $email, $purchaseDate);
    if (!$stmt->execute()) {
        echo json_encode(['success' => false, 'message' => 'Errore nell\'inserimento dei dati nel database.']);
        $stmt->close();
        $conn->close();
        exit();
    }
    $stmt->close();
}

$conn->close();
echo json_encode(['success' => true, 'message' => 'Carrello ricevuto con successo.']);
?>
