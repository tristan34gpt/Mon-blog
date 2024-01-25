<?php
require_once('model/model-database.php');

// fuction verification email existant ? 
function verifEmail($bdd,$email){
    $requet = $bdd -> prepare("SELECT COUNT(*) AS number FROM user WHERE email = ? ");
    $requet -> execute([$email]);
    // requete pour récupere id de l'utilisateur
    $user = $requet->fetch();
        while($verifEmail = $requet -> fetch()){
            if($verifEmail["number"] !== 1){
            return false;
        }else{
            return true;
        }
    }
}

// verification si email correspond avec mot de passe
function verifPassword($bdd,$email,$password){
    $requet = $bdd -> prepare("SELECT COUNT(*) AS number FROM user WHERE email = ? AND password = ?");
    $requet -> execute([$email, $password]);

    while($verifPassword = $requet -> fetch()){
        if($verifPassword["number"] !== 1){
            // authentification échouer 
            return false;
        }else{
         // authentification succes 
         return true; 

        }
    }
}


function createSession($bdd,$email,$password){

$requet = $bdd -> prepare("SELECT * FROM user WHERE email = ? AND password = ?");
$requet -> execute([$email,$password]);

    while($session = $requet -> fetch()){
        return $session;
    }

}