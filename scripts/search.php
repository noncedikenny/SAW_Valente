<?php

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_GET['query'])) {
        $query = $_GET['query'];
        searchDatabase($query);
    }

    function searchDatabase($query) {
        include('../utilities/dbconfig.php');

        // Prepara la query
        $sql = "SELECT * FROM products WHERE name LIKE ?";
        $stmt = $conn->prepare($sql);
        $searchTerm = "%".$query."%";
        $stmt->bind_param("s", $searchTerm);

        // Esegui la query
        $stmt->execute();
        $result = $stmt->get_result();

        $resultsArray = [];
        while($row = $result->fetch_assoc()) {
            $resultsArray[] = $row;
        }

        // Salva i risultati nella variabile di sessione
        $_SESSION['result'] = $resultsArray;

        // Chiudi la connessione
        $stmt->close();
        $conn->close();
    }

    header('location: ../result_page.php');
?>