<!DOCTYPE html>
<html lang="it">

<?php session_start(); ?>

<head>
    <?php include('head_items.html'); ?>

    <!-- Title -->
    <?php echo "<title>{$_SESSION['username']} - SAW | Cabinets</title>"; ?>
</head>

<body>
<?php include('header.php'); ?>

<main>
    <?php
        if(!isset($_SESSION["username"])) {
            header("Location: login.php");
        }
    ?>

    <div class="w3-card options-container">
        <?php
            $username = $_SESSION["username"];
            echo "<h1 class='w3-center' style='padding: 10px;'>Benvenuto $username</h1>"; ?>

        <div class="w3-bar w3-center">
            <nav>
                <a href="#" style="text-decoration: none">Notifiche</a> |
                <a href="#" style="text-decoration: none">Lingua</a> |
                <a href="#" style="text-decoration: none">Metodi di Pagamento</a> |
                <a href="private_area_files/logout.php" style="text-decoration: none">Logout</a> |
                <a href="private_area_files/delete_account.php" style="color: red; text-decoration: none">Elimina account</a>
            </nav>
        </div>

        <div class="w3-container w3-center" style="margin: 30px;">
            <form action="">
                <label for="change_username">Cambia username: </label>
                <?php echo "<input type='text' placeholder='$username' id='change_username' name='change_username'>"; ?>
                <br>
                <label for="password_change">Cambia password: </label>
                <input type='password' placeholder='Password' id='change_username' name='change_username'>
            </form>
        </div>

    </div>

</main>

<?php include('footer.html'); ?>

</body>
</html>
