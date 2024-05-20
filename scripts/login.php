<?php
session_start();

$email = $password = "";
$error = "";
$hash = "";
$thereIsAnError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["email"] || $_POST["pass"])) {
        $error = "*Compila tutti i campi.";
        $_SESSION['error'] = $error;
        $thereIsAnError = true;
    }
    else {
        $email = htmlspecialchars(stripslashes(trim($_POST["email"])));
        $password = htmlspecialchars(stripslashes(trim($_POST["pass"])));

        include("../utilities/dbconfig.php");

        $email = mysqli_real_escape_string($conn, $email);
        $sql = "SELECT * FROM users WHERE email = '$email'";
        
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
                    
                    // Salva il token come cookie nel browser dell'utente
                    setcookie('remember_token', $token, time() + (86400 * 30), "/");

                    $sql = "UPDATE users SET Cookie = '$token' WHERE Email = '$email';";
                    $result = $conn->query($sql);
                }

                $_SESSION['firstname'] = $row["FirstName"];
                $_SESSION['lastname'] = $row["LastName"];
                $_SESSION['email'] = $row["Email"];
                header("Location: ../index.php");
            } else {
                $error = "*Email o password errati.";
                $_SESSION['error'] = $error;
                header("Location: ../login_page.php");
            }
        }
        else {
            $error = "*Email o password errati.";
            $_SESSION['error'] = $error;
            header("Location: ../login_page.php");
        }

        // Chiusura della connessione
        $conn->close();
    }
}
?>