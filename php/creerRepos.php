<?php
    include_once __DIR__.'/../donnees/bdcodehub.include.php';
    require_once __DIR__."/../controller/SessionFinale.controller.php";
    
    $session = new SessionFinale();
    session_start();
    $session->validerSession();

    if (!isset($_POST['reposNom']) || !isset($_POST['reposDescription'])) {
        header('Location: /html/tableauDeBord.php');
        exit;
    }

    $reposNom = $_POST["reposNom"];
    $reposDescription = $_POST["reposDescription"];

    $ID = creerRepos($reposNom,$reposDescription);
    $pathRepos = "../../stockage_repos/Repos_" . $ID;
    mkdir($pathRepos);
    header("Location: ../html/repos.php?reposNom=$reposNom&&reposDescription=$reposDescription&&reposID=$ID");
?>
