<?php
$title = "article";
ob_start();
?>

<div class="text-center">
    <form class="p-4" method="post" action="">
        <h1 class="text-center mt-2">Modifier l'article</h1>
        <label class="d-block" for="title">Titre de l'article</label>
        <input type="text" name="title" value="<?=$titleArticle?>" required>
        
        <label class="d-block mt-4" for="content">contenue de l'article</label>
        <textarea class="form-control" id="content" name="content" rows="30" cols="80" required><?=$contentArticle?></textarea>
        <input class=" w-100 button d-block mt-2" type="submit" value="modifier l'article">
    </form>
</div>

<?php
$content = ob_get_clean();
require("base.php");
?>