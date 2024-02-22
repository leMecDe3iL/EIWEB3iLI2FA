<?php
    // vérifier que le visiteur dispose du droit "chef"
    // sinon =>
    //      - redirection à l'accueil
    //      - interrompre tout traitement (die)
    session_start();
    if(isset($_SESSION["droits"])){
        if(!str_contains($_SESSION["droits"], "admin")){
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
    <!-- <meta charset="UTF-8"> -->
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <?php
        include("includes/inc_headers.php");
    ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Admin</title>
</head>
<body class="container">
    <h1>Gestion des bonus/malus</h1>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>id</th>
                <th>nom</th>
                <th>prenom</th>
                <th>voir</th>
                <th>edit</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>K</td>
                <td>Walid</td>
                <td>-2</td>
                <?php // voir https://icons.getbootstrap.com/ pour les icones (avec le css inclus via cdn ci-dessus) ?>
                <td><i class="bi-search text-primary"></i></td>
                <td><i class="bi-pencil text-danger"></i></td>
            </tr>
            <tr>
                <td>2</td>
                <td>R</td>
                <td>Ingrid</td>
                <td>0.01</td>
                <td><i class="bi-search text-primary"></i></td>
                <td><i class="bi-pencil text-danger"></i></td>
            </tr>
        </tbody>
    </table>
</body>
</html>