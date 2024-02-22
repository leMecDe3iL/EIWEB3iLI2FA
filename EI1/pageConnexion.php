<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion.</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/chats.css" rel="stylesheet">
    <script src="js/jquery-3.6.3.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body class="container fondLosanges" >
    <div class='contenuPage'>
    <?php include_once "navBar.php"; ?>
    <h1> Merci de vous identifier </h1>

    <form method="POST" class="mx-auto col-5">
        <div class="mb-3">
            <label for="inputLogin" class="form-label">Login</label>
            <input type="text" class="form-control" id="inputLogin" name="login">
        </div>
        <div class="mb-3">
            <label for="inputPass" class="form-label">Pass (tous les mots de passe fournis : 123456)</label>
            <input type="password" class="form-control" id="inputPass" name="pass">
        </div>
        <button type="submit" class="btn btn-primary">OK</button>
    </form>
    <br><br>
</body>
</html>

<?php  
    require_once 'base/connexion.php';

    if(isset($_POST['login']) && isset($_POST['pass'])) {
        $login = $_POST['login'];
        $pass = $_POST['pass'];

        $txt = "select * from fa_user where login='".$login."'";

        $req = $pdo->prepare($txt);
        $req->execute();
        $user = $req->fetch();
        var_dump($user);

        if (password_verify($pass, $user['pass'])){
            session_destroy();
            session_start(); 
            $_SESSION['user'] = $user['login'];
            $_SESSION['role'] = $user['role'];

            if ($user['role'] == 'admin') {
                header("Location: pageEditerChats.php");
            }elseif ($user['role'] == 'inscrit') {
                header("Location: pageVoirChats.php");
            }
        }
    } 

?>
