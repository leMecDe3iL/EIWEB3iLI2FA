<?php
session_start();
if (!isset($_SESSION["droits"]) || !str_contains($_SESSION["droits"], "user")) {
    die("Accès refusé");
}

include '../includes/inc_connexionBase.php';

$itemId = $_POST['itemId'];
$quantity = $_POST['quantity'];
$login = $_SESSION['login']; // Assumant que le login de l'utilisateur est stocké dans $_SESSION['login']

$query = $cnx->prepare("SELECT * FROM paniers WHERE item_id = ? AND login = ?");
$query->execute([$itemId, $login]);

if ($query->fetch()) {
    $query = $cnx->prepare("UPDATE paniers SET quantite = quantite + ? WHERE item_id = ? AND login = ?");
    $query->execute([$quantity, $itemId, $login]);
} else {
    $query = $cnx->prepare("INSERT INTO paniers (login, item_id, quantite) VALUES (?, ?, ?)");
    $query->execute([$login, $itemId, $quantity]);
}

echo "Article ajouté/mis à jour dans le panier.";
