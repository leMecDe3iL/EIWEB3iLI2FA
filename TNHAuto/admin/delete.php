
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
<?php
    require '../includes/inc_connexionBase.php';

function checkInput($data) 
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$id = null;
if(!empty($_GET['id'])) {
    $id = checkInput($_GET['id']);
}

// Récupérer les détails de l'élément si $id est défini
$item = null;
if ($id !== null) {
    // Préparer et exécuter la requête de suppression
    $statement = $cnx->prepare("DELETE FROM items WHERE id = ?");
    $result = $statement->execute([$id]);
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>TNH Auto</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link rel="icon" type="image/png" href="../images/logoTNH.png"/>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../css/style.css">
    </head>
    
    <body>
        
    <h1>L'élément a été supprimé avec succès.
    <a href="index.php">Retourner à la page principale</a></h1>
    </body>
</html>
