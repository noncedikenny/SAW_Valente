// Global Variables
var basePrice = 0;  // Initial base price of the product
var productName;    // Name of the selected product

// ----------------------------------------------------------------
//                      SHOW / HIDE FUNCTIONS

// Show popup
$(document).ready(function() {
    $("button").filter(function() {
        return $(this).text() === "Ordina";
    }).click(function() {
        var $popup = $("#buyPopup");
        var $overlay = $("#overlay");
        $popup.show();  // Show the popup
        $overlay.show();  // Show the overlay

        // Disable scrolling on the main page
        $('html, body').css({
            'overflow': 'hidden',
            'height': '100%',
            'margin': '0'
        });

        // Set the base price and product name based on the clicked button
        basePrice = $(this).data("price");
        productName = $(this).data("product");
        
        // Calculate the total price including any additional options
        var totalPrice = basePrice + calculateAdditionalPrice();
        $('#totalPrice').text("Prezzo totale: " + totalPrice + "€");

        // Display the selected product name and base price in the popup
        $("#showSelectedProductName").text("Stai acquistando un " + productName);
        $("#basePrice").text("Prezzo di base: " + basePrice + "€");
    });
});

// Hide popup
$(document).ready(function() {
    var $popup = $("#buyPopup");
    var $overlay = $("#overlay");

    // Close the popup and overlay when the close button is clicked
    $("#close").click(function() {
        $popup.hide();
        $overlay.hide();
        // Enable scrolling on the main page
        $('html, body').css({
            'overflow': 'auto',
            'height': 'auto',
            'margin': 'auto'
        });
        resetPopup();  // Reset the popup form
    });
});

// Add show / hide functions to radio buttons
function addRadioEventListeners(groupName) {
    $(`#productForm input[name=${groupName}]`).on('change', function() {
        $(`#productForm input[name=${groupName}]`).each(function() {
            $(`#${this.id}_price`).hide();  // Hide all price spans in the group
        });
        $(`#${this.id}_price`).show();  // Show the price span for the selected option
    });
}
addRadioEventListeners('rasp_version');
addRadioEventListeners('sd_size');
addRadioEventListeners('monitor_size');

// Show / hide prices for checkboxes based on their checked state
$('#productForm input[type=checkbox]').on('change', function() {
    $(`#${this.id}_price`).css('display', this.checked ? 'block' : 'none');
});

// Reset popup form when closed
function resetPopup() {
    $('#productForm input').prop('checked', false);  // Uncheck all inputs

    // Hide all price spans
    $('#productForm input[type=radio]').each(function() {
        $(`#${this.id}_price`).hide();
    });
    $('#productForm input[type=checkbox]').each(function() {
        $(`#${this.id}_price`).hide();
    });

    // Reset displayed prices
    $('#basePrice').text("Prezzo di base: 0€");
    $('#totalPrice').text("Prezzo totale: 0€");
    basePrice = 0;  // Reset base price
}

// ----------------------------------------------------------------


// ----------------------------------------------------------------
//                      PRICE COUNT FUNCTIONS

// Calculate the total additional price of selected options
function calculateAdditionalPrice() {
    var additionalPrice = 0;
    $('#productForm input:checked').each(function() {
        var priceText = $(`#${this.id}_price`).text();
        var price = parseFloat(priceText.replace(/[^0-9.]/g, ''));  // Extract the numeric value
        additionalPrice += price;  // Add to the total additional price
    });
    return additionalPrice;
}

// Update the total price when any input changes
$('#productForm input').on('change', function() {
    var totalPrice = basePrice + calculateAdditionalPrice();
    $('#totalPrice').text("Prezzo totale: " + totalPrice + "€");
});

// ----------------------------------------------------------------

// Add the resultant item to cart
function addToCartFromPopup(userId) {
    // Validate the width and height fields
    var height = $('#height').val();
    var width = $('#width').val();

    if (!height || !width) {
        $('#errorMessage').text('Per favore, inserisci sia la dimensione in altezza che in lunghezza.').show();
    } else {
        $('#errorMessage').text('').hide();

        var totalPrice = basePrice + calculateAdditionalPrice();

        let carts = JSON.parse(localStorage.getItem('carts')) || {};  // Retrieve existing carts from localStorage
        let cart = carts[userId] || [];  // Retrieve the user's cart or initialize an empty array
        let item = cart.find(item => item.name === productName && item.price === totalPrice);

        if (item) {
            item.quantity += 1;  // Increase quantity if the item is already in the cart
        } else {
            cart.push({ name: productName, price: totalPrice, quantity: 1 });  // Add new item to the cart
        }

        carts[userId] = cart;  // Update the user's cart in the carts object
        localStorage.setItem('carts', JSON.stringify(carts));  // Save the updated carts object to localStorage
        alert('Prodotto aggiunto al carrello');  // Notify the user

        // Close the popup and overlay
        $("#buyPopup").hide();
        $("#overlay").hide();
        $('html, body').css({
            'overflow': 'auto',
            'height': 'auto',
            'margin': 'auto'
        });
        resetPopup();  // Reset the popup form
    }
}
