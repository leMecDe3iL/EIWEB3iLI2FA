<?php
    // vérifier que le visiteur dispose du droit "chef"
    // sinon =>
    //      - redirection à l'accueil
    //      - interrompre tout traitement (die)
    session_start();
    if(isset($_SESSION["droits"])){
        if(!str_contains($_SESSION["droits"], "user")){
            header('Location: index.php');
            die("erreurs de droits");
            //exit();
        }
    }
    else{
        die("pas de champ droits");
    }
?>
<?php
require 'includes/inc_connexionBase.php';

function checkInput($data) 
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$id = null;
if(!empty($_GET['id'])) {
    $id = checkInput($_GET['id']);
}

// Récupérer les détails de l'élément si $id est défini
$item = null;
if ($id !== null) {
    $statement = $cnx->prepare("SELECT items.id, items.name, items.description, items.price, items.image, categories.name AS category FROM items LEFT JOIN categories ON items.category = categories.id WHERE items.id = ?");
    $statement->execute(array($id));
    $item = $statement->fetch();
}

?>

<!DOCTYPE html>
<html>
<head>

<?php require_once "includes/inc_headers.php"; ?>
<style>
        body {
            background-color: #fff; /* Couleur de fond blanc */
        }
    </style>
</head>
<body>


<nav class="nav">
    <div class="container">
            <div class="logo">
                <a href="pageProfil.php"><img src="images/logoTNH.png" alt="..." width="60" height="60"></a>
            </div>
            <div id="mainListDiv" class="main_list">
                <ul class="navlinks">
                    <li><a href="nous.php">Qui sommes-nous</a></li>
                   
                    
                    <li><a href="panier/panier.php"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
</svg></i></a></li>
                    <li><a href="deconnexion.php"><img width="30" height="50" fill="currentColor" src="images/deco.png" alt="Déconnexion"></a></li>
                </ul>
            </div>
        </div>
    </nav>


<div class="interface">
    <div class="shop-items">
        <div class="container-fluid">
            <div class="row">
                
                <?php 
                // Récupérer tous les éléments de la catégorie 1
                $items = $cnx->query('SELECT * FROM items WHERE category = 3'); 
                foreach ($items as $item): 
                ?>
                
                <!-- Item -->
                <div class="item">
                    <!-- Image -->
                    <div class="imgPieces">
                        <!-- Lien vers les détails de l'élément -->
                        <a href="details.php?id=<?= $item['id']; ?>"><img src="images/<?= $item['image']; ?>.jpg" alt=""></a>
                    </div>
                    <!-- Détails de l'élément -->
                    <div class="item-dtls">
                        <!-- Titre -->
                        <h4><?= $item['name']; ?></h4>
                        <!-- Description -->
                        <p><?= $item['description']; ?></p>
                        <!-- Prix -->
                        <span class="price lblue"><?= number_format($item['price'], 2, ',', ' '); ?> €</span>
                    </div>
                    <!-- Bouton "Ajouter au panier" -->
                    <div class="ecom bg-lblue"> 
                        <button onclick="addToCart(<?= $item['id']; ?>, 1)" class="btn">Ajouter au panier</button>
                    </div>
                </div>
                
                <?php endforeach; ?>
                
            </div>
        </div>
    </div>
</div>                

<script src="js/cartActions.js"></script>
<?php include_once 'includes/inc_footer.php'; ?>

</body>
</html>
