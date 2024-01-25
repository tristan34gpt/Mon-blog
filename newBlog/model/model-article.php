<?php
require_once('model-database.php');
require_once('model-comments.php');

// function qui recupere le titre de mon article 
function titleArticle($bdd){
    if(isset($_POST['article_id'])) {
        $_SESSION['idArticle'] =  $_POST['article_id'];

        $requet = $bdd -> prepare("SELECT title FROM article WHERE id = ? ");
        $requet -> execute([$_SESSION['idArticle']]);

        while($titleArticle = $requet -> fetch()){
            $title = $titleArticle['title'];
        }
        return $title;
    }
}
// function qui recupere le contenue de mon article 
function contentArticle($bdd){
    if(isset($_POST['article_id'])) {
        $_SESSION['idArticle'] = $_POST['article_id'];
        $articleId = $_SESSION['idArticle'];

        $requet = $bdd -> prepare("SELECT content FROM article WHERE id = ? ");
        $requet -> execute([$articleId]);
        
        while($titleArticle = $requet -> fetch()){
            $content = $titleArticle['content'];
        }

        return $content;
    }
}

// fuction pour le contenue du commentaire
contentComments($bdd);
