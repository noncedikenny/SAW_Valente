<!DOCTYPE html>
<html lang="it">

<?php include('utilities/cookie_check.php'); ?>

<head>
    <?php include('head_items.html'); ?>
    <!-- Title -->
    <title>Carrello - SAW | Cabinets</title>
</head>

<body>
    <?php include('header.php'); ?>

<main>
    <?php
        if(isset($_SESSION['email'])) {
            echo '<div class="w3-container" style="margin: 30px;">';
            echo '<h2>Il tuo carrello</h2>';
            echo '<div id="cart-items" class="w3-margin w3-padding w3-card-4"></div>';
            echo '<h4 id="showTotalPrice"></h4>';
            echo "<button class='w3-button w3-green' onclick='clearCart(\"{$_SESSION['email']}\")'>Completa l'ordine</button>";
            echo "<button class='w3-button w3-red w3-right' onclick='clearCart(\"{$_SESSION['email']}\")'>Svuota carrello</button>";
            echo '<a href="shop.php" class="w3-button w3-blue">Continua lo shopping</a>';
            echo '</div>';
        }
        else {
            echo '<div class="w3-container w3-center" style="margin: 30px;">';
            echo '<img src="photos/not_logged.png" alt="Not Logged Error" style="width:25%;">';
            echo '<h3>Guarda che non puoi usare il carrello se non sei loggato, testina.</h3>';
            echo '</div>';
        }
    ?>
</main>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        displayCart("<?php echo $_SESSION['email'] ?>");
    });
</script>

<script src="scripts/cart_logic.js"></script>

</body>

<?php include('footer.html'); ?>

</html>