<!DOCTYPE html>
<html lang="it">

<head>
    <?php include('head_items.html'); ?>

    <!-- Title -->
    <title>Login - SAW | Cabinets</title>

    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="css/forms_styles.css">

</head>

<body>

<?php 
    include('header.php'); 
    if(isset($_SESSION['islogged']) && $_SESSION['islogged'] == true) {
        header('location: index.php');
    }
?>

<main>
    <div class="w3-container w3-card form-container">
        <h2 style="text-align:center;">Loggati, è gratis.</h2>
        <p style="text-align:center;">Come registrarsi, il resto non lo è...</p>

        <form action="scripts/login.php" method="post" id="loginForm">
            <!-- Email -->
            <label for="email">Email</label> <br>
            <input class="w3-input w3-round-large" type="text" placeholder="Email" id="email" name="email" required="required">

            <!-- Password -->
            <label for="pass">Password <i class="fa fa-eye" id="togglePasswordVisibility"></i></label> <br>
            <input class="w3-input w3-round-large" type="password" placeholder="Password" id="pass" name="pass" required="required">
            <span class="error"><?php
                if(isset($_SESSION['error'])) {
                    echo "{$_SESSION['error']}";
                    echo "<br>";
                    unset($_SESSION['error']);
                }
                ?></span>

            <!-- Remember me -->                
            <label for="remember_me">Remember Me</label>
            <input type="checkbox" id="remember_me" name="remember_me"> <br>

            <input class="w3-button w3-black w3-round" style="margin: 20px 0 0 0;" type="submit" value="Login">
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('#togglePasswordVisibility').on('click', function() {
                var $pass = $('#pass');
                $pass.attr('type', $pass.attr('type') === 'password' ? 'text' : 'password');
            });
        });
    </script>
</main>

<?php include('footer.html'); ?>

</body>
</html>
