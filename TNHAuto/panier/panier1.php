<?php
session_start();
include '../includes/inc_connexionBase.php'; // Ajustez le chemin selon votre structure de dossiers

$cartItems = [];

if (isset($_SESSION['login'])) {
    $login = $_SESSION['login'];

    $query = $cnx->prepare("SELECT items.*, paniers.quantite FROM paniers JOIN items ON paniers.item_id = items.id WHERE paniers.login = ?");
    $query->execute([$login]);

    $cartItems = $query->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <!-- Inclure ici vos feuilles de style CSS -->
</head>
<body>

<nav class="nav">
    <!-- Votre barre de navigation ici -->
</nav>

<div class="container">
    <h2>Votre panier</h2>
    <div id="cart-items">
        <!-- Utilisation de var_dump() pour déboguer -->
        <?php var_dump($cartItems); ?>
    </div>
    <button onclick="checkout()">Payer</button>
</div>

<script src="js/cartActions.js"></script>
<script>
    // Charger les articles du panier dès que la page est chargée
    window.onload = function() {
        loadCart();
    };
</script>

</body>
</html>
