<DOCTYPE html>
<html lang="it">

<?php include('utilities/cookie_check.php'); ?>

<head>
    <?php include('head_items.html'); ?>

    <style>
        #search-result {
            width: 50%;
            margin: auto;
        }
        #search-result img {
            max-width: 100%;
            height: auto;
        }
        #search-result:hover {
            cursor: pointer;
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
                echo "<div class='w3-row-padding product-container' style='margin: 0 auto;'>";
                foreach ($resultsArray as $row) {
                    echo "<div class='w3-card w3-third w3-center w3-padding-32 product'>";
                    echo "<div id='search-result' onclick='window.location.replace(\"shop.php\");'>";
                    echo "<img src='photos/shop_photos/". $row['name'] . ".png' alt='Prodotto' class='w3-image' style='width: 80%'> <h2>" . $row['name'] . ": " . $row['price'] . "€ </h2>";
                    echo "</div>";
                    echo "</div>";
                }
                echo "</div>";
                if (empty($resultsArray)) {
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