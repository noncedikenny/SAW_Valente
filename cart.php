<!DOCTYPE html>
<html lang="it">

<?php require_once('utilities/cookie_check.php'); ?>

<head>
    <?php include('head_items.html'); ?>
    <!-- Title -->
    <title>Carrello - SAW | Cabinets</title>

    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="css/cart_styles.css">
</head>

<body>
    <?php include('header.php'); ?>

<main>
    <?php
        if(isset($_SESSION['islogged']) && $_SESSION['islogged'] == true) { ?>
            <div id="logged_container" class="w3-container" style="margin: 30px;">
                <h2>Il tuo carrello</h2>
                <div id="cart-items" class="w3-margin w3-padding"></div>
                <h4 id="showTotalPrice"></h4>

                <div class="buttons-container">
                    <button class='w3-button w3-green' onclick='completeOrder("<?php echo $_SESSION["email"]; ?>")'>Completa l'ordine</button>
                    <button class='w3-button w3-red w3-right' onclick='clearCart("<?php echo $_SESSION["email"]; ?>")'>Svuota carrello</button>
                    <a href="shop.php" class="w3-button w3-blue">Continua lo shopping</a>
                </div>
            </div>
        <?php }
        else { ?>
            <div class="w3-container w3-center" style="margin: 30px;">
                <img src="photos/not_logged.png" alt="Not Logged Error" style="width:25%;">
                <h3>Guarda che non puoi usare il carrello se non sei loggato, testina.</h3>
            </div>
        <?php }
    ?>
</main>

<script>
    $(document).ready(function() {
        displayCart("<?php echo $_SESSION['email'] ?>");
    });
</script>

<script src="scripts/cart_logic.js"></script>

</body>

<?php include('footer.html'); ?>

</html>