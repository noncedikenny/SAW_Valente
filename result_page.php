<DOCTYPE html>
<html lang="it">

<?php require_once('utilities/cookie_check.php'); ?>

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
        <div class='w3-row-padding product-container' style='margin: 0 auto;'>
        <?php
            $result = $_SESSION['result'] ?? null;
            if (isset($_SESSION['result'])) {
                $resultsArray = $_SESSION['result'];
                foreach ($resultsArray as $row) { ?>
                    <div class='w3-card w3-third w3-center w3-padding-32 product'>
                        <div id='search-result' onclick='window.location.replace("shop.php")'>
                            <img src='photos/shop_photos/". <?php echo $row['name']; ?> . ".png' alt='Prodotto' class='w3-image' style='width: 80%'> 
                            <h2><?php echo $row['name']; ?>: <?php echo $row['price']; ?>€ </h2>
                        </div>
                    </div>
                <?php }
                if (empty($resultsArray)) {
                    include('utilities/no_result.html');
                }
            } else {
                include('utilities/no_result.html');
            }
            unset($_SESSION['result']);
        ?>
        </div>
    </main>

    <?php include('footer.html') ?>
</body>

</html>