<?php
// Initialiser la session
session_start();

// Détruire toutes les variables de session
$_SESSION = array();

// Détruire la session
session_destroy();

// Rediriger vers la page de connexion ou une autre page de votre choix
header("location: index.php");
exit;
?>