<?php

if (isset($_GET['email'])) { 

    include("../utilities/dbconfig.php");

    // Sanitizza l'email per evitare injection attacks
    $email = mysqli_real_escape_string($conn, $_GET['email']); 

    // Prepara una statement per evitare SQL injection
    $stmt = $conn->prepare("SELECT COUNT(*) AS count FROM users WHERE email = ?"); 
    $stmt->bind_param("s", $email);

    if ($stmt->execute()) { 
        $result = $stmt->get_result(); 
        $row = $result->fetch_assoc(); 
        $count = $row['count']; 

        // Risposta JSON 
        echo json_encode(['exists' => $count > 0]); 
    } else { 
        // Errore nella query
        echo json_encode(['error' => 'Errore nell\'esecuzione della query']); 
    } 
} else { 
    // Email non fornita 
    echo json_encode(['error' => 'Email non fornita']); 
} 
?>