<!DOCTYPE html>
<html lang="it">

<?php include('utilities/cookie_check.php'); ?>

<head>
    <?php include('head_items.html'); ?>

    <style>
        /* Definizione dello stile per l'immagine del carrello */
        #cart-img {
            position: fixed;   /* Posizione fissa */
            bottom: 50px;      /* Distanza dal fondo dello schermo */
            right: 50px;       /* Distanza dal lato destro dello schermo */
            width: 70px;       /* Larghezza dell'immagine */
            height: 70px;      /* Altezza dell'immagine */
            border-radius: 50%; /* Per rendere l'immagine circolare */
            border: 5px solid lightgrey; /* Per aggiungere un bordo rosso */
        }

        #cart-img:hover {
            filter: brightness(50%);  /* Imposta la luminosità dell'immagine al 50% del normale */
        }
    </style>

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

    <div>
        <!-- Row 1 -->
        <div class="w3-row-padding product-container" style="margin: 0 auto;">
            <div class="w3-card w3-third w3-center w3-padding-32 product">
                <img src="photos/shop_photos/bartop.png" alt="Bartop"> <br>
                <h3>Bartop</h3>
                <h5>A partire da 400€</h5>
                <button class="w3-btn w3-green" onclick="showPopup(event)">Ordina</button>
            </div>
            <div class="w3-card w3-third w3-center w3-padding-32 product">
                <img src="photos/shop_photos/quattro giocatori.png" alt="Quattro Giocatori"> <br>
                <h3>Quattro Giocatori</h3>
                <h5>A partire da 700€</h5>
                <button class="w3-btn w3-green" onclick="showPopup(event)">Ordina</button>
            </div>
            <div class="w3-card w3-third w3-center w3-padding-32 product">
                <img src="photos/shop_photos/classico.png" alt="Classico"> <br>
                <h3>Classico</h3>
                <h5>A partire da 600€</h5>
                <button class="w3-btn w3-green" onclick="showPopup(event)">Ordina</button>
            </div>
        </div>

        <!-- Row 2 -->
        <div class="w3-row-padding product-container" style="margin: 20px auto;">
            <div class="w3-card w3-third w3-center w3-padding-32 product">
                <img src="photos/shop_photos/a muro.png" alt="A Muro"> <br>
                <h3>A muro</h3>
                <h5>A partire da 500€</h5>
                <button class="w3-btn w3-green" onclick="showPopup(event)">Ordina</button>
            </div>
            <div class="w3-card w3-third w3-center w3-padding-32 product">
                <img src="photos/shop_photos/racing.png" alt="Racing"> <br>
                <h3>Racing</h3>
                <h5>A partire da 1000€</h5>
                <button class="w3-btn w3-green" onclick="showPopup(event)">Ordina</button>
            </div>
            <div class="w3-card w3-third w3-center w3-padding-32 product">
                <img src="photos/shop_photos/custom_cabinet.png" alt="Personalizzato"> <br>
                <h3>Personalizzato</h3>
                <h5>A partire da 0 a 2000€</h5>
                <button class="w3-btn w3-green" onclick="window.location.replace('aboutus.php');">Contatti</button>
            </div>
        </div>
    </div>

    <div class="w3-container w3-center w3-margin-top">
            <h1>In caso servisse...</h1>
            <h2>... prendi anche qualche pezzo di ricambio!</h2>
    </div>

    <div style="margin-bottom: 50px">
        <!-- Row 3 -->
        <div class="w3-row-padding product-container" style="margin: 20px auto;">
            <div class="w3-card w3-third w3-center w3-padding-32 product">
                <img src="photos/shop_photos/kit di pulsanti.png" alt="Pulsanti"> <br>
                <h3>Kit di Pulsanti</h3>
                <h5>20€</h5>
                <button class="w3-btn w3-green" onclick="addToCart(event)">Ordina</button>
            </div>
            <div class="w3-card w3-third w3-center w3-padding-32 product">
                <img src="photos/shop_photos/volante.png" alt="Volante"> <br>
                <h3>Volante</h3>
                <h5>50€</h5>
                <button class="w3-btn w3-green" onclick="addToCart(event)">Ordina</button>
            </div>
            <div class="w3-card w3-third w3-center w3-padding-32 product">
                <img src="photos/shop_photos/custom_cabinet.png" alt="Stickers"> <br>
                <h3>Stickers</h3>
                <h5>A partire da 10€ a 30€</h5>
                <button class="w3-btn w3-green" onclick="showPopup(event)">Ordina</button>
            </div>
        </div>
    </div>

    <a href="#"><img id="cart-img" src="photos/shop_photos/cart_photo.png" alt="Shopping Cart"></a>

    <script>
        $(document).ready(function() {
            $("button").filter(function() {
                return $(this).text() === "Ordina";
            }).click(function() {
                var $popup = $("#buyPopup");
                var $overlay = $("#overlay");
                $popup.show();
                $overlay.show();

                $('html, body').css({
                    'overflow': 'hidden',
                    'height': '100%',
                    'margin': '0'
                });
            });
        });
    </script>

</main>
</body>

<?php include('footer.html'); ?>

</html>