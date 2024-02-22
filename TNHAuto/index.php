<!DOCTYPE html>
<html>
<head>

<?php require_once "includes/inc_headers.php" ?>

</head>
<body>
<nav class="nav">
    <div class="container">
            <div class="logo">
                <a href="index.php"><img src="images/logoTNH.png" alt="..." width="60" height="60"></a>
            </div>
            <div id="mainListDiv" class="main_list">
                <ul class="navlinks">
                    <li><a href="nous.php">Qui sommes-nous</a></li>
                    <li><a href="register.php">Mon Compte</a></li>

                </ul>
            </div>
        </div>
    </nav>

<form class="box" action="traiterIdentification.php" method="post">
    <h1 class="box-title">Connexion</h1>
    <input type="text" class="box-input" name="login" placeholder="Nom d'utilisateur">
    <input type="password" class="box-input" name="pass" placeholder="Mot de passe">
    <input type="submit" value="Connexion " name="submit" class="box-button">
    <p class="box-register">Vous êtes nouveau ici? <a href="register.php">S'inscrire</a></p>
</form>

<?php include_once 'includes/inc_footer.php' ?>

</body>
</html>