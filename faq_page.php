<!DOCTYPE html>
<html lang="it">

<?php require_once('utilities/cookie_check.php'); ?>

<head>
    <?php include('head_items.html'); ?>

    <!-- Title -->
    <title>FAQ - SAW | Cabinets</title>

    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="css/faq_styles.css">
    
</head>

<body>

<?php include("header.php"); ?>

<main class="w3-container w3-center w3-padding-64">

<div class="w3-container faq-section">
    <h2 class="w3-center">Domande Frequenti (FAQ)</h2>

    <div class="w3-card-4 w3-margin">
        <header class="w3-container w3-light-grey faq-question">
            <h3>Quali tipi di cabinati arcade vendete?</h3>
        </header>
        <div class="w3-container faq-answer">
            <p>Vendiamo una vasta gamma di cabinati arcade, dai classici cabinati retrò ai modelli più moderni con schermi ad alta definizione e connessione internet per il multiplayer online.</p>
        </div>
    </div>

    <div class="w3-card-4 w3-margin">
        <header class="w3-container w3-light-grey faq-question">
            <h3>Posso personalizzare il mio cabinato?</h3>
        </header>
        <div class="w3-container faq-answer">
            <p>Sì, offriamo diverse opzioni di personalizzazione per i nostri cabinati arcade, inclusi temi grafici personalizzati, configurazioni dei controlli e scelte di hardware.</p>
        </div>
    </div>

    <div class="w3-card-4 w3-margin">
        <header class="w3-container w3-light-grey faq-question">
            <h3>Come viene gestita la spedizione dei cabinati?</h3>
        </header>
        <div class="w3-container faq-answer">
            <p>Utilizziamo servizi di spedizione specializzati per garantire che i cabinati arrivino in perfette condizioni. I costi di spedizione variano a seconda della destinazione e delle dimensioni del cabinato.</p>
        </div>
    </div>

    <div class="w3-card-4 w3-margin">
        <header class="w3-container w3-light-grey faq-question">
            <h3>Qual è la politica di garanzia per i cabinati?</h3>
        </header>
        <div class="w3-container faq-answer">
            <p>I nostri cabinati arcade sono coperti da una garanzia di 12 mesi che copre difetti di fabbricazione e problemi hardware. Offriamo anche supporto tecnico per tutta la vita del prodotto.</p>
        </div>
    </div>

    <div class="w3-card-4 w3-margin">
        <header class="w3-container w3-light-grey faq-question">
            <h3>Avete un supporto clienti?</h3>
        </header>
        <div class="w3-container faq-answer">
            <p>Sì, il nostro team di supporto clienti è disponibile 24/7 per assisterti con qualsiasi domanda o problema. Puoi contattarci tramite email, telefono o chat dal vivo sul nostro sito.</p>
        </div>
    </div>

    <div class="w3-card-4 w3-margin">
        <header class="w3-container w3-light-grey faq-question">
            <h3>Quali metodi di pagamento accettate?</h3>
        </header>
        <div class="w3-container faq-answer">
            <p>Accettiamo vari metodi di pagamento, tra cui carte di credito, PayPal, bonifici bancari e pagamenti rateali attraverso servizi finanziari partner.</p>
        </div>
    </div>
</div>

</main>

<?php include('footer.html') ?>

<script>
    $(document).ready(function() {
        $('.faq-question').click(function() {
            $(this).next('.faq-answer').slideToggle();
        });
    });
</script>

</body>

</html>