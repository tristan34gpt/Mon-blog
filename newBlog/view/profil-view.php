<?php
$title = "mon Profil";
ob_start();
// verification administrateur
if(isset($_SESSION['admin']) && $_SESSION["admin"]){
?>
<h1 class="text-center mt-4">Écrivez votre article</h1>
<form  method="post" action="?page=profil">
    <input class=" w-100 button p-2 mx-2" type="submit" name="deconect" value="déconexion">
</form>

<div class="text-center">
    <form method="post" action="?page=profil">
        <label class="d-block" for="title">Titre de l'article</label>
        <input type="text" name="title" required>

        <label class="d-block" for="content">Contenu de l'article</label>
        <textarea id="content" name="content" rows="4" cols="50" required></textarea>
        <input class=" w-100 button d-block mt-2" type="submit" value="Envoyer">
        <?php if($info !== null && !empty($info)) {
                    echo'<div class="error">'.$info.'</div>';
                }?>
    </form>
</div>
<?php
// view pas administrateur
}else{
?>
<h4 class="text-center mt-4">nom : <?= $_SESSION['nom']?></h4>
<h4 class="text-center mt-2">prénom : <?= $_SESSION['prenom']?></h4>
<form method="post" action="?page=profil">
    <input class="button w-100" type="submit" value="Déconnexion" name="deconect">
</form>
<?php
}
$content = ob_get_clean();
require('base.php');
?>