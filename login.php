<!DOCTYPE html>
<html lang="it">

<?php
$username = $password = "";
$error = "";
$hash = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["username"] || $_POST["password"])) {
        $error = "*Compila tutti i campi.";
    }

    if(empty($error)) {
        $username = htmlspecialchars(stripslashes(trim($_POST["username"])));
        $password = htmlspecialchars(stripslashes(trim($_POST["password"])));

        // Parametri di connessione al database
        $servername_db = "localhost"; // Indirizzo del server MySQL
        $username_db = "root"; // Nome utente del database
        $password_db = ""; // Password del database
        $dbname = "saw_cabinets"; // Nome del database

        // Connessione al database
        $conn = new mysqli($servername_db, $username_db, $password_db, $dbname);

        if($conn->connect_error) {
            die("Connessione fallita: " . mysqli_connect_error());
        }

        $username = $mysqli_real_escape_string($conn, $username);
        $sql = "SELECT * FROM users WHERE username = '$username'";

        // Esecuzione della query
        $result = $conn->query($sql);

        if($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $stored_password = $row["Password"];

            if (password_verify($password, $stored_password)) {
                session_start();

                if (isset($_POST['remember_me'])) {
                    // Genera un token di accesso univoco
                    $token = bin2hex(random_bytes(16));
                    
                    // Salva il token nel database associato all'utente
                    // Ad esempio, puoi aggiornare il campo 'remember_token' nella tabella degli utenti
                    
                    // Salva il token come cookie nel browser dell'utente
                    setcookie('remember_token', $token, time() + (86400 * 30), "/");

                    $sql = "UPDATE users SET Cookie = '$token' WHERE Username = '$username';";
                    $result = $conn->query($sql);
                }

                $_SESSION['username'] = $username;
                header("Location: index.php");
            } else {
                $error = "*Nome utente o password errati.";
            }
        }
        else {
            $error = "*Nome utente o password errati.";
        }

        // Chiusura della connessione
        $conn->close();
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

            <!-- Password -->
            <label for="password">Password</label> <br>
            <input class="w3-input w3-round-large" type="password" placeholder="Password" id="password" name="password" required="required"> <br>
            <span class="error"><?php
                if(!empty($error)) {
                    echo "$error";
                    echo "<br>";
                }
                ?></span>

                
            <label for="remember_me">Remember Me</label>
            <input type="checkbox" id="remember_me" name="remember_me"> <br>

            <input class="w3-button w3-black w3-round" style="margin: 20px 0 0 0;" type="submit" value="Login">
        </form>
    </div>
</main>

<?php include('footer.html'); ?>

</body>
</html>
