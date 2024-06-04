<?php
require_once("../utilities/dbconfig.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["islogged"])) {
    die("Errore: riprovare più tardi.");
}

// Initialize variables
$firstname = $lastname = $email = $password = $conf_password = "";
$empty_err = $firstname_err = $lastname_err = $email_err = $password_err1 = $password_err2 = $conf_password_err = "";
$hash = "";

$original_email = $_SESSION['email'];

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Assign POST values to variables
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    if(isset($_POST["pass"]) && isset($_POST["confirm"])) {
        $password = $_POST["pass"];
        $conf_password = $_POST["confirm"];
    }
    else {
        $password = $conf_password = "************";
    }
    $thereIsAnError = false;

    // Check for empty fields
    if (empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($conf_password)) {
        $empty_err = "*Compila tutti i campi.";
        $_SESSION['empty_error'] = $empty_err;
        $thereIsAnError = true;
    } else {
        // Sanitize input values
        $firstname = htmlspecialchars(stripslashes(trim($firstname)));
        $lastname = htmlspecialchars(stripslashes(trim($lastname)));
        $email = htmlspecialchars(stripslashes(trim($email)));
        $password = htmlspecialchars(stripslashes(trim($password)));
        $conf_password = htmlspecialchars(stripslashes(trim($conf_password)));

        // Validate input values
        if (!preg_match("/^[a-zA-Z ]+$/", $firstname)) {
            $firstname_err = "*Sono ammesse solo le lettere maiuscole e minuscole.";
            $_SESSION["firstname_error"] = $firstname_err;
            $thereIsAnError = true;
        }
        if (!preg_match("/^[a-zA-Z ]+$/", $lastname)) {
            $lastname_err = "*Sono ammesse solo le lettere maiuscole e minuscole.";
            $_SESSION["lastname_error"] = $lastname_err;
            $thereIsAnError = true;
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_err = "*Formato di email non valido.";
            $_SESSION["email_error"] = $email_err;
            $thereIsAnError = true;
        }
        if (strlen($password) < 8 && $password != "************") {
            $password_err1 = "*La password deve contenere almeno 8 caratteri.";
            $_SESSION["password_error1"] = $password_err1;
            $thereIsAnError = true;
        }
        if ($password !== $conf_password) {
            $conf_password_err = "*Le password non corrispondono.";
            $_SESSION["conf_password_error"] = $conf_password_err;
            $thereIsAnError = true;
        }
    }

    // If no errors, proceed with database insertion
    if (!$thereIsAnError) {
        // Hash the password
        $hash = password_hash($password, PASSWORD_DEFAULT);

        // Store user details in session
        $_SESSION["firstname"] = $firstname;
        $_SESSION["lastname"] = $lastname;
        $_SESSION["email"] = $email;

        // Escape user inputs for security
        $firstname = mysqli_real_escape_string($conn, $firstname);
        $lastname = mysqli_real_escape_string($conn, $lastname);
        $email = mysqli_real_escape_string($conn, $email);

        // Prepare the SQL statement
        if ($password != "************") {
            // Hash the new password
            $hash = password_hash($password, PASSWORD_DEFAULT);
        
            $sql = "UPDATE users SET FirstName = ?, LastName = ?, Email = ?, Password = ? WHERE Email = ?";
            $stmt = $conn->prepare($sql);
        
            if ($stmt === false) {
                die("Error preparing statement: " . $conn->error);
            }
        
            $stmt->bind_param("sssss", $firstname, $lastname, $email, $hash, $original_email);
        } else {
            $sql = "UPDATE users SET FirstName = ?, LastName = ?, Email = ? WHERE Email = ?";
            $stmt = $conn->prepare($sql);
        
            if ($stmt === false) {
                die("Error preparing statement: " . $conn->error);
            }
        
            $stmt->bind_param("ssss", $firstname, $lastname, $email, $original_email);
        }

        // Execute the statement
        $stmt->execute();

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    } 
    header('location: ../show_profile.php');
}
?>
