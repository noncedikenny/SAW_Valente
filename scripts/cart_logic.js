// Adds a product to the cart for a specific user
function addToCart(userEmail, productName, productPrice) {
    let carts = JSON.parse(localStorage.getItem('carts')) || {};
    let cart = carts[userEmail] || [];
    // Find the item in the user's cart
    let item = cart.find(item => item.name === productName);

    if (item) {
        item.quantity += 1;
    } else {
        cart.push({ name: productName, price: productPrice, quantity: 1 });
    }

    // Saves the updated cart for the user
    carts[userEmail] = cart;
    localStorage.setItem('carts', JSON.stringify(carts));
    // Show a confirmation message
    alert('Prodotto aggiunto al carrello');
}

// View the cart for a specific user
function displayCart(userEmail) {
    let carts = JSON.parse(localStorage.getItem('carts')) || {};
    let cart = carts[userEmail] || [];
    // Select the cart item container
    let $cartItemsContainer = $('#cart-items');

    // If your cart is empty, show an empty cart message
    if (cart.length === 0) {
        $cartItemsContainer.html(`
            <div class="w3-center empty_container">
                <img src="../photos/empty_cart.png" style="width: 25%;" alt="Carrello vuoto">
                <h2>Il carrello è vuoto.</h2>
            </div>
        `);
    } else {
        // If your cart contains items, view them
        $cartItemsContainer.html(cart.map(item => `
            <div class="w3-card-4 w3-margin w3-padding">
                <span class="w3-text-red w3-right" onclick="removeFromCart('${userEmail}', '${item.name}')">&times;</span>
                <h3>${item.name}</h3>
                <p>Prezzo: €${item.price}</p>
                <p>Quantità: <span id="quantity_${item.name}">${item.quantity}</span>
                    <button onclick="changeQuantity('${userEmail}', '${item.name}', 'increment')">+</button>
                    <button onclick="changeQuantity('${userEmail}', '${item.name}', 'decrement')" ${item.quantity <= 1 ? 'disabled' : ''}>-</button>
                </p>
                <p>Totale: €${item.price * item.quantity}</p>
            </div>
        `).join(''));
    }

    calculateTotalPrice(userEmail);
}

// Cleans the cart for a specific user
function clearCart(userEmail) {
    let carts = JSON.parse(localStorage.getItem('carts')) || {};
    delete carts[userEmail];
    localStorage.setItem('carts', JSON.stringify(carts));
    displayCart(userEmail);
}

function calculateTotalPrice(userEmail) {
    let carts = JSON.parse(localStorage.getItem('carts')) || {};
    let cart = carts[userEmail] || [];
    let totalPrice = 0;

    // Calculate the total price by adding the price of each item multiplied by the quantity
    cart.forEach(item => {
        totalPrice += item.price * item.quantity;
    });

    $('#showTotalPrice').text("Prezzo totale: " + totalPrice + "€");
}

// Removes an item from the cart
function removeFromCart(userEmail, itemName) {
    let carts = JSON.parse(localStorage.getItem('carts')) || {};
    let cart = carts[userEmail] || [];
    
    // Filter the articles to remove the one with the specified name
    cart = cart.filter(item => item.name !== itemName);
    
    // If the cart is empty after removal, delete the user's cart
    if (cart.length === 0) {
        delete carts[userEmail];
    } else {
        // Save the updated cart for the user
        carts[userEmail] = cart;
    }

    localStorage.setItem('carts', JSON.stringify(carts));
    
    displayCart(userEmail);
}

// Cambia la quantità di un articolo nel carrello
function changeQuantity(userEmail, productName, action) {
    let carts = JSON.parse(localStorage.getItem('carts')) || {};
    let cart = carts[userEmail] || [];
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
    carts[userEmail] = cart;
    localStorage.setItem('carts', JSON.stringify(carts));

    displayCart(userEmail);
}

function completeOrder(userEmail) {
    let carts = JSON.parse(localStorage.getItem('carts')) || {};
    let cart = carts[userEmail] || [];
    let purchaseDate = new Date().toISOString().split('T')[0];

    if (cart.length > 0) {
        fetch("scripts/complete_payment.php", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ cart: cart, purchaseDate: purchaseDate })
        })
        .then(response => response.text())
        .then(data => {
            try {
                let jsonData = JSON.parse(data);
                if (jsonData.success) {
                    alert('Acquisto effettuato, grazie!');
                    clearCart(userEmail);
                    window.location.replace('index.php');
                } else {
                    alert('Errore nell\'invio del carrello.');
                }
            } catch (e) {
                console.error('Errore nel parsing del JSON:', e);
                console.error('Risposta del server:', data);
                alert('Errore nella risposta del server.');
            }
        })
        .catch(error => console.error('Errore:', error));
    } else {
        alert('Il carrello è vuoto.');
    }
}


