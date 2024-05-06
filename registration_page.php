<!DOCTYPE html>
<html lang="it">

<head>
    <?php include('head_items.html'); ?>

    <!-- Title -->
    <title>Registrati - SAW | Cabinets</title>

    <style>
        .error {color: #FF0000; font-size: 10px;}
    </style>
</head>

<body>

<?php include('header.php'); session_start(); ?>

<main>
    <div class="w3-container w3-card form-container">
        <h2 style="text-align:center;">Registrati, è gratis.</h2>
        <p style="text-align:center;">Il resto no...</p>

        <form action="scripts/registration.php" method="post">
            <!-- Nome -->
            <label for="firstname">Nome</label> <br>
            <input class="w3-input w3-round-large" type="text" placeholder="Nome" id="firstname" name="firstname" required="required">
            <span class="error"><?php
                if(isset($_SESSION['firstname_error'])) {
                    echo "{$_SESSION['firstname_error']}";
                    echo "<br>";
                    unset($_SESSION['firstname_error']);
                }
                ?></span>

            <!-- Cognome -->
            <label for="lastname">Cognome</label> <br>
            <input class="w3-input w3-round-large" type="text" placeholder="Cognome" id="lastname" name="lastname" required="required">
            <span class="error"><?php
                if(isset($_SESSION['lastname_error'])) {
                    echo "{$_SESSION['lastname_error']}";
                    echo "<br>";
                    unset($_SESSION['lastname_error']);
                }
                ?></span>

            <!-- Email -->
            <label for="email">Email</label> <br>
            <input class="w3-input w3-round-large" type="email" placeholder="Email" id="email" name="email" required="required">
            <span class="error"><?php
                if(isset($_SESSION['email_error'])) {
                    echo "{$_SESSION['email_error']}";
                    echo "<br>";
                    unset($_SESSION['email_error']);
                }
                ?></span>

            <!-- Password -->
            <label for="pass">Password <i class="fa fa-eye" onclick="myFunction('pass')"></i></label> <br>
            <input class="w3-input w3-round-large" type="password" placeholder="Password" id="pass" name="pass" required="required">
            <span class="error"><?php
                if(isset($_SESSION['password_error1'])) {
                    echo "{$_SESSION['password_error1']}";
                    echo "<br>";
                    unset($_SESSION['password_error1']);
                }
                if(isset($_SESSION['password_error2'])) {
                    echo "{$_SESSION['password_error2']}";
                    echo "<br>";
                    unset($_SESSION['password_error2']);
                }
                ?></span>

            <!-- Confirm Password -->
            <label for="confirm">Confirm Password <i class="fa fa-eye" onclick="myFunction('confirm')"></i></label> <br>
            <input class="w3-input w3-round-large" type="password" placeholder="Confirm Password" id="confirm" name="confirm" required="required">
            <span class="error"><?php
                if(isset($_SESSION['conf_password_error'])) {
                    echo "{$_SESSION['conf_password_error']}";
                    echo "<br>";
                    unset($_SESSION['conf_password_error']);
                }
                ?></span>

            <input class="w3-button w3-black w3-round" style="margin: 20px 0 0 0;" type="submit" value="Registrati">
        </form>
    </div>
    
    <script>
        function myFunction(elementToChange) {
            var x = document.getElementById(elementToChange);
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

</main>

<?php include('footer.html'); ?>

</body>
</html>
