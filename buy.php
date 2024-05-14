<!DOCTYPE html>
<html lang="it">
    <head>
        <?php include("head_items.html")?>

        <!-- Title -->
    <title>Acquista - SAW | Cabinets</title>
    </head>
    
    <body>
        <?php include('header.php'); ?>
        
        <div id="buyPopup" class="w3-container w3-padding-32 w3-card-4 w3-light-grey" style="margin: 0 auto;">
            <h2 class="w3-center">Riempi il form con i dettagli del tuo prodotto</h2>
            <form id="productForm" class="w3-container">
                <label>Dimensioni in Altezza:</label>
                <input class="w3-input w3-border" type="number" id="altezza" name="altezza" min="0" step="1">
                <label>Dimensioni in Lunghezza:</label>
                <input class="w3-input w3-border" type="number" id="lunghezza" name="lunghezza" min="0" step="1"><br>

                <label>Versione del Raspberry Pi:</label><br>
                <input class="w3-radio" type="radio" id="rasp4" name="version" value="4">
                <label>Raspberry Pi 4</label><br>
                <input class="w3-radio" type="radio" id="rasp400" name="version" value="400">
                <label>Raspberry Pi 400</label><br>
                <input class="w3-radio" type="radio" id="rasp5" name="version" value="5">
                <label>Raspberry Pi 5</label><br><br>
                
                <label>Dimensione della MicroSD:</label><br>
                <input class="w3-radio" type="radio" id="sd64" name="sd64" value="64">
                <label>64GB</label><br>
                <input class="w3-radio" type="radio" id="sd128" name="sd128" value="128">
                <label>128GB</label><br>
                <input class="w3-radio" type="radio" id="sd256" name="sd256" value="256">
                <label>256GB</label><br><br>

                <label>Dimensione del Monitor:</label><br>
                <input class="w3-radio" type="radio" id="monitor20" name="monitor20" value="20">
                <label>20"</label><br>
                <input class="w3-radio" type="radio" id="monitor24" name="monitor24" value="24">
                <label>24"</label><br>
                <input class="w3-radio" type="radio" id="monitor26" name="monitor26" value="26">
                <label>26"</label><br><br>
                
                <input class="w3-check" type="checkbox" id="usb" name="usb">
                <label>Hub USB aggiuntiva</label><br>
                <input class="w3-check" type="checkbox" id="lightgun" name="lightgun">
                <label>Lightgun</label><br><br>

                <input class="w3-check" type="checkbox" id="payment" name="payment">
                <label>Usa i dati di pagamento salvati nel profilo</label><br><br>

                <button class="w3-btn w3-blue">Ordina</button>
            </form>
        </div>
    </body>

    <?php include('footer.html'); ?>
</html>