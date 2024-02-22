<?php
    require_once("includes/inc_connexionBase.php");
    // Normalement : $cnx existe

    //$txtReq = "SELECT login, pass, droits 
      //          FROM users";
    // etudiant_matiere(login,id_matiere,bonus)

    if(!isset($_GET["valeur"])){
        die("pas de valeur donnée");
    }

    $valeur = $_GET["valeur"];
    $txtReq = "SELECT login, id_matiere, bonus 
                FROM etudiant_matiere
                WHERE bonus <= :val";
    
    $requete = $cnx->prepare($txtReq);
    $requete->bindParam(":val", $valeur);
    
    $requete->execute();

    $tabRes = $requete->fetchall(PDO::FETCH_ASSOC);

    //var_dump($tabRes);

    foreach($tabRes as $ligne){

    }
    //echo "<br>".$tabRes[1]["id_matiere"];

    // testPDO.php?valeur=-0.75
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Document</title>
</head>
<body class="container">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>Login</th>
                <th>Identifiant matière</th>
                <th>Bonus</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($tabRes as $ligne){
                    echo "<tr>";
                        echo "<td>".$ligne["login"]."</td>";
                        echo "<td>".$ligne["id_matiere"]."</td>";
                        echo "<td>".$ligne["bonus"]."</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>    
</body>
</html>