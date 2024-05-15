<!DOCTYPE html>
<html lang="it">

<?php include('utilities/cookie_check.php'); 

    if (!isset($_SESSION['firstname'])) {
        header("Location: login_page.php");
    }

?>

<head>
    <?php include('head_items.html'); ?>

    <!-- Title -->
    <?php echo "<title>{$_SESSION['firstname']} {$_SESSION['lastname']} - SAW | Cabinets</title>"; ?>
</head>

<body>
<?php include('header.php'); ?>

<main>
    <div class="w3-card w3-padding-32 options-container">
        <?php
            echo "<h1 class='w3-center' style='padding: 10px;'>Benvenuto {$_SESSION['firstname']} {$_SESSION['lastname']}</h1>"; ?>

        <div class="w3-bar w3-center">
            <nav>
                <a href="#" style="text-decoration: none">Notifiche</a> |
                <a href="#" style="text-decoration: none">Lingua</a> |
                <a href="scripts/logout.php" style="text-decoration: none">Logout</a> |
                <a href="scripts/delete_account.php" style="color: red; text-decoration: none">Elimina account</a>
            </nav>
        </div>

        <div class="w3-container w3-padding">

            <h3>Cambio dati personali</h3>
            <form class="w3-container" action="" method="post">
                <label for="firstname">Nuovo Nome:</label><br>
                <input class="w3-input w3-border w3-light-grey" type="text" id="firstname" name="firstname">
                <label for="lastname">Nuovo Cognome:</label><br>
                <input class="w3-input w3-border w3-light-grey" type="text" id="lastname" name="lastname">
                <input class="w3-btn w3-blue" type="submit" value="Modifica Dati">
            </form>

            <h3>Cambio email</h3>
            <form class="w3-container" action="" method="post">
                <label for="email">Nuova Email:</label><br>
                <input class="w3-input w3-border w3-light-grey" type="email" id="email" name="email">
                <input class="w3-btn w3-blue" type="submit" value="Modifica Dati">
            </form>

            <h3>Cambio password</h3>
            <form class="w3-container" action="" method="post">
                <label for="pass">Nuova Password:</label><br>
                <input class="w3-input w3-border w3-light-grey" type="password" id="pass" name="pass">
                <input class="w3-btn w3-blue" type="submit" value="Modifica Dati">
            </form>

        </div>
    </div>

</main>

<?php include('footer.html'); ?>

</body>
</html>
