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

<!DOCTYPE html>
<html lang="en">
    <head>

        <?php include_once 'includes/inc_headers.php' ?>
    </head>
    <body>

    <nav class="nav sticky-top">
        <div class="container">
            <div class="logo">
                <a href="pageProfil.php"><img src ="images/logoTNH.png" alt="..." width="60" height="60"></a>
            </div>
            <div id="mainListDiv" class="main_list">
                <ul class="navlinks">
                    <li><a href="#1">Recherche</a></li>
                    <li><a href="nous.php">Qui sommes-nous</a></li>
                    <li><a href="panier/panier.php"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
</svg></i></a></li>
<li><a href="deconnexion.php"><img width="30" height="50" fill="currentColor" src="images/deco.png" alt="Déconnexion"></a></li> <!-- Bouton de déconnexion -->                </ul>
            </div>
        </div>
    </nav>

    <div class="car-image">
    <img src="images/m4.jpg" alt="Voiture">
    </div>

    <section class="home">

    </section>
<div id="1"></div>
    <div class="tabParts">

        <div class="row">

            <div id="listnavcat" class="col-lg-4 col-md-6 col-sm-12 ">
                <div class="listnavsubcat">
                    <div>
                        <h2>
                            <a href="Pièces.php">Pièces moteur</a>
                        </h2>
                        <span title="Pièces moteur" class="test"></span>
                        <hr>
                        <div class="thumbnail">
                            <img src="images/moteurindex2.png" alt="...">
                        </div>
                    </div>
                </div>
            </div>

            <div id="listnavcat" class="col-lg-4 col-md-6 col-sm-12 ">
                <div class="listnavsubcat">
                    <div>
                        <h2>
                            <a href="Freinage.php">Freinage</a>
                        </h2>
                        <span title="Freinage" class="test"></span>
                        <hr>
                        <div class="thumbnail">
                            <img src="images/freindex2.png" alt="...">
                        </div>
                    </div>
                </div>
            </div>

            <div id="listnavcat" class="col-lg-4 col-md-6 col-sm-12">
                <div class="listnavsubcat">
                    <div>
                        <h2>
                            <a href="Carosserie.php">Carrosserie / Vitres / Peinture</a>
                        </h2>
                        <span title="Carrosserie / Vitres / Peinture" class="test"></span>
                        <hr>
                        <div class="thumbnail">
                            <img src="images/carro2.png" alt="...">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="images/258s.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="images/logoTNH.png" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    
<?php include_once 'includes/inc_footer.php'?>

    </body>
</html>