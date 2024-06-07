<style>
    .star {
        font-size: 3vh;
        cursor: pointer;
    }
    
    .one {
        color: rgb(255, 0, 0);
    }
    
    .two {
        color: rgb(255, 106, 0);
    }
    
    .three {
        color: rgb(251, 255, 120);
    }
    
    .four {
        color: rgb(255, 255, 0);
    }
    
    .five {
        color: rgb(24, 159, 14);
    }
</style>

<?php

require("dbconfig.php");
require("purchase_check.php");

if (isset($_SESSION['email']) && $hasPurchased == true) { ?>
    <div class="w3-card" style="background-color: lightgray; margin: 20px auto; width: 100%;">
        <h5>Lascia una recensione!</h5>
        <div id="rating-<?php echo htmlspecialchars($productName, ENT_QUOTES, 'UTF-8'); ?>">
            <span onclick="rate(1, '<?php echo htmlspecialchars($_SESSION['email'], ENT_QUOTES, 'UTF-8'); ?>', '<?php echo htmlspecialchars($productName, ENT_QUOTES, 'UTF-8'); ?>')" class="star">★</span>
            <span onclick="rate(2, '<?php echo htmlspecialchars($_SESSION['email'], ENT_QUOTES, 'UTF-8'); ?>', '<?php echo htmlspecialchars($productName, ENT_QUOTES, 'UTF-8'); ?>')" class="star">★</span>
            <span onclick="rate(3, '<?php echo htmlspecialchars($_SESSION['email'], ENT_QUOTES, 'UTF-8'); ?>', '<?php echo htmlspecialchars($productName, ENT_QUOTES, 'UTF-8'); ?>')" class="star">★</span>
            <span onclick="rate(4, '<?php echo htmlspecialchars($_SESSION['email'], ENT_QUOTES, 'UTF-8'); ?>', '<?php echo htmlspecialchars($productName, ENT_QUOTES, 'UTF-8'); ?>')" class="star">★</span>
            <span onclick="rate(5, '<?php echo htmlspecialchars($_SESSION['email'], ENT_QUOTES, 'UTF-8'); ?>', '<?php echo htmlspecialchars($productName, ENT_QUOTES, 'UTF-8'); ?>')" class="star">★</span>
        </div>
    </div>
    <script src="scripts/star_rating_logic.js"></script>
<?php 
}
?>
