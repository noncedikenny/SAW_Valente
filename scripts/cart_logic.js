// Adds a product to the cart for a specific user
function addToCart(userId, productName, productPrice) {
    // Retrieve the carts from localStorage, or create an empty object if they don't exist
    let carts = JSON.parse(localStorage.getItem('carts')) || {};
    // Retrieves the specific user's cart, or creates an empty array if it does not exist
    let cart = carts[userId] || [];
    // Find the item in the user's cart
    let item = cart.find(item => item.name === productName);

    if (item) {
        item.quantity += 1;
    } else {
        cart.push({ name: productName, price: productPrice, quantity: 1 });
    }

    // Saves the updated cart for the user
    carts[userId] = cart;
    localStorage.setItem('carts', JSON.stringify(carts));
    // Show a confirmation message
    alert('Prodotto aggiunto al carrello');
}

// View the cart for a specific user
function displayCart(userId) {
    let carts = JSON.parse(localStorage.getItem('carts')) || {};
    let cart = carts[userId] || [];
    // Select the cart item container
    let $cartItemsContainer = $('#cart-items');

    // If your cart is empty, show an empty cart message
    if (cart.length === 0) {
        $cartItemsContainer.html(`
            <div class="w3-center">
                <img src="../photos/empty_cart.png" style="width: 25%;" alt="Carrello vuoto">
                <p>Il carrello è vuoto.</p>
            </div>
        `);
    } else {
        // If your cart contains items, view them
        $cartItemsContainer.html(cart.map(item => `
            <div class="w3-card-4 w3-margin w3-padding">
                <span class="w3-text-red w3-right" onclick="removeFromCart('${userId}', '${item.name}')">&times;</span>
                <h3>${item.name}</h3>
                <p>Prezzo: €${item.price}</p>
                <p>Quantità: <span id="quantity_${item.name}">${item.quantity}</span>
                    <button onclick="changeQuantity('${userId}', '${item.name}', 'increment')">+</button>
                    <button onclick="changeQuantity('${userId}', '${item.name}', 'decrement')" ${item.quantity <= 1 ? 'disabled' : ''}>-</button>
                </p>
                <p>Totale: €${item.price * item.quantity}</p>
            </div>
        `).join(''));
    }

    calculateTotalPrice(userId);
}

// Cleans the cart for a specific user
function clearCart(userId) {
    let carts = JSON.parse(localStorage.getItem('carts')) || {};
    delete carts[userId];
    localStorage.setItem('carts', JSON.stringify(carts));
    displayCart(userId);
}

function calculateTotalPrice(userId) {
    let carts = JSON.parse(localStorage.getItem('carts')) || {};
    let cart = carts[userId] || [];
    let totalPrice = 0;

    // Calculate the total price by adding the price of each item multiplied by the quantity
    cart.forEach(item => {
        totalPrice += item.price * item.quantity;
    });

    $('#showTotalPrice').text("Prezzo totale: " + totalPrice + "€");
}

// Removes an item from the cart
function removeFromCart(userId, itemName) {
    let carts = JSON.parse(localStorage.getItem('carts')) || {};
    let cart = carts[userId] || [];
    
    // Filter the articles to remove the one with the specified name
    cart = cart.filter(item => item.name !== itemName);
    
    // If the cart is empty after removal, delete the user's cart
    if (cart.length === 0) {
        delete carts[userId];
    } else {
        // Save the updated cart for the user
        carts[userId] = cart;
    }

    localStorage.setItem('carts', JSON.stringify(carts));
    
    displayCart(userId);
}

// Cambia la quantità di un articolo nel carrello
function changeQuantity(userId, productName, action) {
    let carts = JSON.parse(localStorage.getItem('carts')) || {};
    let cart = carts[userId] || [];
    let item = cart.find(item => item.name === productName);

    if (item) {
        if (action === 'increment') {
            item.quantity += 1;
        } else if (action === 'decrement') {
            if (item.quantity > 1) {
                item.quantity -= 1;
            }
        }
    }

    // Saves the updated cart for the user
    carts[userId] = cart;
    localStorage.setItem('carts', JSON.stringify(carts));

    displayCart(userId);
}

function completeOrder(userId) {
    let carts = JSON.parse(localStorage.getItem('carts')) || {};
    let cart = carts[userId] || [];

    if (cart.length > 0) {
        fetch("scripts/complete_payment.php", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ cart: cart })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Carrello inviato con successo!');
            } else {
                alert('Errore nell\'invio del carrello.');
            }
        })
        .catch(error => console.error('Errore:', error));
    } else {
        alert('Il carrello è vuoto.');
    }
}

