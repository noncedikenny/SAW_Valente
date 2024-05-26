let slideIndex = 0;
        showDivs();

        function plusDivs(n) {
            slideIndex += n;
            showDivs();
        }

        function showDivs() {
            let i;
            let x = document.getElementsByClassName("mySlides");
            if (slideIndex >= x.length) {slideIndex = 0}
            if (slideIndex < 0) {slideIndex = x.length - 1}
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            x[slideIndex].style.display = "block";
        }

        // Aggiungi un timer per passare automaticamente alla foto successiva ogni 3 secondi
        setInterval(function() {
            plusDivs(1);
        }, 10000);