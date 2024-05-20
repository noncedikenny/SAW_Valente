<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$field_to_update = $query = '';

include("../utilities/dbconfig.php");

$original_email = $_SESSION['email'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['firstname'] != null) {
        $field_to_update = mysqli_real_escape_string($conn, $_POST['firstname']);
        $_SESSION['firstname'] = $field_to_update;
        $sql = "UPDATE users SET FirstName = '$field_to_update' WHERE Email = '$original_email';";
        $conn->query($sql);
    }
    else if ($_POST['lastname'] != null) {
        $field_to_update = mysqli_real_escape_string($conn, $_POST['lastname']);
        $_SESSION['lastname'] = $field_to_update;
        $sql = "UPDATE users SET LastName = '$field_to_update' WHERE Email = '$original_email';";
        $conn->query($sql);
    }
    else if ($_POST['email'] != null) {
        $field_to_update = mysqli_real_escape_string($conn, $_POST['email']);
        $_SESSION['email'] = $field_to_update;
        $sql = "UPDATE users SET Email = '$field_to_update' WHERE Email = '$original_email';";
        $conn->query($sql);
    }

    header('location: ../private_area.php');
}

?>