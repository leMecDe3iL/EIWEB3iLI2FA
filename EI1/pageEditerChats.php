<?php
    require_once 'base/connexion.php';
    session_start();
    $txt = "select * from fa_chat";

    $req = $pdo->prepare($txt);
    $req->execute();
    $tabChats = $req->fetchAll();


    $txt = "select * from fa_competence";
    $req = $pdo->prepare($txt);
    $req->execute();
    $tabCompetences = $req->fetchAll();

  
    if(isset($_SESSION["role"])){
        if(!str_contains($_SESSION["role"], "admin")){
           header('Location: pageConnexion.php');
            //die("erreurs de droits");
            exit();
        }
    }
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin Chats.</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/chats.css" rel="stylesheet">
    <script src="js/jquery-3.6.3.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body class="container fondPageAdmin">
    <div class="contenuPage">
    <?php include_once "navBar.php"; ?>

    <h1>Edition chats</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Chats</th>
                <th>Commentaires</th>
                <th>Naissances</th>
                <th>Compétences</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($tabChats as $ligne){
                    echo "<tr>";
                    echo "<td id='nom_{$ligne["id"]}'>{$ligne["nom"]}</td>";
                    echo "<td id='comm_{$ligne["id"]}'>{$ligne["commentaire"]}</td>";
                    echo "<td id='dateN_{$ligne["id"]}'>{$ligne["dateNaissance"]}</td>";
                    echo "<td><button class='btn btn-outline-primary' onclick='ouvrirModale({$ligne["id"]})'>éditer</button></td>";    
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>

    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="titreModale">Modal title-</h5>
            <span id="idChat"></span>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div id="exergueModale"></div>
        <div id="contenuModale">
            <?php
                foreach($tabCompetences as $ligne){
                    echo "<input class='cbComp' id='cbComp_".$ligne["id"]."' type='checkbox' onclick='toggleCompetence({$ligne["id"]})'> {$ligne['libelle']}<br>";
                }
            ?>
        </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
        </div>
        </div>
    </div>
    </div>
    </div>
    
    <script>
        let modalComp = new bootstrap.Modal(document.getElementById('modal'), {
        keyboard: false
        })

        function ouvrirModale(idChat){
            $("#idChat").html(idChat);
            $("#titreModale").html("Chat "+$("#nom_"+idChat).html());
            $("#titreModale").append("<small> - Né le "+$("#dateN_"+idChat).html()+"</small><br>");
            $("#exergueModale").html("<strong>Signe distinctif :</strong> "+$("#comm_"+idChat).html()+"<br><br>");
            getCompetences(idChat);
        }

        function getCompetences(idChat){
            console.log("get competences pour "+idChat );
            $.get(
                "traitements/getCompetences.php",
                {
                    idChat : idChat
                },
                repGetCompetences
            );           
        }

        function repGetCompetences(donnees){
            console.log(donnees);
            
            // on remet à 0 toutes les check-boxes
            $(".cbComp").each((index, elem)=>{
                console.log("off");
                $(elem).prop('checked', false);
            });

            donnees.forEach(elem => {
                console.log(elem["id_competence"]);
                $("#cbComp_"+elem["id_competence"]).prop('checked', true);
            });
            modalComp.show();
        }


        function toggleCompetence(idComp) {
    // Récupérer l'identifiant du chat
    var idChat = $("#idChat").text();

    // Vérifier si la case à cocher est cochée
    var isChecked = $("#cbComp_" + idComp).is(":checked");

    // Envoyer une requête AJAX pour mettre à jour la compétence
    $.ajax({
        url: "traitements/miseAJourComp.php",
        method: 'GET',
        data: {
            idChat: idChat,
            idCompetence: idComp,
            valeur: isChecked ? 1 : 0 // 1 pour ajouter, 0 pour supprimer
        },
        success: function(response) {
            if (response == 1) {
                console.log("Mise à jour réussie");
            } else {
                console.log("Erreur lors de la mise à jour");
            }
        },
        error: function(xhr, status, error) {
            console.log("Erreur AJAX: " + error);
        }
    });
}


        function repToggleCompOK(reponse){
            console.log(reponse);
        }
    </script>

</body>
</html>