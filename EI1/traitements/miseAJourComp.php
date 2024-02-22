<?php
    require_once '../base/connexion.php';
    $idChat = $_GET["idChat"];
    $idComp = $_GET["idCompetence"];
    $valeur = $_GET["valeur"];

    if ($valeur==1){
        $txt = "insert ";
        $txt.= "into fa_chat_competence (id_chat, id_competence)  ";
        $txt.= "values (:idChat,:idComp) ";
        $req = $pdo->prepare($txt);
        $req->execute([":idChat"=>$idChat, ":idComp"=>$idComp ]);       
        echo 1;
    } else {
        echo -1;
    }

