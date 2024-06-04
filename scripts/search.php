<?php
require_once("../utilities/dbconfig.php");

// Start the session if it hasn't been started already
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if the 'query' parameter is set in the GET request
if (isset($_GET['query'])) {
    $query = htmlspecialchars(stripslashes(trim($_GET['query'])));
    $query = mysqli_real_escape_string($conn, $query);

    // Prepare the SQL statement with a placeholder for the search term
    $sql = "SELECT * FROM products WHERE name LIKE ?";
    $stmt = $conn->prepare($sql);
    
    // Add wildcards to the search term for the LIKE operator
    $searchTerm = "%" . $query . "%";
    
    // Bind the search term to the SQL statement
    $stmt->bind_param("s", $searchTerm);

    $stmt->execute();
    $result = $stmt->get_result();

    $resultsArray = [];
    
    // Fetch each row from the result set and add it to the results array
    while($row = $result->fetch_assoc()) {
        $resultsArray[] = $row;
    }

    $_SESSION['result'] = $resultsArray;

    $stmt->close();
    $conn->close();
}

// Redirect to the results page
header('Location: ../result_page.php');

?>
