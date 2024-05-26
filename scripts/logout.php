<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_COOKIE['remember_token'])) {
    unset($_COOKIE['remember_token']); 
    setcookie('remember_token', '', time() - 3600, "/");
}

$_SESSION = array();
session_destroy();
header('Location: ../index.php');