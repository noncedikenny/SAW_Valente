document.addEventListener('DOMContentLoaded', function() {
    // Funzione per aggiornare la valutazione
    window.rate = function(n, email, product) {
        let ratingDiv = document.getElementById('rating-' + product);
        if (!ratingDiv) return;
        
        let stars = ratingDiv.getElementsByClassName("star");
        remove(stars);
        
        for (let i = 0; i < n; i++) {
            if (n == 1) cls = "one";
            else if (n == 2) cls = "two";
            else if (n == 3) cls = "three";
            else if (n == 4) cls = "four";
            else if (n == 5) cls = "five";
            stars[i].className = "star " + cls;
        }
        
        fetch('scripts/submit_rating.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ product: product, email: email, rating: n })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Valutazione inviata con successo!');
            } else {
                alert('Errore nell\'invio della valutazione.');
            }
        })
        .catch(error => console.error('Errore:', error));
    }

    // Funzione per rimuovere la pre-applicazione degli stili
    function remove(stars) {
        for (let i = 0; i < stars.length; i++) {
            stars[i].className = "star";
        }
    }
});
