<?php
session_start();

require_once 'base/connexion.php';

// Requête pour sélectionner les logins depuis la table fa_user
$sql = "SELECT login, role FROM fa_user";
$result = $pdo->query($sql);

// Vérification des résultats de la requête
if ($result === false) {
    die("Erreur lors de l'exécution de la requête : " . $pdo->errorInfo()[2]);
}

// droits d'accès 
if(isset($_SESSION["role"])){
    if(!str_contains($_SESSION["role"], "admin")){
       header('Location: pageConnexion.php');
        //die("erreurs de droits");
        exit();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simu co.</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/chats.css" rel="stylesheet">

    <script src="js/jquery-3.6.3.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body class="container fondPageDebug">
    <div class="contenuPage">
        <?php include_once "navBar.php"; ?>
        <h1>Simuler connexion</h1>
        <strong>Entrez un login et un rôle pour simuler une connexion (informations stockées en session).</strong> <br>
        <em>(Vous serez ensuite redirigé vers la page de debug/affichage de la session, pour contrôle.)</em>
        <br><br>
        <form class="mx-auto col-5" action="traitements/connexionFictive.php" method="get">
            <div class="mb-3">
                <label for="selectLogin" class="form-label">Choisissez un login :</label>
                <select id="selectLogin" name="inputLogin" class="form-select">
                    <?php

                        // Création de la liste déroulante des logins

                        while($row = $result->fetch()) {
                            echo '<option value="' . $row["login"] . '">' . $row["login"] . ' - ' . $row["role"] . '</option>';
                        }
                        
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="selectRole" class="form-label">Rôle</label>
                <select id="selectRole" name="selectRole" class="form-select">
                    <option value="admin">Administrateur</option>
                    <option value="inscrit">Visiteur enregistré</option>
                </select>
            </div>
            <button class="btn btn-primary">OK</button>
        </form>
    </div>
</body>
</html>