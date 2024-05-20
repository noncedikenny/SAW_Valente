<header class="w3-grey" style="padding: 1px;">
    <!-- Logo -->
    <div class="w3-image w3-center logo-container">
        <a href="index.php">
            <img src="photos/SAWCabinet_Logo.png" alt="Logo">
        </a>
    </div>

    <div class="w3-grey w3-center w3-padding search-container">
        <form method="GET" action="scripts/search.php">
            <input type="text" name="query" id="query" placeholder="Cerca nel sito...">
            <button class="w3-btn" type="submit" id="submitButton"><i class="fas fa-search"></i></button>
            <p id="emptyInput" style="display: none; color: red;">Input vuoto!</p>
        </form>
    </div>

    <!-- Navbar -->
    <div class="w3-bar w3-black">
        <?php
        if(isset($_SESSION['firstname']) && $_SESSION['lastname']) {
            echo '<a href="aboutus.php" class="w3-bar-item w3-button w3-mobile" style="width:25%">Chi Siamo?</a>';
            echo '<a href="shop.php" class="w3-bar-item w3-button w3-mobile" style="width:25%">Catalogo</a>';
            echo '<a href="#" class="w3-bar-item w3-button w3-mobile" style="width:25%">FAQ</a>';
            echo "<a href='private_area.php' class='w3-bar-item w3-button w3-mobile' style='width:25%'>{$_SESSION['firstname']} {$_SESSION['lastname']}</a>";
        }
        else {
            echo '<a href="aboutus.php" class="w3-bar-item w3-button w3-mobile" style="width:20%">Chi Siamo?</a>';
            echo '<a href="shop.php" class="w3-bar-item w3-button w3-mobile" style="width:20%">Catalogo</a>';
            echo '<a href="#" class="w3-bar-item w3-button w3-mobile" style="width:20%">FAQ</a>';
            echo '<a href="registration_page.php" class="w3-bar-item w3-button w3-mobile" style="width:20%">Registrati</a>';
            echo '<a href="login_page.php" class="w3-bar-item w3-button w3-mobile" style="width: 20%">Login</a>';
        }
        ?>
    </div>
</header>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#submitButton').click(function(event) {
            var inputValue = $('#query').val();
            if (inputValue === '') {
                // Se l'input è vuoto, annulla l'invio del modulo
                event.preventDefault();
                $('#emptyInput').css({
                    'display': 'block'
                });
            }
        });
    });
</script>
