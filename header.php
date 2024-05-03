<header class="w3-grey" style="padding: 1px;">
    <!-- Logo -->
    <div class="w3-image w3-center logo-container">
        <a href="index.php">
            <img src="SAWCabinet_Logo.png" alt="Logo">
        </a>
    </div>

    <!-- Navbar -->
    <div class="w3-bar w3-black">
        <a href="aboutus.php" class="w3-bar-item w3-button w3-mobile" style="width:20%">Chi Siamo?</a>
        <a href="#" class="w3-bar-item w3-button w3-mobile" style="width:20%">Catalogo</a>
        <a href="#" class="w3-bar-item w3-button w3-mobile" style="width:20%">FAQ</a>

        <?php
        if(isset($_SESSION["username"])) {
            $username = $_SESSION["username"];
            echo "<a href='registration.php' class='w3-bar-item w3-button w3-mobile' style='width:20%'>$username</a>";
            echo '<a href="logout.php" class="w3-bar-item w3-button w3-mobile" style="width: 20%">Logout</a>';
        }
        else {
            echo '<a href="registration.php" class="w3-bar-item w3-button w3-mobile" style="width:20%">Registrati</a>';
            echo '<a href="login.php" class="w3-bar-item w3-button w3-mobile" style="width: 20%">Login</a>';
        }
        ?>
    </div>
</header>