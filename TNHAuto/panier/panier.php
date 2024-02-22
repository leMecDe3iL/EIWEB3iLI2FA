<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <!-- Inclure ici vos feuilles de style CSS -->
    <style>
        .cart-item {
            border-bottom: 1px solid #ccc;
            padding: 10px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .cart-item img {
            width: 100px;
        }

        .item-details {
            flex-grow: 1;
            padding: 0 20px;
        }
    </style>
</head>
<body>
<?php
session_start();

include '../includes/inc_connexionBase.php'; // Ajustez le chemin selon votre structure de dossiers

$cartItems = []; // Initialisation de $cartItems comme un tableau vide

if (isset($_SESSION['login'])) {
    $login = $_SESSION['login'];

    $query = $cnx->prepare("SELECT items.*, paniers.quantite FROM paniers JOIN items ON paniers.item_id = items.id WHERE paniers.login = ?");
    $query->execute([$login]);

    $cartItems = $query->fetchAll(PDO::FETCH_ASSOC); // Stocke les résultats de la requête dans $cartItems
}
?>
<nav class="nav">
    <!-- Votre barre de navigation ici -->
</nav>

<div class="container">
    <h2>Votre panier</h2>
    <div id="cart-items">
        <?php foreach ($cartItems as $item): ?>
            <div class="cart-item">
                <img src="../images/<?= $item['image']; ?>.jpg" alt="<?= htmlspecialchars($item['name']); ?>">
                <div class="item-details">
                    <h4><?= htmlspecialchars($item['name']); ?></h4>
                    <p><?= htmlspecialchars($item['description']); ?></p>
                    <p>Quantité: <?= $item['quantite']; ?></p>
                    <p>Prix unitaire: <?= number_format($item['price'], 2, ',', ' '); ?> €</p>
                </div>
                <div>
                    <button onclick="updateCart(<?= $item['id']; ?>, this.nextElementSibling.value); reloadPage()">Mettre à jour</button>
                    <input type="number" value="<?= $item['quantite']; ?>" min="1">
                    <button onclick="removeFromCart(<?= $item['id']; ?>); reloadPage()">Supprimer</button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <button onclick="checkout()">Payer</button>
</div>

<script src="../js/cartActions.js"></script>
<script>
    // Fonction pour recharger la page
    function reloadPage() {
        location.reload();
    }

    // Fonction pour vider le panier et rediriger vers card.php
    function checkout() {
       
        window.location.href = "../card.php"; // Redirection vers card.php après paiement
        
    }
</script>

</body>
</html>