<?php
$title =  "les articles";
ob_start();
?>

<h1 class="text-center mt-4">Modifiez les articles</h1>

<?php foreach($articles as $article){?>
    <div class="bg-dark mt-4 p-2">
        <p class="text-title text-center p-3"><?= $article['title'] ?></p>
        <form method="post">
            <input type="submit" name="supprimer" value="suprimer">

            <input type="hidden" name="id" value="<?=$article['id']?>">
            <input type="hidden" name="title" value="<?= $article['title']?>">
            <input type="hidden" name="content" value="<?= $article['content'] ?>">

            <input type="submit" name="modifier" value="modifier">

            <?php if ($info !== null && !empty($info)) {
                echo '<div class="error">' . $info . '</div>';
                echo "<input type='submit' name='oui' value='oui'>";
                echo "<input type='submit' name='non' value='non'>";
            } ?>
        </form>
    </div> 
<?php 
} 
?>

<?php
$content = ob_get_clean();
require("base.php");
?>

