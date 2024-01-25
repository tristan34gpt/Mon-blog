<?php
require("model/model-database.php");
// function pour afficher les articles
function viewArticles($bdd){

    $requete = $bdd -> query("SELECT * FROM article");
    $articles = array();
    while($article = $requete -> fetch ()){
        $articles[] = $article;
    }
    return $articles;
}

// function pour supprimer les articles
function removeArticles($bdd,$id){

    $requete = $bdd -> prepare('DELETE FROM article WHERE id = ?');
    $requete ->execute([$id]);
    header("location: index.php?page=accueil");
    exit();

}

function newArticle($bdd,$id,$title,$content){
    $requet = $bdd ->prepare("UPDATE article set title = ?, content = ? WHERE id = ?");
    $requet -> execute([$title,$content,$id]);
    header("location: index.php?page=accueil");
    exit();
}