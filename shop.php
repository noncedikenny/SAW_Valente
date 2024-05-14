<!DOCTYPE html>
<html lang="it">

<?php include('utilities/cookie_check.php'); ?>

<head>
    <?php include('head_items.html'); ?>

    <!-- Title -->
    <title>Catalogo - SAW | Cabinets</title>
</head>

<body>
    <?php include('header.php'); ?>
    <?php include('utilities/buy_popup_layout.html'); ?>

<main>

    <div class="w3-container w3-center w3-margin-top">
        <h1>Acquista i nostri cabinati</h1>
        <h2>Sono belli, giuro</h2>
    </div>

    <div style="margin-bottom: 50px">
        <div class="w3-row-padding" style="margin: 0 auto; width: 75%">
            <div class="w3-card w3-third w3-center w3-padding-32 product">
                <img src="photos/shop_photos/bartop.png" alt="Bartop" style="width: 250px;"> <br>
                <h3>Bartop</h3>
                <h5>A partire da 400€</h5>
                <button class="w3-btn w3-green" onclick="addedToCart(event)">Aggiungi al carrello</button>
            </div>
            <div class="w3-card w3-third w3-center w3-padding-32 product">
                <img src="photos/shop_photos/fourplayer_cabinet.png" alt="Quattro Giocatori" style="width: 250px; height: 250px;"> <br>
                <h3>Quattro Giocatori</h3>
                <h5>A partire da 700€</h5>
                <button class="w3-btn w3-green" onclick="addedToCart(event)">Aggiungi al carrello</button>
            </div>
            <div class="w3-card w3-third w3-center w3-padding-32 product">
                <img src="photos/shop_photos/classic_cabinet.png" alt="Classico" style="width: 250px; height: 250px;"> <br>
                <h3>Classico</h3>
                <h5>A partire da 600€</h5>
                <button class="w3-btn w3-green" onclick="addedToCart(event)">Aggiungi al carrello</button>
            </div>
        </div>

        <div class="w3-row-padding" style="margin: 20px auto; width: 75%">
            <div class="w3-card w3-third w3-center w3-padding-32 product">
                <img src="photos/shop_photos/wallmounted_cabinet.png" alt="A Muro" style="width: 250px; height: 250px;"> <br>
                <h3>A muro</h3>
                <h5>A partire da 500€</h5>
                <button class="w3-btn w3-green" onclick="addedToCart(event)">Aggiungi al carrello</button>
            </div>
            <div class="w3-card w3-third w3-center w3-padding-32 product">
                <img src="photos/shop_photos/racing_cabinet.png" alt="Racing" style="width: 250px; height: 250px;"> <br>
                <h3>Racing</h3>
                <h5>A partire da 1000€</h5>
                <button class="w3-btn w3-green" onclick="addedToCart(event)">Aggiungi al carrello</button>
            </div>
            <div class="w3-card w3-third w3-center w3-padding-32 product">
                <img src="photos/shop_photos/custom_cabinet.png" alt="Personalizzato" style="width: 250px; height: 250px;"> <br>
                <h3>Personalizzato</h3>
                <h5>A partire da 0 a 2000€</h5>
                <button class="w3-btn w3-green" onclick="addedToCart(event)">Aggiungi al carrello</button>
            </div>
        </div>
    </div>

    <script>
    function addedToCart(event) {
        // Controllo se l'utente sta utilizzando un dispositivo mobile
        if(window.innerWidth <= 768) {
            // Se sì, reindirizza all'altra pagina
            window.location.href = "buy.php";
        } else {
            // Se no, esegui il codice già presente
            const popup = document.getElementById("buyPopup");
            const overlay = document.getElementById("overlay");
            popup.style.display = "block";
            overlay.style.display = "block";

            document.documentElement.style.overflow = 'hidden';
            document.body.style.overflow = 'hidden';
            document.documentElement.style.height = '100%';
            document.body.style.height = '100%';
            document.documentElement.style.margin = '0';
            document.body.style.margin = '0';
        }
    }
</script>

</main>
</body>

<?php include('footer.html'); ?>

</html>