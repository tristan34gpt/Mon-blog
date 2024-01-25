<?php

require('model/model-users.php');
require('model/model-registration.php');
require('model/model-article.php');
require('model/model-profil.php');
require('model/model-conection.php');
require('model/model-articleModification.php');

// controller de la page d'aceuil 
function home(){
    global $bdd;
    $article = titleArticleHome($bdd);
    require('view/home-view.php');  
}

// controller de la page de l'article

function article(){
    global $bdd;
    $contentComments = contentComments($bdd);
    $article = titleArticle($bdd);
    $contentArticle = contentArticle($bdd);
    if(isset($_SESSION['connection'])){
        if(!empty($_POST["commentaire"])){
        commentsArticle();
        }else{ 
            require('view/article-view.php');
            }
    }else{
        require('view/article-view.php');
    }
}

// function qui gere la partie commentaire des article
function commentsArticle(){
global $bdd;
if(isset($_SESSION['connection'])){
    if(!empty($_POST["commentaire"])){
    $idUser = $_SESSION['id'];
    $content = $_POST["commentaire"];
    $articleId = $_SESSION['idArticle'];
    insertComments($bdd,$content,$articleId,$idUser);
    require('view/article-view.php');
        }
    }else{
        // contenue vide 
        echo "il y a un problème";
    }
}

function commentsSend(){
require("view/sendComments.php");
}


// controller de la page de connexion 
function conection(){
    global $bdd;
    $erreur = '';
    if(!empty($_POST['email']) && !empty($_POST["password"])){
        $email     = htmlspecialchars($_POST['email']);
        $password  = htmlspecialchars($_POST['password']);
        $password = "ab1".sha1($password."823")."12";


        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
            if (verifPassword($bdd,$email,$password)){
                if(verifPassword($bdd,$email,$password)){
                    //function création des session
                    $session = createSession($bdd,$email,$password);

                    $_SESSION['nom'] = $session['last_name'];
                    $_SESSION['prenom'] = $session['first_name'];
                    $_SESSION['id'] =  $session['id'];
                    $_SESSION['connection'] = true;
                    header("location: index.php?page=accueil");
                    exit();
                }else{
                 // email ne correspond pas avec password 
                 $erreur = "Impossible de vous authentifier";
                }
            }else{
                // email n'est pas enregistrer dans la base de donné 
                $erreur = "Impossible de vous authentifier";
            }
        }else{
            // syntaxe email mauvaise 
            $erreur = "Impossible de vous authetifier";
        }
    }
    require('view/conection-view.php');
}


// controller de la page d'inscription 
function registration(){
     // LOGIQUE METIER
     global $bdd;
     $erreur = '';
    // vérification que tout les inputs sont remplis
    if(!empty($_POST['name']) && !empty($_POST['prenom']) && !empty($_POST['email']) 
    && !empty($_POST['password']) && !empty($_POST['passwordTwoo'])){
        
        $lastName      = htmlspecialchars($_POST['name']);
        $firstName     = htmlspecialchars($_POST['prenom']);
        $email         = htmlspecialchars($_POST['email']);
        $password      = htmlspecialchars($_POST['password']);
        $passwordTwoo  = htmlspecialchars($_POST['passwordTwoo']);
    

        // vérification de la syntaxe de l'email
        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
            // vérification si l'utilisateur existe déjà
            if (isUserExist($email,$bdd)) {
                // vérification mots de passes identiques
                if($password == $passwordTwoo) {
                    // APPEL A NOS OUTILS
                    // Appel de la fonction pour enregistrer un utilisateur dans la base de données                    
                    $userId = registerUser( $firstName,$lastName,$email,$password,$bdd);

                    // création des sessions
                    $_SESSION['nom'] = $lastName;
                    $_SESSION['prenom'] = $firstName;
                    $_SESSION['id'] =  $userId;
                    $_SESSION['connection'] = true;

                    // redirection page d'acceuil 
                    header('location: index.php?page=accueil');
                    exit();
                } else {
                    $erreur = "Vos mots de passe ne correspondent pas";
                }
            } else {
                $erreur  = "Votre adresse email est déjà utilisée";
            }
        } else {
            $erreur = "Votre adresse email n'est pas valide";
        }
    }
    // RENDU DE LA VUE
    require('view/registration-view.php');
}


// controller de la page de profil
function profil(){
    global $bdd;
    $info ="";
    $id = $_SESSION['id'];
    if(admin($bdd,$id)){
        $_SESSION['admin'] = true;
        deconnect();
        if((!empty($_POST['title']) && !empty($_POST["content"]))){
            $content = htmlspecialchars($_POST["content"]);
            $title = htmlspecialchars($_POST["title"]);
            createArticle($bdd,$title,$id,$content);
            $info =   "Votre article vient d'être publié";
        }
        require('view/profil-view.php');
    }else{
        deconnect();
        require('view/profil-view.php');
    }
} 

//controller de la page pour modifier ou supprimer les articles 
function Articles(){
    global $bdd;
    $info = "";
    $articles = viewArticles($bdd);
    if(!empty($_POST['supprimer'])){
        $_SESSION['titleArticle'] = $_POST['title'];
        $_SESSION['idArticle'] = $_POST['id'];
        $_SESSION['content'] =  $_POST['content'];
        header("location: index.php?page=supression?d'article");
        exit();
    }else if(!empty($_POST['modifier'])){
        $_SESSION['titleArticle'] = $_POST['title'];
        $_SESSION['idArticle'] = $_POST['id'];
        $_SESSION['content'] =  $_POST['content'];
        header("location: index.php?page=modifiaction?d'article");
        exit();
    }
    require("view/articleModification-view.php");
}

//controller de la page pour modifier l'article
function modificationArticle(){
    global $bdd;
    $titleArticle = $_SESSION['titleArticle'];
    $contentArticle = $_SESSION['content']; 
    if(!empty($_POST['content']) && !empty($_POST['title'])){
        $title = $_POST['title'];
        $content = $_POST["content"];
        $id = $_SESSION['idArticle'];
        newArticle($bdd,$id,$title,$content);
    }
    require("view/modificationArticle-view.php");
    
}


//controller de la page pour supprimer l'article
function controllerRemoveArticle(){
    global $bdd;
    $titleArticle = $_SESSION['titleArticle'];
    $contentArticle = $_SESSION['content']; 
    if(!empty($_POST['remove'])){
        $id = $_SESSION['idArticle'];
        removeArticles($bdd,$id);
    }
    require("view/removeArticle-view.php");
}


	