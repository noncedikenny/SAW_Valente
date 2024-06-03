<?php
header('Content-Type: application/json');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$input = json_decode(file_get_contents('php://input'), true);

if (is_null($input) || !isset($input['cart'])) {
    echo json_encode(['success' => false, 'message' => 'Dati del carrello non validi.']);
    exit();
}

if (!is_array($cart)) {
    echo json_encode(['success' => false, 'message' => 'Formato del carrello non valido.']);
    exit();
}

$email = $_SESSION["email"];

foreach ($cart as $item) {
    $productName = $item["productName"];

    $sql = "INSERT INTO user_purchases (ProductName, UserEmail) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $productName, $email);
    $stmt->execute();
}

if(isset($stmt) && isset($conn)) {
    $stmt->close();
    $conn->close();
    exit();
}

echo json_encode(['success' => true, 'message' => 'Carrello ricevuto con successo.']);