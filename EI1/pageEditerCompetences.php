<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin Competences.</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/chats.css" rel="stylesheet">
    <script src="js/jquery-3.6.3.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body class="container fondPageAdmin">
    <div class="contenuPage">
        <?php include_once "navBar.php"; ?>
        <h1>Liste des compétences</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Libellé</th>
                    <th scope="col">Nombre de chats</th>
                </tr>
            </thead>
            <tbody>
                <?php require_once 'base/connexion.php';
                // Récupération des compétences et du nombre de chats pour chaque compétence
                $txtReq = "SELECT c.id, c.libelle, COUNT(cc.id_chat) AS nb_chats ";
                $txtReq .= "FROM fa_competence c ";
                $txtReq .= "LEFT JOIN fa_chat_competence cc ON c.id = cc.id_competence ";
                $txtReq .= "GROUP BY c.id, c.libelle";
                $requete = $pdo->prepare($txtReq);
                $requete->execute();
                $competences = $requete->fetchAll();

                // Affichage des compétences dans le tableau
                foreach ($competences as $competence) {
                    echo "<tr>";
                    echo "<td>{$competence['id']}</td>";
                    echo "<td>{$competence['libelle']}</td>";
                    echo "<td>{$competence['nb_chats']}</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>