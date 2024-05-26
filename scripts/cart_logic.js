function addToCart(userId, productName, productPrice) {
    let carts = JSON.parse(localStorage.getItem('carts')) || {};
    let cart = carts[userId] || [];
    let item = cart.find(item => item.name === productName);

    if (item) {
        item.quantity += 1;
    } else {
        cart.push({ name: productName, price: productPrice, quantity: 1 });
    }

    carts[userId] = cart;
    localStorage.setItem('carts', JSON.stringify(carts));
    alert('Prodotto aggiunto al carrello');
}

function displayCart(userId) {
    let carts = JSON.parse(localStorage.getItem('carts')) || {};
    let cart = carts[userId] || [];
    let cartItemsContainer = document.getElementById('cart-items');
    
    if (cart.length === 0) {
        cartItemsContainer.innerHTML = `
            <div class="w3-center">
                <img src="../photos/empty_cart.png" style="width: 25%;" alt="Carrello vuoto">
                <p>Il carrello è vuoto.</p>
            </div>
        `;
    } else {
        cartItemsContainer.innerHTML = cart.map(item => `
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
        `).join('');
    }

    calculateTotalPrice(userId);
}

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

    // Calcola la somma dei prezzi degli oggetti nel carrello
    cart.forEach(item => {
        totalPrice += item.price * item.quantity;
    });

    $('#showTotalPrice').text("Prezzo totale: " + totalPrice + "€");
}

function removeFromCart(userId, itemName) {
    let carts = JSON.parse(localStorage.getItem('carts')) || {};
    let cart = carts[userId] || [];
    
    // Rimuove l'elemento dal carrello
    cart = cart.filter(item => item.name !== itemName);
    
    carts[userId] = cart;
    localStorage.setItem('carts', JSON.stringify(carts));
    
    // Ridisegna il carrello per riflettere le modifiche
    displayCart(userId);
}

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

    carts[userId] = cart;
    localStorage.setItem('carts', JSON.stringify(carts));
    displayCart(userId);
}
