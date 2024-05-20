<DOCTYPE html>
<html lang="it">

<?php include('utilities/cookie_check.php'); ?>

<head>
    <?php include('head_items.html'); ?>

    <style>
        #search-result {
            border: 1px solid;
            width: 50%; 
            margin: 10px auto;
        }
    </style>

    <!-- Title -->
    <title>Risultati Ricerca - SAW | Cabinets</title>
</head>

<body>
    <?php include('header.php'); ?>

    <main>
        <?php
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $result = $_SESSION['result'] ?? null;
            if (isset($_SESSION['result'])) {
                $resultsArray = $_SESSION['result'];
                foreach ($resultsArray as $row) {
                    echo "<div class='w3-center' id='search-result'>";
                    echo "<img src='photos/shop_photos/". $row['name'] . ".png' alt='Prodotto' style='width: 10%'> <h2>" . $row['name'] . ": " . $row['price'] . "€ </h2>";
                    echo "</div>";
                }
                if(empty($resultsArray)) {
                    include('utilities/no_result.html');
                }
            } else {
                include('utilities/no_result.html');
            }
            unset($_SESSION['result']);
        ?>
    </main>

    <?php include('footer.html') ?>
</body>

</html>