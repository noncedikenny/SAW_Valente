var basePrice = 0;
var productName;

// Show popup
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

        basePrice = $(this).data("price");
        productName = $(this).data("product");
        updateTotalPrice();

        // Show base price of the product
        $("#showSelectedProductName").text("Stai acquistando un " + productName);
        $("#basePrice").text("Prezzo di base: " + basePrice + "€");
    });
});

function calculateAdditionalPrice() {
    var additionalPrice = 0;
    // Logica per calcolare il prezzo aggiuntivo basato sulle opzioni selezionate nel popup
    $('#productForm input:checked').each(function() {
        var priceText = $(`#${this.id}_price`).text();
        var price = parseFloat(priceText.replace(/[^0-9.]/g, '')); // Estrai il numero dal testo
        additionalPrice += price;
    });
    return additionalPrice;
}

// Funzione per aggiornare il prezzo totale
function updateTotalPrice() {
    var totalPrice = basePrice + calculateAdditionalPrice();
    $('#totalPrice').text("Prezzo totale: " + totalPrice + "€");
}

// Aggiungi i listener di evento per aggiornare il prezzo totale quando le opzioni vengono selezionate/deselezionate
$('#productForm input').on('change', function() {
    updateTotalPrice();
});

// Hide popup
$(document).ready(function() {
    var $popup = $("#buyPopup");
    var $overlay = $("#overlay");

    $("#close").click(function() {
        $popup.hide();
        $overlay.hide();
        $('html, body').css({
            'overflow': 'auto',
            'height': 'auto',
            'margin': 'auto'
        });
        resetPopup();
    });
});


// Show / hide prices
function hidePrices(groupName) {
    $(`#productForm input[name=${groupName}]`).each(function() {
        $(`#${this.id}_price`).hide();
    });
}

function addRadioEventListeners(groupName) {
    $(`#productForm input[name=${groupName}]`).on('change', function() {
        hidePrices(groupName);
        $(`#${this.id}_price`).show();
    });
}

addRadioEventListeners('rasp_version');
addRadioEventListeners('sd_size');
addRadioEventListeners('monitor_size');

$('#productForm input[type=checkbox]').on('change', function() {
    $(`#${this.id}_price`).css('display', this.checked ? 'block' : 'none');
});

function resetPopup() {
    $('#productForm input').prop('checked', false); // Deseleziona tutte le opzioni
    hideAllPrices(); // Nasconde tutti i prezzi aggiuntivi
    $('#basePrice').text("Prezzo di base: 0€");
    $('#totalPrice').text("Prezzo totale: 0€");
    basePrice = 0;
}

// Funzione per nascondere tutti i prezzi aggiuntivi
function hideAllPrices() {
    $('#productForm input[type=radio]').each(function() {
        $(`#${this.id}_price`).hide();
    });
    $('#productForm input[type=checkbox]').each(function() {
        $(`#${this.id}_price`).hide();
    });
}

function addToCartFromPopup(userId) {
    var totalPrice = basePrice + calculateAdditionalPrice(); // Calcola il prezzo totale con le opzioni aggiuntive

    let carts = JSON.parse(localStorage.getItem('carts')) || {};
    let cart = carts[userId] || [];
    let item = cart.find(item => item.name === productName);

    if (item) {
        item.quantity += 1;
    } else {
        cart.push({ name: productName, price: totalPrice, quantity: 1 });
    }

    carts[userId] = cart;
    localStorage.setItem('carts', JSON.stringify(carts));
    alert('Prodotto aggiunto al carrello');

    // Chiudi il popup dopo l'ordine
    $("#buyPopup").hide();
    $("#overlay").hide();
    $('html, body').css({
        'overflow': 'auto',
        'height': 'auto',
        'margin': 'auto'
    });
}