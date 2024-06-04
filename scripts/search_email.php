<?php
require_once("../utilities/dbconfig.php");

if (isset($_GET['email'])) { 
    // Sanitize email to avoid injection attacks
    $email = mysqli_real_escape_string($conn, $_GET['email']); 

    // Prepare a statement to avoid SQL injection
    $stmt = $conn->prepare("SELECT COUNT(*) AS count FROM users WHERE email = ?"); 
    $stmt->bind_param("s", $email);

    if ($stmt->execute()) { 
        $result = $stmt->get_result(); 
        $row = $result->fetch_assoc(); 
        $count = $row['count']; 

        // JSON response
        echo json_encode(['exists' => $count > 0]); 
    } else { 
        // Error in query
        echo json_encode(['error' => 'Errore nell\'esecuzione della query']); 
    } 
} else { 
    // Email not provided
    echo json_encode(['error' => 'Email non fornita']); 
} 
?>