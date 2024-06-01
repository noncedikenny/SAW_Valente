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
$onClickIfNotLogged = "onclick = \"alert('Loggati per votare.')\""; 
?>

<div class="w3-card" style="background-color: lightgray; margin: 20px auto; width: 100%;">
    <h5>Lascia una recensione!</h5>
    <div class="rating" id="rating-<?php echo htmlspecialchars($productName, ENT_QUOTES, 'UTF-8'); ?>">
        <span <?php echo isset($_SESSION['email']) ? 'onclick="rate(1, \'' . htmlspecialchars($_SESSION['email'], ENT_QUOTES, 'UTF-8') . '\', \'' . htmlspecialchars($productName, ENT_QUOTES, 'UTF-8') . '\')"' : 'onclick="alert(\'Devi acquistare il prodotto per poter votare.\')'; ?> class="star">★</span>
        <span <?php echo isset($_SESSION['email']) ? 'onclick="rate(2, \'' . htmlspecialchars($_SESSION['email'], ENT_QUOTES, 'UTF-8') . '\', \'' . htmlspecialchars($productName, ENT_QUOTES, 'UTF-8') . '\')"' : 'onclick="alert(\'Devi acquistare il prodotto per poter votare.\')'; ?> class="star">★</span>
        <span <?php echo isset($_SESSION['email']) ? 'onclick="rate(3, \'' . htmlspecialchars($_SESSION['email'], ENT_QUOTES, 'UTF-8') . '\', \'' . htmlspecialchars($productName, ENT_QUOTES, 'UTF-8') . '\')"' : 'onclick="alert(\'Devi acquistare il prodotto per poter votare.\')'; ?> class="star">★</span>
        <span <?php echo isset($_SESSION['email']) ? 'onclick="rate(4, \'' . htmlspecialchars($_SESSION['email'], ENT_QUOTES, 'UTF-8') . '\', \'' . htmlspecialchars($productName, ENT_QUOTES, 'UTF-8') . '\')"' : 'onclick="alert(\'Devi acquistare il prodotto per poter votare.\')'; ?> class="star">★</span>
        <span <?php echo isset($_SESSION['email']) ? 'onclick="rate(5, \'' . htmlspecialchars($_SESSION['email'], ENT_QUOTES, 'UTF-8') . '\', \'' . htmlspecialchars($productName, ENT_QUOTES, 'UTF-8') . '\')"' : 'onclick="alert(\'Devi acquistare il prodotto per poter votare.\')'; ?> class="star">★</span>
    </div>
</div>
<script src="scripts/star_rating_logic.js"></script>
