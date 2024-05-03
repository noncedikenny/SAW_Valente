<!DOCTYPE html>
<html lang="it">

<?php

$username = $email = $password = $conf_password = "";
$username_err = $email_err = $password_err1 = $password_err2 = $conf_password_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["username"])) {
        $username = htmlspecialchars(stripslashes(trim($_POST["username"])));
        if (!preg_match("/^[a-zA-Z-' ]*$/",$username)) {
            $username_err = "*Only letters and white space allowed";
        }
    }
    if (!empty($_POST["email"])) {
        $email = htmlspecialchars(stripslashes(trim($_POST["email"])));
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "*Invalid email format";
        }
    }
    if (!empty($_POST["password"])) {
        $password = htmlspecialchars(stripslashes(trim($_POST["password"])));
        if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $password)) {
            $password_err1 = "*Password must contain: an uppercase letter, a lowercase letter, a number and a special character.";
        }
        if (strlen($password) < 8) {
            $password_err2 = "*Password must have a minimum of 8 characters.";
        }
    }
    if (!empty($_POST["conf_password"])) {
        $conf_password = htmlspecialchars(stripslashes(trim($_POST["conf_password"])));
        if($password != $conf_password) {
            $conf_password_err = "*Password did not match";
        }
    }
}

?>

<head>
    <!-- Metas -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title -->
    <title>Registrati - SAW | Cabinets</title>

    <!-- W3.CSS -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <style>
        .error {color: #FF0000; font-size: 10px;}
    </style>
</head>

<body>

<header class="w3-grey" style="padding: 1px;">
    <div class="w3-image w3-center" style="margin: 0 auto; padding: 25px;">
        <a href="index.html">
            <img src="SAWCabinet_Logo.png" alt="Logo" style="width:25%;">
        </a>
    </div>

    <div class="w3-bar w3-black">
        <a href="aboutus.html" class="w3-bar-item w3-button w3-mobile" style="width:25%">Chi Siamo?</a>
        <a href="#" class="w3-bar-item w3-button w3-mobile" style="width:25%">Catalogo</a>
        <a href="#" class="w3-bar-item w3-button w3-mobile" style="width:25%">FAQ</a>
        <a href="registration.php" class="w3-bar-item w3-button w3-mobile" style="width:25%">Registrati</a>
    </div>
</header>

<main>
    <div class="w3-container w3-card" style="margin: 50px auto; width:40%; padding: 20px;">
        <h2 style="text-align:center;">Registrati, è gratis.</h2>
        <p style="text-align:center;">Il resto no...</p>

        <form method="post">
            <!-- Username -->
            <label for="username">Username</label> <br>
            <input class="w3-input w3-round-large" type="text" placeholder="Username" id="username" name="username" required="required">
            <span class="error"><?php
                echo "$username_err";
                echo "<br>";
                ?></span>

            <!-- Email -->
            <label for="email">Email</label> <br>
            <input class="w3-input w3-round-large" style="text-align: left" type="email" placeholder="Email" id="email" name="email" required="required">
            <span class="error"><?php
                echo "$email_err";
                echo "<br>";
                ?></span>

            <!-- Password -->
            <label for="password">Password</label> <br>
            <input class="w3-input w3-round-large" type="password" placeholder="Password" id="password" name="password" required="required">
            <span class="error"><?php
                echo "$password_err1";
                echo "$password_err2";
                echo "<br>";
                ?></span>

            <!-- Confirm Password -->
            <label for="conf_password">Confirm Password</label>
            <input class="w3-input w3-round-large" type="password" placeholder="Confirm Password" id="conf_password" name="conf_password" required="required">
            <span class="error"><?php
                echo "$conf_password_err";
                echo "<br>";
                ?></span>

            <input class="w3-button w3-black w3-round" style="margin: 20px 0 0 0;" type="submit" value="Registrati">
        </form>
    </div>
</main>

<footer class="w3-container w3-black" style="padding-top: 20px;">
    <div class="w3-row-padding" style="margin: 0 auto; width:80%;">
        <div class="w3-col m4">
            <h3>Contatti</h3>
            <p>Indirizzo: Via dei Fiori, 123 - Città</p>
            <p>Email: info@example.com</p>
            <p>Telefono: 0123456789</p>
        </div>
        <div class="w3-col m4">
            <h3>Link Utili</h3>
            <ul>
                <li><a href="#">Termini e Condizioni</a></li>
                <li><a href="#">Politica sulla Privacy</a></li>
                <li><a href="#">Mappa del Sito</a></li>
            </ul>
        </div>
        <div class="w3-col m4">
            <h3>Social Media</h3>
            <a href="#"><i class="fa fa-facebook-f" style="padding-right:32px; font-size:32px;"></i></a>
            <a href="#"><i class="fa fa-twitter" style="padding-right:32px; font-size:32px;"></i></a>
            <a href="#"><i class="fa fa-instagram" style="padding-right:32px; font-size:32px;"></i></a>
        </div>
    </div>
    <div class="w3-center w3-padding-16 w3-black">
        <p>&copy; 2024 SAW | Cabinets. Tutti i diritti riservati.</p>
    </div>
</footer>

</body>
</html>
