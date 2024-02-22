<!DOCTYPE html>
<html lang="en">
    <head>
        <title>TNH Auto</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5/css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="css/nous.css">
        <link rel="icon" type="image/png" href="images/logoTNH.png"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    </head>
    <body>
    <nav class="nav">
    <div class="container">
            <div class="logo">
                <a href="index.php"><img src="images/logoTNH.png" alt="..." width="60" height="60"></a>
            </div>
            <div id="mainListDiv" class="main_list">
                <ul class="navlinks">
                    <li><a href="index.php">Recherche</a></li>
                    <li><a href="nous.php">Qui sommes-nous</a></li>
                   
                    <li><a href="panier.php"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
</svg></i></a></li>
<li><a href="deconnexion.php"><img width="30" height="50" fill="currentColor" src="images/deco.png" alt="Déconnexion"></a></li> <!-- Bouton de déconnexion -->                </ul>

                </ul>
            </div>
            <span class="navTrigger">
                <i></i>
                <i></i>
                <i></i>
            </span>
        </div>
    </nav>


    <div id ="nous">
        <h2>Qui sommes-nous ?</h2>
        <h3>L'entreprise</h3>
        <h4>L'histoire</h4>
        
        <p>Fondé en 2020 par Taha Lyoubi, Nabil Berrahmoune et Walid Khiar, TNH Auto n’a de cesse de démocratiser l’entretien automobile.</p>

        <p>L’objectif : faciliter l’accès à des produits et des informations qui contribuent à la réparabilité de chacun des véhicules.</p> 

        <p>TNH Auto devient ainsi, le premier pure player à proposer aux automobilistes des pièces détachées neuves et d’origine en ligne, fabriquées par les plus grands équipementiers. Le tout à un prix inférieur à ceux traditionnellement pratiqués par les constructeurs automobiles au sein de leurs réseaux.</p> 

        <p>Durant toutes ces années, nous nous sommes développés à l’international, en nous exportant notamment en Espagne, en Belgique, au Portugal et en Allemagne, avec des ambitions plus grandes que jamais.</p>

        <p>Référence de la vente en ligne de pièces auto, nous nous efforçons d’offrir à chacun le droit à l’auto-réparation, en proposant des services et des produits de qualité, adaptés à tous.<p>

        <h4>L'ADN de TNH Auto</h4>

        <p>Depuis sa création, TNH Auto permet de rendre la réparation accessible à tous, en offrant à chacun la possibilité d’ouvrir son capot.</p>

        <p>Notre ADN repose sur trois piliers : </p>

        <ul>
            <li>La <span style="font-weight: bold;">fiabilité</span>, parce que le meilleur moyen d’entretenir tout seul son véhicule est d’être bien accompagné. Chacun des auto-réparateurs doit pouvoir compter sur TNH Auto pour lui fournir la meilleure offre au meilleur prix, des produits neufs et d’origine et les meilleurs services.</li>

            <li>L’<span style="font-weight: bold;">entraide</span>, car c’est ensemble que l’on progresse. TNH Auto aide les automobilistes à avancer en partageant les connaissances de ses membres et en répondant à toutes les interrogations.</li>

            <li>La <span style="font-weight: bold;">passion</span>. Oui, en plus de faire des économies, réparer tout seul sa voiture c’est aussi prendre du plaisir. La passion, c’est ce qui relie TNH Auto aux automobilistes.</li>
        </ul>
    </div>



<!-- Jquery needed -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="/public/JavaScript/JavaScript.js"></script>

<!-- Function used to shrink nav bar removing paddings and adding black background -->
    <script>
        $(window).scroll(function() {
            if ($(document).scrollTop() > 50) {
                $('.nav').addClass('affix');
                console.log("OK");
            } else {
                $('.nav').removeClass('affix');
            }
        });
    </script>

<div class="footer-dark">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 item">
                        <h3>Services</h3>
                        <ul>
                        <li><a href="index.php">Recherche</a></li>
                            <li><a href="nous.php">Qui sommes-nous</a></li>
                            <li><a href="registration/register.php">Mon compte</a></li>
                            <li><a href="contact.php">Contact</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3 item">
                        <h3>Contact</h3>
                            <ul class="socials">
                                <li><a href="#"><i class="fa fa-facebook fa-2x"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram fa-2x"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter fa-2x"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube fa-2x"></i></a></li>
                            </ul>
                    </div>
                    <div class="col-md-6 item text">
                        <h3>TNH Auto</h3>
                        <p> Notre entreprise est spécialisée dans la vente de pièces automobiles neuves et d’origine en provenance d'équipementiers ou de grossistes automobiles. Créé en 2020 par trois jeunes entrepreneurs, cette entreprise arrive à concurrencer les autres entreprises présentes avant sur le marché.</p>
                    </div>
                    
                </div>
                <p class="copyright">TNH Auto © 2020</p>
            </div>
        </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    </body>
</html>