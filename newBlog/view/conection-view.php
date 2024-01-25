<?php
$title = "connexion";
ob_start();
?>

<!-- mon formulaire de connexion !-->

<div class="container bg-dark text-white mt-4 p-3 text-center">
    <form method="post" action="?page=connexion">

        <label class="d-block" for="email">Adresse email</label>
        <input type="email" name="email" placeholder="entrez votre adresse email" required>

        <label class="d-block" for="password">Mot de passe</label>
        <input type="password" name="password" placeholder="entrez votre mot de passe" required>
        
        <input class="button w-100 d-block mt-4" type="submit" value="Connexion">
        <p>vous n'êtes pas inscrit ? 
            <a href="index.php?page=inscription">inscrivez-vous !</a>
        </p>
    <?php
            if($erreur !== null && !empty($erreur)) {
                echo'<div class="error">'.$erreur.'</div>';
            }
        ?>
    </form>
</div>

<?php
$content = ob_get_clean();
require('base.php');
?>