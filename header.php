<?php 
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
?>

<header class="w3-grey" style="padding: 1px;">
    <!-- Logo -->
    <div class="w3-image w3-center logo-container">
        <a href="index.php">
            <img src="photos/SAWCabinet_Logo.png" alt="Logo">
        </a>
    </div>

    <!-- Searchbar -->
    <div class="w3-grey w3-center w3-padding search-container">
        <form method="GET" action="scripts/search.php">
            <input type="text" name="query" id="query" placeholder="Cerca nel sito...">
            <button class="w3-btn" type="submit" id="submitButton"><i class="fas fa-search"></i></button>
            <p id="emptyInput" style="display: none; color: red;">Input vuoto!</p>
        </form>
    </div>

    <!-- Navbar -->
    <div id="navbar" class="w3-bar w3-black">
        <?php
        if(isset($_SESSION['islogged']) && $_SESSION['islogged'] == true) { ?>
            <a href="aboutus.php" class="w3-bar-item w3-button w3-mobile" style="width:25%">Chi Siamo?</a>
            <a href="shop.php" class="w3-bar-item w3-button w3-mobile" style="width:25%">Catalogo</a>
            <a href="faq_page.php" class="w3-bar-item w3-button w3-mobile" style="width:25%">FAQ</a>
            <a href='show_profile.php' class='w3-bar-item w3-button w3-mobile' style='width:25%'><?php echo "{$_SESSION['firstname']} {$_SESSION['lastname']}"; ?></a>
        <?php }
        
        else { ?>
            <a href="aboutus.php" class="w3-bar-item w3-button w3-mobile" style="width:20%">Chi Siamo?</a>
            <a href="shop.php" class="w3-bar-item w3-button w3-mobile" style="width:20%">Catalogo</a>
            <a href="faq_page.php" class="w3-bar-item w3-button w3-mobile" style="width:20%">FAQ</a>
            <a href="registration_page.php" class="w3-bar-item w3-button w3-mobile" style="width:20%">Registrati</a>
            <a href="login_page.php" class="w3-bar-item w3-button w3-mobile" style="width: 20%">Login</a>
        <?php } ?>
        
    </div>
</header>

<!-- Block the searchbar input if it's empty -->
<script>
    $(document).ready(function() {
        $('#submitButton').click(function(event) {
            var inputValue = $('#query').val();
            if (inputValue === '') {
                event.preventDefault();
                $('#emptyInput').css({
                    'display': 'block'
                });
            }
        });
    });


</script>
