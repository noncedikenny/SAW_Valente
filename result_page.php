<DOCTYPE html>
<html lang="it">

<?php require_once('utilities/cookie_check.php'); ?>

<head>
    <?php include('head_items.html'); ?>

    <!-- Title -->
    <title>Risultati Ricerca - SAW | Cabinets</title>

    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="css/result_page_styles.css">
</head>

<body>
    <?php include('header.php'); ?>

    <main>
        <div class='w3-row-padding product-container' style='margin: 0 auto; cursor: pointer;' onclick='window.location.replace("shop.php")'>
            <?php
                $result = $_SESSION['result'] ?? null;
                if (isset($_SESSION['result'])) {
                    $resultsArray = $_SESSION['result'];
                    foreach ($resultsArray as $row) { ?>
                        <div class='w3-card w3-third w3-center w3-padding-32 product'>
                            <div id='search-result'>
                                <img src='photos/shop_photos/<?php echo $row['name']; ?>.png' alt='Prodotto' class='w3-image' style='width: 80%'>
                                <h2><?php echo $row['name']; ?>: <?php echo $row['price']; ?>€</h2>
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