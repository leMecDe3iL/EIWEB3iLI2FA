<?php
session_start();
include '../includes/inc_connexionBase.php'; // Ajustez le chemin selon votre structure de dossiers

if (!isset($_SESSION["login"])) {
    echo json_encode([]);
    exit;
}

$login = $_SESSION['login'];

$query = $cnx->prepare("SELECT items.*, paniers.quantite FROM paniers JOIN items ON paniers.item_id = items.id WHERE paniers.login = ?");
$query->execute([$login]);

$cartItems = $query->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($cartItems);
