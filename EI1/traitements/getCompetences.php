<?php
    require_once '../base/connexion.php';
    $idChat = $_GET["idChat"];

    $txt = "select id_competence ";
    $txt.= "from fa_chat_competence ";
    $txt.= "where id_chat = :idChat ";
    $req = $pdo->prepare($txt);
    $req->execute([":idChat"=>$idChat]);       

    $tabRes = $req->fetchAll();

    header("content-type:application/json");
    echo json_encode($tabRes);
