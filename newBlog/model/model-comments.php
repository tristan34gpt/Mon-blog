<?php
require_once('model-database.php');

// // function qui recupere le contenue du commentaire avec id de larticle en question 
function contentComments($bdd){
    // Vérification de l'envoi du formulaire
    if(isset($_SESSION['idArticle'])){ 
        $articleId = $_SESSION['idArticle'];

        // Création de la requête
        $requete = $bdd->prepare('SELECT comment.content,comment.date, user.first_name, user.last_name
                                 FROM comment
                                 INNER JOIN article
                                 ON article.id = comment.id_article
                                 INNER JOIN  user
                                 ON user.id = comment.id_user

                                 WHERE comment.id_article = ?');

        $requete->execute([$articleId]);

        $contents = array(); // Utilisez un tableau pour stocker plusieurs commentaires

        // Boucle pour récupérer les contenus des commentaires
        while($content = $requete->fetch()){
            $contents[] = $content;
        }

        return $contents; // Retourne le tableau de contenus des commentaires
    }
}

// function qui insert le commentaire dans la base de donné

function insertComments($bdd, $content, $articleId, $idUser){
    $requete = $bdd->prepare("INSERT INTO comment(content, id_article, id_user) VALUES(?,?,?)");
    $requete->execute([$content, $articleId, $idUser]); 
    header('Location: index.php?page=sendComments');
    exit();
}