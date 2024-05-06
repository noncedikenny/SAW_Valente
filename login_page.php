<!DOCTYPE html>
<html lang="it">

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

        <form action="scripts/login.php" method="post">
            <!-- Username -->
            <label for="username">Username</label> <br>
            <input class="w3-input w3-round-large" type="text" placeholder="Username" id="username" name="username" required="required">

            <!-- Password -->
            <label for="password">Password <i class="fa fa-eye" onclick="myFunction()"></i></label> <br>
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

    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password" || x.type === "conf_password") {
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
