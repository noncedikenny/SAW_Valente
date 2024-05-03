<!DOCTYPE html>
<html lang="it">

<?php session_start(); ?>

<head>
    <?php include('head_items.html'); ?>

    <!-- Title -->
    <title>Homepage - SAW | Cabinets</title>

    <style>
        .mySlides {display:none;}
    </style>
</head>

<body>

<?php include("header.php"); ?>

<main>
    <!-- Sezione Foto -->
    <div>
        <img class="mySlides" src="index_photos/ph1.jpg" alt="SliderPhoto1" style="width: 100%;">
        <img class="mySlides" src="index_photos/ph2.jpg" alt="SliderPhoto2" style="width: 100%;">
        <img class="mySlides" src="index_photos/ph3.jpg" alt="SliderPhoto3" style="width: 100%;">
        <img class="mySlides" src="index_photos/ph4.jpg" alt="SliderPhoto4" style="width: 100%;">
    </div>

    <script>
        let slideIndex = 0;
        showDivs();

        function plusDivs(n) {
            slideIndex += n;
            showDivs();
        }

        function showDivs() {
            let i;
            let x = document.getElementsByClassName("mySlides");
            if (slideIndex >= x.length) {slideIndex = 0}
            if (slideIndex < 0) {slideIndex = x.length - 1}
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            x[slideIndex].style.display = "block";
        }

        // Aggiungi un timer per passare automaticamente alla foto successiva ogni 3 secondi
        setInterval(function() {
            plusDivs(1);
        }, 3000);
    </script>

    <!-- Sezione Intro -->
    <div class="w3-center" style="margin: 50px 50px">
        <h2>Scopri i nostri cabinati di alta qualità</h2>
        <p>La nostra startup offre una vasta gamma di cabinati progettati per soddisfare le esigenze di ogni cliente. Dai un'occhiata ai nostri prodotti e scopri il cabinato perfetto per te!</p>
    </div>

    <!-- Sezione Pro -->
    <div class="w3-row-padding w3-card" style="padding: 30px; margin: 0 auto 100px;width: 75%;">
        <div class="w3-col m3 w3-center">
            <i class="fa fa-gamepad" style="font-size:48px;"></i>
            <h3>Esperienza Arcade</h3>
            <p>Vivi l'esperienza arcade che si viveva col gettone in mano nel bar della piscina!</p>
        </div>
        <div class="w3-col m3 w3-center">
            <i class="fa fa-microchip" style="font-size:48px;"></i>
            <h3>Hardware Ottimale</h3>
            <p>Un buon compromesso tra l'emulazione perfetta e lo spazio!</p>
        </div>
        <div class="w3-col m3 w3-center">
            <i class="fa fa-phone" style="font-size:48px;"></i>
            <h3>Supporto Clienti</h3>
            <p>Il reparto assistenza è aperto 24/7 per te!</p>
        </div>
        <div class="w3-col m3 w3-center">
            <i class="fa fa-question" style="font-size:48px;"></i>
            <h3>Reso Gratuito</h3>
            <p>In caso di disguidi, ci preoccuperemo noi di sistemare l'ordine!</p>
        </div>
    </div>

</main>

<?php include('footer.html') ?>

</body>

</html>