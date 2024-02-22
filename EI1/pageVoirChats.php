<?php
session_start();


/* 

    !!!!!!!!!! liste à puces !!!!!!!!!!!!!

        <ol>
                    <?php foreach ($tabComp as $competence) {?>
                        <li><?= $competence['libelle'] ?></li>
            <?php } ?>
        </ol>

    !!!!!!!!!! liste numérotée !!!!!!!!!

        <ul>
                    <?php foreach ($tabComp as $competence) {?>
                        <li><?= $competence['libelle'] ?></li>
            <?php } ?>
        </ul>

        */


// Initialize $_SESSION['favoris'] if not set

if (!isset($_SESSION['favoris'])) {
    $_SESSION['favoris'] = array();
}

require_once 'base/connexion.php';

$txt = "select * from fa_chat";

$req = $pdo->prepare($txt);
$req->execute();
$tabChats = $req->fetchAll();

$txt = "select id_competence, libelle ";
$txt .= "from fa_chat_competence inner join fa_competence on fa_chat_competence.id_competence = fa_competence.id ";
$txt .= "where id_chat = :idChat ";
$reqComp = $pdo->prepare($txt);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Voir chats.</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/chats.css" rel="stylesheet">
    <script src="js/jquery-3.6.3.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</head>

<body class="container fondLosanges">
    <div class='contenuPage'>
        <?php include_once "navBar.php"; ?>
        <h1 class="listeTitre"> Nous les entraînons, vous les adoptez ! </h1>
        <br><br>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
            foreach ($tabChats as $chat) {
                $reqComp->execute([":idChat" => $chat["id"]]);
                $tabComp = $reqComp->fetchAll();
            ?>
                <div class='col'>
                    <div class="card">

                        <div class="card-body">
                            <div class="card-identite">
                                <img class='picto' src="img/<?= $chat['image'] ?>">
                                <h3 class="card-title"><span class="card-title-lechat">Le chat</span><?= " " . $chat["nom"] ?></h3>

                                <!-- EXERCICE COMMENTAIRE POUR CHAQUE CHATS-->

                                <p class="card-text card-commentaire"><?= $chat["commentaire"] ?></p>


                            </div>
                            <div class="card-competences">
                                <p class="card-text"><br>

                                <!-- EXERCICE LISTER LES COMPETENCES -->

                                <Ul>
                                    <?php
                                    foreach ($tabComp as $comp) {
                                    ?>
                                        <li><small><?= $comp["libelle"] ?></small></li>
                                    <?php
                                    }
                                    ?>
                                </Ul>

                                
                                <br></p>
                            </div>
                            <div class='card-favori text-center'>

                        <!-- Exercice Favoris -->

                                <?php
                                $lienAjout = "traitements/miseAJourFavori.php?idChat=" . $chat['id'] . "&valeur=1";
                                $lienSup = "traitements/miseAJourFavori.php?idChat=" . $chat['id'] . "&valeur=0";
                                ?>
                                <?php if (!in_array($chat['id'], $_SESSION['favoris'])) { ?>
                                        <button id="btnAdd<?= $chat['id'] ?>" class="btn btn-outline-primary" onclick='ajouterFavori(<?= $chat["id"] ?>)'> + favori</button>
                                        <button id="btnSup_<?= $chat['id'] ?>" class="btn btn-outline-danger d-none" onclick='supprimerFavori(<?= $chat["id"] ?>)'> - favori</button>
                                    <?php } else { ?>
                                        <button id="btnAdd<?= $chat['id'] ?>" class="btn btn-outline-primary d-none" onclick='ajouterFavori(<?= $chat["id"] ?>)'> + favori</button>
                                        <button id="btnSup_<?= $chat['id'] ?>" class="btn btn-outline-danger" onclick='supprimerFavori(<?= $chat["id"] ?>)'> - favori</button>

                                <?php } ?>

                                <p class="card-text card-adoptable">
                                <?php
                                    // Vérification de la valeur de $chat['adoptable']
                                    if ($chat['adoptable'] == 1) {
                                        echo "Adoptable";
                                    }else{
                                        echo "non adoptable";
                                    }
                                ?> 
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <script>
        function ajouterFavori(idChat) {
            $.ajax({
                url: "traitements/miseAJourFavori.php?idChat=" + idChat + "&valeur=1",
                method: 'GET'
            }).done(() => {
                $("#btnAdd"+idChat).addClass("d-none");
                $("#btnSup_"+idChat).removeClass("d-none");
            })
            console.log("appel ajout");
        }

        function repAjouter(donnees) {
            console.log(donnees);
        }

        function supprimerFavori(idChat) {
            $.ajax({
                url: "traitements/miseAJourFavori.php?idChat=" + idChat + "&valeur=0",
                method: 'GET'
            }).done(() => {
                $("#btnAdd"+idChat).removeClass("d-none");
                $("#btnSup_"+idChat).addClass("d-none");
            })
            console.log("appel ajout");

        }
        function repSupprimer(donnees) {
            console.log(donnees);
        }
    </script>
</body>

</html>