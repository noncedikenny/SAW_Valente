<?php
header('Content-Type: application/json');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$input = json_decode(file_get_contents('php://input'), true);

if (is_null($input) || !isset($input['cart'])) {
    echo json_encode(['success' => false, 'message' => 'Dati del carrello non validi.']);
    exit;
}

if (!is_array($cart)) {
    echo json_encode(['success' => false, 'message' => 'Formato del carrello non valido.']);
    exit;
}

$email = $_SESSION["email"];
$productName = $item["productName"];

foreach ($cart as $item) {
    $sql = "SELECT * FROM user_purchases WHERE UserEmail = '$email' AND ProductName = '$productName'";
    $result = $conn->query($sql);
    
    if($result->num_rows > 0) {
        continue;
    }
    else {
        $sql = "INSERT INTO user_purchases (ProductName, UserEmail) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $productName, $email);
        $stmt->execute();
    }
}

if(isset($stmt) && isset($conn)) {
    $stmt->close();
    $conn->close();
}

echo json_encode(['success' => true, 'message' => 'Carrello ricevuto con successo.']);