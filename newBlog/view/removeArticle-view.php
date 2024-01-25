<?php
$title = "article";
ob_start();
?>
    <h1 class="mt-2 p-2"><?=$titleArticle?></h1>
    <p class="mt-2 p-4"><?=$contentArticle?></p>
    
<form class="p-3" method="post" action="">
    <label class="p-2" for="remove">Êtes-vous sûr de vouloir supprimer cet article ?</label>
    <input class=" w-100 button d-block mt-2" type="submit" name="remove" value="suprimer cette article">
</form>


<?php
$content = ob_get_clean();
require("base.php");
?>