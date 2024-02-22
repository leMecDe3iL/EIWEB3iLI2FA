<?php
    session_start();
    require_once '../base/connexion.php';

    $idChat = $_GET["idChat"];
    $valeur = $_GET["valeur"]; // si 1 : demande d'ajout, sinon : demande de retrait

    // Ajout ou retrait d'un chat dans les favoris stockés en session
    if (isset($_SESSION["favoris"])){
        $favoris = $_SESSION["favoris"];
    }else{
        $favoris = [];
    }
    
    if ($valeur==1){
        if (!in_array($idChat, $favoris)){
            $favoris[] = $idChat; 
        }
    } else {
        if (in_array($idChat, $favoris)){
            $index = array_search($idChat, $favoris);
            array_splice($favoris, $index, 1);
        }
    }
    $_SESSION["favoris"]=$favoris;
    
    echo $idChat; // on retourne l'id du chat, pour pouvoir mettre à jour la bonne carte 


