<?php

$username = $email = $password = $conf_password = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = sanitizeInput($_POST["username"]);
    $email = sanitizeInput($_POST["email"]);
    $password = sanitizeInput($_POST["password"]);
    $conf_password = sanitizeInput($_POST["conf_password"]);
}

function sanitizeInput($variable) {
    $variable = htmlspecialchars($variable);
    $variable = trim($variable);
    $variable = stripslashes($variable);
    return $variable;
}