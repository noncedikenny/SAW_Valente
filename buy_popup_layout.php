<div id="overlay" style="display: none; position: fixed; top: 0; bottom: 0; left: 0; right: 0; background: rgba(0, 0, 0, 0.7); backdrop-filter: blur(8px); z-index: 1;">
    <div id="buyPopup" class="w3-container w3-padding-32 w3-card-4 w3-light-grey">
        <span class="w3-right" id="close" style="cursor:pointer">&times;</span>
        <h2 class="w3-center">Riempi il form con i dettagli del tuo prodotto</h2>

        <div id="errorMessage" class="w3-text-red w3-center" style="display: none;"></div>

        <form id="productForm" class="w3-container">
            <h3 id="showSelectedProductName"></h3>
            <h4 id="basePrice"></h4>

            <label>Dimensioni in Altezza (cm):</label>
            <input class="w3-input w3-border" type="number" id="height" name="height" min="100" step="1" required="required">
            <label>Dimensioni in Lunghezza (cm):</label>
            <input class="w3-input w3-border" type="number" id="width" name="width" min="30" step="1" required="required"><br>

            <label>Versione del Raspberry Pi:</label><br>
            <input class="w3-radio" type="radio" id="rasp4" name="rasp_version" value="4" data-price="50">
            <label>Raspberry Pi 4</label>
            <span id="rasp4_price" class="w3-right" style="display: none; color: green;">+50€</span>
            <br>

            <input class="w3-radio" type="radio" id="rasp400" name="rasp_version" value="400" data-price="100">
            <label>Raspberry Pi 400</label>
            <span id="rasp400_price" class="w3-right" style="display: none; color: green;">+100€</span>
            <br>

            <input class="w3-radio" type="radio" id="rasp5" name="rasp_version" value="5" data-price="120">
            <label>Raspberry Pi 5</label>
            <span id="rasp5_price" class="w3-right" style="display: none; color: green;">+120€</span>
            <br><br>

            <label>Dimensione della MicroSD:</label><br>
            <input class="w3-radio" type="radio" id="sd64" name="sd_size" value="64" data-price="15">
            <label>64GB</label>
            <span id="sd64_price" class="w3-right" style="display: none; color: green;">+15€</span>
            <br>
            
            <input class="w3-radio" type="radio" id="sd128" name="sd_size" value="128" data-price="25">
            <label>128GB</label>
            <span id="sd128_price" class="w3-right" style="display: none; color: green;">+25€</span>
            <br>

            <input class="w3-radio" type="radio" id="sd256" name="sd_size" value="256" data-price="35">
            <label>256GB</label>
            <span id="sd256_price" class="w3-right" style="display: none; color: green;">+35€</span>
            <br><br>

            <label>Dimensione del Monitor:</label><br>
            <input class="w3-radio" type="radio" id="monitor20" name="monitor_size" value="20" data-price="80">
            <label>20"</label>
            <span id="monitor20_price" class="w3-right" style="display: none; color: green;">+80€</span>
            <br>

            <input class="w3-radio" type="radio" id="monitor24" name="monitor_size" value="24" data-price="90">
            <label>24"</label>
            <span id="monitor24_price" class="w3-right" style="display: none; color: green;">+90€</span>
            <br>
            
            <input class="w3-radio" type="radio" id="monitor26" name="monitor_size" value="26" data-price="100">
            <label>26"</label>
            <span id="monitor26_price" class="w3-right" style="display: none; color: green;">+100€</span>
            <br><br>
            
            <input class="w3-check" type="checkbox" id="usb" name="usb" data-price="15">
            <label>Hub USB aggiuntiva</label>
            <span id="usb_price" class="w3-right" style="display: none; color: green;">+15€</span>
            <br>

            <input class="w3-check" type="checkbox" id="lightgun" name="lightgun">
            <label>Lightgun</label>
            <span id="lightgun_price" class="w3-right" style="display: none; color: green;">+100€</span>
            <br>

            <h4 id="totalPrice"></h4>

            <br>

            <?php
                $onclick = isset($_SESSION['islogged']) && $_SESSION['islogged'] == true 
                    ? "addToCartFromPopup('{$_SESSION['email']}')"
                    : "window.location.replace('login_page.php')";

                $value = isset($_SESSION['islogged']) && $_SESSION['islogged'] == true
                    ? "Ordina"
                    : "Loggati per acquistare";
            ?>
            <input type="submit" class="w3-btn w3-blue" onclick="<?php echo $onclick; ?>" value="<?php echo $value ?>">

        </form>
    </div>
</div>

<script src="scripts/show_hide_popup.js"></script>