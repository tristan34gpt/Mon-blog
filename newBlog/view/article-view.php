<?php
$title = "cosmos";
ob_start();
?>

<!-- contenue de l'article !-->
<div>
<h1 class="text-center mt-4"><?=$article?></h1>
<p class="text-center mt-2 p-4"><?= $contentArticle?></p>
</div>

<!-- partie commentaire de l'article !-->
<?php if(isset($_SESSION['connection'])){
?>
<form class="p-3" method="post" action="">
    <label class="d-block" for="commentaire">Écrire votre commentaire</label>
    <textarea class="w-auto" id="commentaire" name="commentaire" rows="4" cols="40" required></textarea>
    <input class="d-block mt-2" type="submit" value="Envoyer">
</form>

<!-- les commentaires !-->
<?php
    if(isset($contentComments)){
    foreach($contentComments as $contentCom){?>
        
    
        <div class=" commentaire bg-dark d-flex justify-content-center flex-column m-4">
        <h3 class="text-title"><?=$contentCom['first_name']." ".$contentCom['last_name']?></h3>   
        <p class="text-title text-center p-3"><?=$contentCom['content']?></p>
        </div>
    </div>
    
<?php 
    }
}
}else{
    ?>
    <h6>Connecter vous pour écrire des commentaires !</h6>
    <button><a href="index.php?page=connexion">Connecter vous ici !</a></button>
<?php
    }
    $content = ob_get_clean();
    require('base.php');
?>