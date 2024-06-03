<?php

// Start the session if it is not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Include the database configuration file
include("../utilities/dbconfig.php");

// Check if the user is logged in
if (isset($_SESSION['islogged']) && $_SESSION['islogged'] == true) {
    $email = $_SESSION['email'];
    $sql = "UPDATE users SET Cookie = NULL, CookieExpiration = NULL WHERE Email = '$email';";
    $conn->query($sql);

    // If a remember_token cookie exists, remove it
    if (isset($_COOKIE['remember_token'])) {
        // Removes the cookie from the client
        setcookie('remember_token', '', time() - 3600, "/");
    }

    // Destroy the session
    $_SESSION = array();
    session_destroy();

    // Close the database connection
    $conn->close();
}

// Redirect the user to the main page
header('Location: ../index.php');
exit();
?>