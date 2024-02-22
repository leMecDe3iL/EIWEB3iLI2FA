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
require_once "includes/inc_headers.php";
include_once "includes/inc_connexionBase.php";
?>
<h2>F&eacute;licitations pour votre achat !</h2>
<p>&nbsp;</p>
<div style="text-align :center;"><img src="https://www.emploismecanicien.ca/img/blog/img/3-kuah4.png" alt="Description du poste de m&eacute;canicien automobile et salaire" width="384" height="256" /></div>
<p>&nbsp;</p>
<h2>Merci de votre confiance.</h2>
<h2><a href="pageProfil.php">Vous pouvez retournez a l'accueill</a></h2>
<?php
$login = $_SESSION['login'];

// Requête pour vider le panier de l'utilisateur
$query_clear_cart = $cnx->prepare("DELETE FROM paniers WHERE login = ?");
$query_clear_cart->execute([$login]); 
include_once 'includes/inc_footer.php' ?>
