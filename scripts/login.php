<?php
$email = $password = "";
$error = "";
$hash = "";
$thereIsAnError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["email"] || $_POST["pass"])) {
        $error = "*Compila tutti i campi.";
        $thereIsAnError = true;
    }
    else {
        $email = htmlspecialchars(stripslashes(trim($_POST["email"])));
        $password = htmlspecialchars(stripslashes(trim($_POST["pass"])));

        // Parametri di connessione al database
        $servername_db = "localhost";                       // Indirizzo del server MySQL
        $username_db = "root";                              // Nome utente del database
        $password_db = "";                                  // Password del database
        $dbname = "saw_cabinets";                           // Nome del database

        // Connessione al database
        $conn = new mysqli($servername_db, $username_db, $password_db, $dbname);

        if($conn->connect_error) {
            die("Connessione fallita: " . mysqli_connect_error());
        }

        $email = $mysqli_real_escape_string($conn, $email);
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