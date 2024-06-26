<!DOCTYPE html>
<html lang="it">

<?php require_once('utilities/cookie_check.php'); ?>

<head>
    <?php include('head_items.html'); ?>

    <!-- Title -->
    <title>Catalogo - SAW | Cabinets</title>

    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="css/shop_styles.css">
</head>

<body>
    <?php 
    include('header.php'); 
    include('buy_popup_layout.php'); 
    ?>
<main class="w3-container w3-center w3-padding-64">

    <div class="w3-container w3-center w3-margin-top">
        <h1>Acquista i nostri cabinati</h1>
        <h2>Sono belli, giuro</h2>
    </div>

    <div>
        <!-- Row 1 -->
        <div class="w3-row-padding w3-padding-32 product-container" style="margin: 0 auto;">
            <!-- Bartop -->
            <div class="w3-card w3-third w3-center w3-padding-32 product">
                <img src="photos/shop_photos/Bartop.png" alt="Bartop"> <br>
                <h3>Bartop</h3>
                <h5>A partire da 400€</h5>
                <?php 
                    $productName = "Bartop";
                    include("utilities/star_rating.php"); 
                ?>
                <button class="w3-btn w3-green" data-product="Bartop" data-price="400">Ordina</button>
            </div>

            <!-- 4 Players -->
            <div class="w3-card w3-third w3-center w3-padding-32 product">
                <img src="photos/shop_photos/Quattro Giocatori.png" alt="Quattro Giocatori"> <br>
                <h3>Quattro Giocatori</h3>
                <h5>A partire da 700€</h5>
                <?php 
                    $productName = "Quattro Giocatori";
                    include("utilities/star_rating.php"); 
                ?>
                <button class="w3-btn w3-green" data-product="Quattro Giocatori" data-price="700">Ordina</button>
            </div>

            <!-- Classic -->
            <div class="w3-card w3-third w3-center w3-padding-32 product">
                <img src="photos/shop_photos/Classico.png" alt="Classico"> <br>
                <h3>Classico</h3>
                <h5>A partire da 600€</h5>
                <?php 
                    $productName = "Classico";
                    include("utilities/star_rating.php"); 
                ?>
                <button class="w3-btn w3-green" data-product="Classico" data-price="600">Ordina</button>
            </div>
        </div>

        <!-- Row 2 -->
        <div class="w3-row-padding product-container" style="margin: 20px auto;">
            
            <!-- Mounted on Wall -->
            <div class="w3-card w3-third w3-center w3-padding-32 product">
                <img src="photos/shop_photos/A Muro.png" alt="A Muro"> <br>
                <h3>A muro</h3>
                <h5>A partire da 500€</h5>
                <?php 
                    $productName = "A Muro";
                    include("utilities/star_rating.php"); 
                ?>
                <button class="w3-btn w3-green" data-product="A muro" data-price="500">Ordina</button>
            </div>

            <!-- Racing -->
            <div class="w3-card w3-third w3-center w3-padding-32 product">
                <img src="photos/shop_photos/Racing.png" alt="Racing"> <br>
                <h3>Racing</h3>
                <h5>A partire da 1000€</h5>
                <?php 
                    $productName = "Racing";
                    include("utilities/star_rating.php"); 
                ?>
                <button class="w3-btn w3-green" data-product="Racing" data-price="1000">Ordina</button>
            </div>

            <!-- Custom -->
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

            <!-- Buttons -->
            <div class="w3-card w3-third w3-center w3-padding-32 product">
                <img src="photos/shop_photos/Kit di Pulsanti.png" alt="Pulsanti"> <br>
                <h3>Kit di Pulsanti</h3>
                <h5>20€</h5>
                <?php 
                    $productName = "Pulsanti";
                    include("utilities/star_rating.php"); 
                ?>
                <button class='w3-btn w3-green' onclick="<?php echo isset($_SESSION['email']) ? "addToCart('{$_SESSION['email']}', 'Pulsanti', 20)" : "window.location.replace('login_page.php')"; ?>">
                    <?php
                        echo isset($_SESSION['email']) 
                            ? "Aggiungi al carrello" 
                            : "Loggati per acquistare";
                    ?>
                </button>
            </div>

            <!-- Steering Wheel -->
            <div class="w3-card w3-third w3-center w3-padding-32 product">
                <img src="photos/shop_photos/Volante.png" alt="Volante"> <br>
                <h3>Volante</h3>
                <h5>50€</h5>
                <?php 
                    $productName = "Volante";
                    include("utilities/star_rating.php"); 
                ?>
                <button class='w3-btn w3-green' onclick="<?php echo isset($_SESSION['email']) ? "addToCart('{$_SESSION['email']}', 'Volante', 50)" : "window.location.replace('login_page.php')"; ?>">
                    <?php
                        echo isset($_SESSION['email']) 
                            ? "Aggiungi al carrello" 
                            : "Loggati per acquistare";
                    ?>
                </button>
            </div>

            <!-- Stickers -->
            <div class="w3-card w3-third w3-center w3-padding-32 product">
                <img src="photos/shop_photos/custom_cabinet.png" alt="Stickers"> <br>
                <h3>Stickers</h3>
                <h5>A partire da 10€ a 30€</h5>
                <button class="w3-btn w3-green" onclick="window.location.replace('aboutus.php');">Contatti</button>
            </div>
        </div>
    </div>

    <?php
        if(isset($_SESSION['email'])) {
            echo "<a href='cart.php'><img id='cart-img' src='photos/shop_photos/cart_photo.png' alt='Shopping Cart'></a>";
        }
    ?>
    <script src="scripts/show_hide_popup.js"></script>
    <script src="scripts/cart_logic.js"></script>
</main>
</body>

<?php include('footer.html'); ?>

</html>