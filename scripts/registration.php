<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$firstname = $lastname = $email = $password = $conf_password = "";
$empty_err = $firstname_err = $lastname_err = $email_err = $password_err1 = $password_err2 = $conf_password_err = "";
$hash = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Dichiarazioni
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["pass"];
    $conf_password = $_POST["confirm"];
    $thereIsAnError = false;

    // Ritorna errore se qualche campo è vuoto
    if (empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($conf_password)) {
        $empty_err = "*Compila tutti i campi.";
        $thereIsAnError = true;
    }

    else {
        // Sanificazione
        $firstname = htmlspecialchars(stripslashes(trim($_POST["firstname"])));
        $lastname = htmlspecialchars(stripslashes(trim($_POST["lastname"])));
        $email = htmlspecialchars(stripslashes(trim($_POST["email"])));
        $password = htmlspecialchars(stripslashes(trim($_POST["pass"])));
        $conf_password = htmlspecialchars(stripslashes(trim($_POST["confirm"])));

        // Errori vari
        if (!preg_match("/^[a-zA-Z]+$/", $firstname)) {
            $firstname_err = "*Sono ammesse solo le lettere maiuscole e minuscole.";
            $_SESSION["firstname_error"] = $firstname_err;
            $thereIsAnError = true;
        }
        if (!preg_match("/^[a-zA-Z]+$/", $lastname)) {
            $lastname_err = "*Sono ammesse solo le lettere maiuscole e minuscole.";
            $_SESSION["lastname_error"] = $lastname_err;
            $thereIsAnError = true;
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_err = "*Formato di email non valido.";
            $_SESSION["email_error"] = $email_err;
            $thereIsAnError = true;
        }
        if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $password)) {
            $password_err1 = "*La password deve contenere: una lettera maiuscola, una lettera minuscola, un numero ed un carattere speciale.";
            $_SESSION["password_error1"] = $password_err1;
            $thereIsAnError = true;
        }
        if (strlen($password) < 8) {
            $password_err2 = "*La password deve contenere almeno 8 caratteri.";
            $_SESSION["password_error2"] = $password_err2;
            $thereIsAnError = true;
        }
        if ($password != $conf_password) {
            $conf_password_err = "*Le password non corrispondono.";
            $_SESSION["conf_password_error"] = $conf_password_err;
            $thereIsAnError = true;
        }
    }

    if (!$thereIsAnError) {
        // Cripta la password
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $_SESSION["firstname"] = $firstname;
        $_SESSION["lastname"] = $lastname;
        $_SESSION["email"] = $email;

        include("../utilities/dbconfig.php");

        $firstname = mysqli_real_escape_string($conn, $firstname);
        $lastname = mysqli_real_escape_string($conn, $lastname);
        $email = mysqli_real_escape_string($conn, $email);

        $sql = "INSERT INTO users (FirstName, LastName, Email, Password) VALUES (?, ?, ?, ?)";

        // Creazione del prepared statement
        $stmt = $conn->prepare($sql);

        // Bind dei parametri
        $stmt->bind_param("ssss", $firstname, $lastname, $email, $hash);

        $stmt->execute();

        // Chiusura del prepared statement e della connessione
        $stmt->close();
        $conn->close();

        header("location: ../index.php");
    }
    else {
        header("Location: ../registration_page.php");
    }
}

?>