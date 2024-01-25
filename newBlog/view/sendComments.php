<?php
$title = "article";
ob_start()
?>

<h1 class="mt-4 p-3">Votre commentaire a été envoyé avec succès</h1>
<button class="button"><a href="index.php?page=accueil">Revenez sur la page d'accueil</a></button>

<?php
$content = ob_get_clean();
require('base.php');
?>