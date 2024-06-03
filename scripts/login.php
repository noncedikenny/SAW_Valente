<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$email = $password = "";
$error = "";
$hash = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Something's empty
    if(empty($_POST["email"] || $_POST["pass"])) {
        $error = "*Compila tutti i campi.";
        $_SESSION['error'] = $error;
    }


    else {
        // Sanitize inputs
        $email = htmlspecialchars(stripslashes(trim($_POST["email"])));
        $password = htmlspecialchars(stripslashes(trim($_POST["pass"])));

        include("../utilities/dbconfig.php");

        $email = mysqli_real_escape_string($conn, $email);
        $sql = "SELECT * FROM users WHERE email = '$email'";
        
        // Query execution
        $result = $conn->query($sql);

        if($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $stored_password = $row["Password"];

            if (password_verify($password, $stored_password)) {
                if (isset($_POST['remember_me'])) {
                    // Generate a unique access token
                    $token = bin2hex(random_bytes(16));
                    $expiration = date('Y-m-d H:i:s', time() + (86400 * 30));
                    
                    // Saves the token as a cookie in the user's browser
                    setcookie('remember_token', $token, time() + (86400 * 30), "/");

                    // Encrypt the cookie and save it crypted on the database
                    $crypted_token = password_hash($token, PASSWORD_DEFAULT);
                    $sql = "UPDATE users SET Cookie = '$crypted_token' WHERE Email = '$email';";
                    $conn->query($sql);
                    $sql = "UPDATE users SET CookieExpiration = '$expiration' WHERE Email = '$email';";
                    $conn->query($sql);
                }

                // Set session's variables
                $_SESSION['firstname'] = $row["FirstName"];
                $_SESSION['lastname'] = $row["LastName"];
                $_SESSION['email'] = $row["Email"];
                $_SESSION['islogged'] = true;
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

        // Closing the connection
        $conn->close();
    }
}
?>