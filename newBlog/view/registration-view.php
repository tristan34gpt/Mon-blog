
<?php
$title = "inscription";
ob_start()
?>

<!-- mon formulaire d'inscription !-->

<div class="container bg-dark text-white mt-4 p-3 text-center">
    <form method="post" action="?page=inscription">

        <label class="d-block" for="prenom">Prénom</label>
        <input type="text" name="prenom" placeholder="entrez votre Prénom" required>

        <label class="d-block" for="name">Nom</label>
        <input type="text" name="name" placeholder="entrez votre nom" required>

        <label class="d-block" for="email">Adresse email</label>
        <input type="email" name="email" placeholder="entrez votre adresse email" required>

        <label class="d-block" for="password">Mot de passe</label>
        <input type="password" name="password" placeholder="entrez votre mot de passe" required>

        <label class="d-block" for="passwordTwoo">Confirmer votre mot de passe</label>
        <input type="password" name="passwordTwoo" placeholder="confirmer votre mot de passe" required>

        <input class="d-block w-100 button mt-4" type="submit" value="S'inscrire">

        <p>Vous avez déjà un compte ? 
            <a href="?page=connexion">Connectez-vous !</a>
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
