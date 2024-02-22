<?php
    session_start();

    $_SESSION["login"] = $_GET["inputLogin"];
    $_SESSION["role"] = $_GET["selectRole"];


    header("location:../pageVoirSession.php");
