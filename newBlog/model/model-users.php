<?php
require_once('model-database.php');

function titleArticleHome($bdd){
    // requête pour chercher le titre de l"article 
    $requet = $bdd -> query('SELECT id,title FROM article');
    $article = array();
    while($verifTitle = $requet -> fetch()){
        $article[] = $verifTitle;
    }
    return $article;  
}



