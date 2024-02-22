<?php
session_start();
if (!isset($_SESSION["droits"]) || !str_contains($_SESSION["droits"], "user")) {
    die("Accès refusé");
}

include '../includes/inc_connexionBase.php';

$itemId = $_POST['itemId'];
$quantity = $_POST['quantity'];
$login = $_SESSION['login']; // Utiliser $_SESSION['login'] pour identifier l'utilisateur

// Mise à jour de la quantité de l'article dans le panier
$query = $cnx->prepare("UPDATE paniers SET quantite = ? WHERE item_id = ? AND login = ?");
$query->execute([$quantity, $itemId, $login]);

echo "Quantité mise à jour.";
