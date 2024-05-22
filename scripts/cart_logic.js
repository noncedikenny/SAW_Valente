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
                <h3>${item.name}</h3>
                <p>Prezzo: €${item.price}</p>
                <p>Quantità: ${item.quantity}</p>
                <p>Totale: €${item.price * item.quantity}</p>
            </div>
        `).join('');
    }
}

function clearCart(userId) {
    let carts = JSON.parse(localStorage.getItem('carts')) || {};
    delete carts[userId];
    localStorage.setItem('carts', JSON.stringify(carts));
    displayCart(userId);
}
