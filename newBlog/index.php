<?php
session_start();

require('controller/controller.php');

if(isset($_GET['page'])){
    if($_GET["page"] == 'accueil'){
        home();
    }else if ($_GET["page"] == 'connexion'){
        conection();
    }else if ($_GET["page"] == 'inscription'){
        registration();
    }else if($_GET["page"] == 'article'){
        article();
    }else if($_GET["page"] == 'profil'){
        profil();
    }else if($_GET['page'] == 'sendComments'){
        commentsSend();
    }else if($_GET["page"] == "articles"){
        articles();
    }else if($_GET["page"] == "modifiaction?d'article"){
        modificationArticle();
    }else if($_GET["page"] == "supression?d'article"){
        controllerRemoveArticle();
    } 
}else{
    home();
    }
