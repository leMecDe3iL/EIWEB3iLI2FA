<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Chat </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link" aria-current="page" href="pageAccueil.php"> Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="pageVoirChats.php"> Chats</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="pageFavoris.php"> Mes favoris</a>
        </li>
        <li class="nav-item"> <a class="nav-link"><div class="vr"></div></a> </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-danger" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Admin
          </a>
          <ul  class="dropdown-menu" >
            <li>  <a class="dropdown-item" href="pageEditerChats.php"> Editer chats</a></li>
            <li>  <a class="dropdown-item" href="pageEditerInscrits.php"> Editer Inscrits</a></li>
            <li>  <a class="dropdown-item" href="pageEditerCompetences.php"> Editer compétences</a></li>
           </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle  text-primary" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Debug
          </a>
          <ul  class="dropdown-menu" >
            <li>  <a class="dropdown-item" href="pageVoirSession.php"> Voir session</a></li>
            <li>  <a class="dropdown-item" href="pageSimulerConnexion.php"> Simuler connexion</a></li>
           </ul>
        </li>
      </ul>
    </div>
    <div>
        <span class="align-middle"><?php if (isset($_SESSION['user'])) echo $_SESSION["user"]?>&nbsp;</span>
        <a href="traitements/deconnexion.php"><button class="btn btn-outline-success">Déconnexion</button></a>
        <a href="pageConnexion.php"><button class="btn btn-outline-success">Connexion</button></a>
      </div>
  </div>
</nav>
<hr>