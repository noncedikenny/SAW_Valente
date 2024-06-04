<?php
require_once("../utilities/dbconfig.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$email = $password = "";
$error = "";
$hash = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Something's empty
    if(empty($_POST["email"]) || empty($_POST["pass"])) {
        $error = "*Compila tutti i campi.";
        $_SESSION['error'] = $error;
        header("Location: ../login_page.php");
    }


    else {
        // Sanitize inputs
        $email = htmlspecialchars(stripslashes(trim($_POST["email"])));
        $password = htmlspecialchars(stripslashes(trim($_POST["pass"])));

        $email = mysqli_real_escape_string($conn, $email);
        $sql = "SELECT * FROM users WHERE email = ?";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $result = $stmt->get_result();

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

                    $sql = "UPDATE users SET Cookie = ?, CookieExpiration = ? WHERE Email = ?;";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("sss", $crypted_token, $expiration, $email);
                    $stmt->execute();
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