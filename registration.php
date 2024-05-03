<!DOCTYPE html>
<html lang="it">

<?php
session_start();

$username = $email = $password = $conf_password = "";
$empty_err = $username_err = $email_err = $password_err1 = $password_err2 = $conf_password_err = "";
$hash = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["username"] || $_POST["email"] || $_POST["password"] || $_POST["conf_password"])) {
        $empty_err = "*Compila tutti i campi.";
    }

    if (!empty($_POST["username"])) {
        $username = htmlspecialchars(stripslashes(trim($_POST["username"])));
        if (!preg_match("/^[a-z0-9]+$/",$username)) {
            $username_err = "*Sono ammesse solo le lettere ed i numeri.";
        }
    }
    if (!empty($_POST["email"])) {
        $email = htmlspecialchars(stripslashes(trim($_POST["email"])));
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "*Formato di email non valido.";
        }
    }
    if (!empty($_POST["password"])) {
        $password = htmlspecialchars(stripslashes(trim($_POST["password"])));
        $hash = password_hash($password, PASSWORD_DEFAULT);
        if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $password)) {
            $password_err1 = "*La password deve contenere: una lettera maiuscola, una lettera minuscola, un numero ed un carattere speciale.";
        }
        if (strlen($password) < 8) {
            $password_err2 = "*La password deve contenere almeno 8 caratteri.";
        }
    }
    if (!empty($_POST["conf_password"])) {
        $conf_password = htmlspecialchars(stripslashes(trim($_POST["conf_password"])));
        if($password != $conf_password) {
            $conf_password_err = "*Le password non corrispondono.";
        }
    }

    if(empty($username_err) && empty($email_err) && empty($password_err) && empty($conf_password_err) && empty($empty_err)) {
        $_SESSION["username"] = $username;
        header("location: index.php");
    }
}

?>

<head>
    <?php include('head_items.html'); ?>

    <!-- Title -->
    <title>Registrati - SAW | Cabinets</title>

    <style>
        .error {color: #FF0000; font-size: 10px;}
    </style>
</head>

<body>

<?php include('header.php'); ?>

<main>
    <div class="w3-container w3-card form-container">
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

<?php include('footer.html'); ?>

</body>
</html>
