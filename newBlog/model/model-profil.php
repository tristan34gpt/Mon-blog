<?php
require_once("model/model-database.php");

// function qui verifie si l'utilisateur est un administrateur
function admin($bdd,$id){

    $requet = $bdd -> prepare("SELECT id_admin  FROM user WHERE id = ?");
    $requet -> execute([$id]);

    while($searchId = $requet -> fetch()){
        if($searchId["id_admin"] !== 1){
            return false;
        }else{
            return true;
        }
    }
}

function createArticle($bdd,$title,$id,$content){
    
    $requet = $bdd -> prepare("INSERT INTO article(id_user, content, title) VALUE(?,?,?)");
    $requet -> execute([$id, $content, $title]);
}

function deconnect(){
    if(isset($_POST["deconect"])){
        session_destroy();
        header("location: index.php?page=accueil");
        exit();
    }
}