<!DOCTYPE html>
<html lang="it">

<?php
$username = $password = "";
$error = "";
$hash = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["username"]) || empty($_POST["password"])) {
        $error = "*Compila tutti i campi.";
    }
    else {
        $password = htmlspecialchars(stripslashes(trim($_POST["password"])));
        $hash = password_hash($password, PASSWORD_DEFAULT);
    }

    if (empty($error)) {
        $_SESSION["username"] = $username;
        header('Location: index.php');
    }
}

?>

<head>
    <?php include('head_items.html'); ?>

    <!-- Title -->
    <title>Login - SAW | Cabinets</title>

    <style>
        .error {color: #FF0000; font-size: 10px;}
    </style>
</head>

<body>

<?php include('header.php'); ?>

<main>
    <div class="w3-container w3-card form-container">
        <h2 style="text-align:center;">Loggati, è gratis.</h2>
        <p style="text-align:center;">Come registrarsi, il resto non lo è...</p>

        <form method="post">
            <!-- Username -->
            <label for="username">Username</label> <br>
            <input class="w3-input w3-round-large" type="text" placeholder="Username" id="username" name="username" required="required">
            <span class="error"><?php
                echo "$error";
                echo "<br>";
                ?></span>

            <!-- Password -->
            <label for="password">Password</label> <br>
            <input class="w3-input w3-round-large" type="password" placeholder="Password" id="password" name="password" required="required">
            <span class="error"><?php
                echo "$error";
                echo "<br>";
                ?></span>

            <input class="w3-button w3-black w3-round" style="margin: 20px 0 0 0;" type="submit" value="Login">
        </form>
    </div>
</main>

<?php include('footer.html'); ?>

</body>
</html>
