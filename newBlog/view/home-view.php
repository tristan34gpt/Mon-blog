<?php
$title = "Cosmos";
ob_start();
?>

<header>
<video autoplay loop muted class="w-100 h-25">
        <source src="public/asset/vidéo/particules.mp4" type="video/mp4">
</video>
</header>


<div class="container">
    <h2 class="mt-4 text-center">Les News sur l'espace !</h2>

<!-- boucle pour afficher les titres des articles !-->
<?php foreach($article as $titleArticle){?>
        
    
    <div class="bg-dark m-4">
        <p class="text-title text-center p-3"><?=$titleArticle['title']?></p>
        <form class="d-flex justify-content-center flex-column" method="post" action="index.php?page=article">
                <input type="hidden" name="article_id" value="<?= $titleArticle['id']?>">
                <button class="button bg-button" type="submit">En savoir plus</button>
            </form>
    </div>
</div>

<?php } ?>


<?php
$content = ob_get_clean();
require('base.php');
?>