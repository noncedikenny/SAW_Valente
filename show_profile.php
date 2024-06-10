<!DOCTYPE html>
<html lang="it">

<?php 
    session_start();
    // Redirect to login page if user is not logged in
    if (!isset($_SESSION['email'])) {
        header("Location: login_page.php");
        exit();
    }

    require_once('utilities/cookie_check.php');
?>

<head>
    <?php include('head_items.html'); ?>

    <!-- Dynamic title based on user's name -->
    <?php echo "<title>{$_SESSION['firstname']} {$_SESSION['lastname']} - SAW | Cabinets</title>"; ?>

    <style>
        .error {color: #FF0000; font-size: 10px;}
    </style>
</head>
<body>
<?php include('header.php'); ?>

<main>
    <div id="main-div" class="w3-card w3-padding-32 options-container">
        <h1 class='w3-center' style='padding: 10px;'>Benvenuto <?php echo "{$_SESSION['firstname']} {$_SESSION['lastname']}"; ?></h1>

        <!-- User settings navigation -->
        <div class="w3-bar w3-center">
            <nav>
                <a href="#" style="text-decoration: none">Newsletter</a> |
                <a href="#" style="text-decoration: none">Lingua</a> |
                <a href="scripts/logout.php" style="text-decoration: none">Logout</a> |
                <?php echo "<a href='scripts/delete_account.php' style='color: red; text-decoration: none' onclick='clearCart(\"{$_SESSION['email']}\")'>Elimina l'Account</a>"; ?>
            </nav>
        </div>

        <!-- Change user data form -->
        <div class="w3-container w3-padding">
            <?php
            // Retrieve user data from session
            $name = $_SESSION['firstname'];
            $surname = $_SESSION['lastname'];
            $email = $_SESSION['email'];
            ?>

            <form action="scripts/update_profile.php" method="post" id="registrationForm">
                <!-- First name input -->
                <label for="firstname">Nome</label> <br>
                <input class="w3-input w3-round-large" type="text" placeholder="Nome" id="firstname" name="firstname" required="required" value="<?php echo htmlspecialchars($name); ?>">
                <span class="error">
                    <?php
                    if(isset($_SESSION['firstname_error'])) {
                        echo htmlspecialchars($_SESSION['firstname_error']);
                        echo "<br>";
                        unset($_SESSION['firstname_error']);
                    }
                    ?>
                </span>
                <p class="error" id="firstname_error"></p>

                <!-- Last name input -->
                <label for="lastname">Cognome</label> <br>
                <input class="w3-input w3-round-large" type="text" placeholder="Cognome" id="lastname" name="lastname" required="required" value="<?php echo htmlspecialchars($surname); ?>">
                <span class="error">
                    <?php
                    if(isset($_SESSION['lastname_error'])) {
                        echo htmlspecialchars($_SESSION['lastname_error']);
                        echo "<br>";
                        unset($_SESSION['lastname_error']);
                    }
                    ?>
                </span>
                <p class="error" id="lastname_error"></p>

                <!-- Email input -->
                <label for="email">Email</label> <br>
                <input class="w3-input w3-round-large" type="email" placeholder="Email" id="email" name="email" required="required" value="<?php echo htmlspecialchars($email); ?>">
                <span class="error">
                    <?php
                    if(isset($_SESSION['email_error'])) {
                        echo htmlspecialchars($_SESSION['email_error']);
                        echo "<br>";
                        unset($_SESSION['email_error']);
                    }
                    ?>
                </span>
                <p class="error" id="email_error"></p>

                <!-- Password input -->
                <label for="pass">Password</label> <br>
                <input class="w3-input w3-round-large" type="password" placeholder="Password" id="pass" name="pass" required="required" value="************">
                <span class="error">
                    <?php
                    if(isset($_SESSION['password_error1'])) {
                        echo htmlspecialchars($_SESSION['password_error1']);
                        echo "<br>";
                        unset($_SESSION['password_error1']);
                    }
                    if(isset($_SESSION['password_error2'])) {
                        echo htmlspecialchars($_SESSION['password_error2']);
                        echo "<br>";
                        unset($_SESSION['password_error2']);
                    }
                    ?>
                </span>
                <p class="error" id="password_error"></p>

                <!-- Confirm Password input -->
                <label for="confirm">Conferma Password</label> <br>
                <input class="w3-input w3-round-large" type="password" placeholder="Confirm Password" id="confirm" name="confirm" required="required" value="************">
                <span class="error">
                    <?php
                    if(isset($_SESSION['conf_password_error'])) {
                        echo htmlspecialchars($_SESSION['conf_password_error']);
                        echo "<br>";
                        unset($_SESSION['conf_password_error']);
                    }
                    ?>
                </span>
                <p class="error" id="confirm_error"></p>

                <label for="number_creditcard">Numero della Carta</label>
                <input class="w3-input w3-round-large" type="text" id="number_cc" maxlength="19" value="**** **** **** ****">

                <label for="exp_creditcard">Scadenza della Carta</label>
                <input class="w3-input w3-round-large" type="text" id="exp_cc" maxlength="5" value="**/**">

                <label for="securitycode_creditcard">Codice di Sicurezza della Carta</label>
                <input class="w3-input w3-round-large" type="text" id="sc_cc" maxlength="3" id="sc_cc" value="***">

                <!-- Submit button -->
                <input class="w3-button w3-black w3-round" style="margin: 20px 0 0 0;" type="submit" name="submit" value="Cambia I Tuoi Dati">
            </form>
        </div>
    </div>
</main>

<!-- Include script to clear user's cart -->
<script src="scripts/cart_logic.js"></script>

<script>
    function checkWindowSize() {
        if (window.innerWidth <= 768) {
            $("#main-div").removeClass('w3-card');
        } else {
            $("#main-div").addClass('w3-card');
        }
    }

    $(document).ready(function(){
        $('#number_cc').on('input', function() {
            var val = $(this).val().replace(/\D/g, '');
            var newVal = '';

            for (var i = 0; i < val.length; i++) {
                if (i > 0 && i % 4 === 0) {
                    newVal += ' ';
                }
                newVal += val[i];
            }

            $(this).val(newVal);
        });

        $('#exp_cc').on('input', function() {
            var val = $(this).val().replace(/\D/g, '');
            if (val.length > 2) {
                val = val.substring(0, 2) + '/' + val.substring(2, 4);
            }
            $(this).val(val);
        });

        $('#sc_cc').on('input', function() {
            var val = $(this).val().replace(/\D/g, '');
            $(this).val(val);
        });

        // Check on document ready
        checkWindowSize();
    });

    // Check on window resize
    $(window).resize(checkWindowSize);
</script>

<?php include('footer.html'); ?>
</body>
</html>
