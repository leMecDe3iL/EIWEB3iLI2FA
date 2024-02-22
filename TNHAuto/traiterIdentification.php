<?php
session_start();

// Récupération et nettoyage des données de connexion
$login = isset($_REQUEST['login']) ? htmlspecialchars($_REQUEST['login'], ENT_QUOTES, 'UTF-8') : '';
$pass = isset($_REQUEST['pass']) ? $_REQUEST['pass'] : ''; 

// Inclusion du fichier de connexion à la base de données
require_once("includes/inc_connexionBase.php");

if (empty($login) || empty($pass)) {
    header("Location: index.php?error=Champs requis manquants");
    exit();
}

$txtReq = "SELECT pass, droits FROM users WHERE login = ?";

$requete = $cnx->prepare($txtReq);
$requete->bindParam(1, $login, PDO::PARAM_STR);
$requete->execute();

$user = $requete->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($pass, $user['pass'])) {
    $_SESSION["login"] = $login;
    $_SESSION["droits"] = $user["droits"];

    if (str_contains($user["droits"], "admin")) {
        header('Location: admin/index.php');
        exit();
    } elseif (str_contains($user["droits"], "user")) {
        header('Location: pageProfil.php?nom=' . urlencode($login));
        exit();
    }
} else {
    header('Location: index.php?error=Identification incorrecte');
    exit();
}