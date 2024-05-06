<!DOCTYPE html>
<html lang="it">

<?php include('utilities/cookie_check.php'); 

    if (!isset($_SESSION['firstname'])) {
        header("Location: login_page.php");
    }

?>

<head>
    <?php include('head_items.html'); ?>

    <!-- Title -->
    <?php echo "<title>{$_SESSION['firstname']} {$_SESSION['lastname']} - SAW | Cabinets</title>"; ?>
</head>

<body>
<?php include('header.php'); ?>

<main>
    <div class="w3-card options-container">
        <?php
            echo "<h1 class='w3-center' style='padding: 10px;'>Benvenuto {$_SESSION['firstname']} {$_SESSION['lastname']}</h1>"; ?>

        <div class="w3-bar w3-center">
            <nav>
                <a href="#" style="text-decoration: none">Notifiche</a> |
                <a href="#" style="text-decoration: none">Lingua</a> |
                <a href="#" style="text-decoration: none">Metodi di Pagamento</a> |
                <a href="scripts/logout.php" style="text-decoration: none">Logout</a> |
                <a href="scripts/delete_account.php" style="color: red; text-decoration: none">Elimina account</a>
            </nav>
        </div>
    </div>

</main>

<?php include('footer.html'); ?>

</body>
</html>
