<!DOCTYPE html>
<html>
<head>
    <!-- Inclusion des en-têtes généraux de la page -->
    <?php require_once "includes/inc_headers.php"; ?>
</head>
<body>

<!-- Barre de navigation -->
<nav class="nav">
    <div class="container">
        <div class="logo">
            <!-- Lien vers la page d'accueil -->
            <a href="index.php"><img src="images/logoTNH.png" alt="Logo" width="60" height="60"></a>
        </div>
        <div id="mainListDiv" class="main_list">
            <!-- Liens de navigation -->
            <ul class="navlinks">
                <li><a href="nous.php">Qui sommes-nous</a></li>
                <li><a href="register.php">Mon Compte</a></li>
            </ul>
        </div>
    </div>
</nav>

<?php
// Inclusion du fichier de connexion à la base de données
require_once "includes/inc_connexionBase.php";

// Vérification si le formulaire a été soumis
if (isset($_REQUEST['login'], $_REQUEST['pass'])){
    // Nettoyage et sécurisation des données entrées par l'utilisateur
    $login = htmlspecialchars($_REQUEST['login'], ENT_QUOTES, 'UTF-8');
    $passHash = password_hash($_REQUEST['pass'], PASSWORD_DEFAULT); // Hashage du mot de passe

    // Préparation de la requête SQL pour insérer les données de l'utilisateur
    $query = $cnx->prepare("INSERT INTO `users` (login, droits, pass) VALUES (:login, 'user', :passHash)");

    // Liaison des valeurs aux paramètres de la requête
    $query->bindParam(':login', $login, PDO::PARAM_STR);
    $query->bindParam(':passHash', $passHash, PDO::PARAM_STR);

    // Exécution de la requête
    $query->execute();

    // Affichage d'un message de succès avec échappement des données
    echo "<div class='success'>
            <h3>Vous êtes inscrit avec succès.</h3>
            <p>Cliquez ici pour vous <a href='index.php'>connecter</a>.</p>
          </div>";
} else {
    // Affichage du formulaire d'inscription si celui-ci n'a pas encore été soumis
?>
    <form class="box" action="" method="post">
        <h1 class="box-logo box-title"><a href="index.php">TNH Auto</a></h1>
        <h1 class="box-title">S'inscrire</h1>
        <input type="text" class="box-input" name="login" placeholder="Nom d'utilisateur" required />
        <input type="password" class="box-input" name="pass" placeholder="Mot de passe" required />
        <input type="submit" name="submit" value="S'inscrire" class="box-button" />
        <p class="box-register">Déjà inscrit? <a href="login.php">Connectez-vous ici</a>.</p>
    </form>
<?php
}
?>

<!-- Inclusion du pied de page -->
<?php include_once 'includes/inc_footer.php'; ?>

</body>
</html>