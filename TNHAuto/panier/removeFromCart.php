<?php
session_start();
if (!isset($_SESSION["droits"]) || !str_contains($_SESSION["droits"], "user")) {
    die("Accès refusé");
}

include '../includes/inc_connexionBase.php';

$itemId = $_POST['itemId'];
$login = $_SESSION['login']; // Utiliser $_SESSION['login'] pour identifier l'utilisateur

// Suppression de l'article du panier
$query = $cnx->prepare("DELETE FROM paniers WHERE item_id = ? AND login = ?");
$query->execute([$itemId, $login]);

echo "Article supprimé du panier.";
