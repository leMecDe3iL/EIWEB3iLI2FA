<?php  
    session_start(); 

    if (isset($_SESSION["favoris"])){
        $favoris = $_SESSION["favoris"];
    }else{
        $favoris = [];
    }

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mes favoris.</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/chats.css" rel="stylesheet">
    <script src="js/jquery-3.6.3.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body class="container fondLosanges" >
    <div class="contenuPage">
        <?php include_once "navBar.php"; ?>
        <h1> Mes favoris </h1>
        <h4>Provisoire : affichage de $favoris avec var_dump</h4>
        <?php
            var_dump($favoris);
        ?>
    </div>
</body>
</html>
