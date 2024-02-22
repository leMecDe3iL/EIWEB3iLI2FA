<?php  session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Voir session.</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/chats.css" rel="stylesheet">
    <script src="js/jquery-3.6.3.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body class="container fondPageDebug">
    <div class="contenuPage">
        <?php include_once "navBar.php"; ?>
        <h1> Contenu de la session </h1>
        <?php var_dump($_SESSION); ?>
    </div>  
</body>
</html>
