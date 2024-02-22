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

<?php require_once "includes/inc_headers.php" ?>

    <div class="container mt-5 px-5">
        <div class="mb-4">
            <h2>Confirmer la commande et payer</h2> <span>veuillez effectuer le paiement</span>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card p-3">
                    <h6 class="text-uppercase">Paiement </h6>
                    <div class="inputbox mt-3"> <input type="text" name="name" class="form-control" required="required"> <span>Nom de la carte</span> </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="inputbox mt-3 mr-2"> <input type="text" name="name" class="form-control" required="required"> <i class="fa fa-credit-card"></i> <span>Numéro de carte</span> </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex flex-row">
                                <div class="inputbox mt-3 mr-2"> <input type="text" name="name" class="form-control" required="required"> <span>Expire</span> </div>
                                <div class="inputbox mt-3 mr-2"> <input type="text" name="name" class="form-control" required="required"> <span>CVV</span> </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 mb-4">
                        <h6 class="text-uppercase">Adresse</h6>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="inputbox mt-3 mr-2"> <input type="text" name="name" class="form-control" required="required"> <span>Adresse</span> </div>
                            </div>
                            <div class="col-md-6">
                                <div class="inputbox mt-3 mr-2"> <input type="text" name="name" class="form-control" required="required"> <span>Ville</span> </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="inputbox mt-3 mr-2"> <input type="text" name="name" class="form-control" required="required"> <span>Département</span> </div>
                            </div>
                            <div class="col-md-6">
                                <div class="inputbox mt-3 mr-2"> <input type="text" name="name" class="form-control" required="required"> <span>Code Postal</span> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 mb-4 d-flex justify-content-between"> <span></span> <a class="btn btn-primary btn-lg" href="finish.php" role="button">Payer</a> </div>
            </div>
            <div class="col-md-4">
                <img src="images/card.png" alt="..." width="160" height="100">
            </div>
        </div>
    </div>

    <?php include_once 'includes/inc_footer.php' ?>
