<?php
require_once('model-database.php');


function isUserExist($email,$bdd){
    $req = $bdd->prepare('SELECT COUNT(*) AS numberEmail FROM user WHERE email = ?');
    $req->execute([$email]);
    while($emailVerification = $req->fetch()){
        if($emailVerification['numberEmail'] != 0){
            return false;
        }else{
            return true;
        }
    }
}

function registerUser( $firstName,$lastName,$email,$password,$bdd){
    //cryptage du mot de passe
    $password = "ab1".sha1($password."823")."12";
    // insertion de l'utilisateur dans la base de donées
    $requete = $bdd -> prepare('INSERT INTO user(first_name,last_name,email,password) VALUES(?,?,?,?)');
    $requete -> execute([ $firstName,$lastName,$email,$password]);
     
    // Récupération de l'identifiant de l'utilisateur nouvellement inscrit
     $userId = $bdd->lastInsertId();
    
     // Retourne l'identifiant de l'utilisateur
    return $userId;

}