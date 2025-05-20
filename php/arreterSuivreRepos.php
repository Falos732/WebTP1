<?php
require_once __DIR__.'/../controller/SessionFinale.controller.php';
require_once __DIR__.'/../donnees/bdcodehub.include.php';

$session = new SessionFinale();
session_start();
$session->validerSession();

if (!isset($_POST['reposID']) || !isset($_POST['reposNom']) || !isset($_POST['reposDescription'])) {
    // Une ou plusieurs variables manquent, on redirige ou affiche une erreur
    header('Location: /html/tableauDeBord.php');
    exit;
}

$utilisateurID = $_SESSION['ID'];
$reposID = $_POST['reposID'];
$reposNom = $_POST['reposNom'];
$reposDescription = $_POST['reposDescription'];

arreterSuiviRepos($utilisateurID, $reposID);

header("Location: ../html/repos.php?reposNom=$reposNom&&reposDescription=$reposDescription&&reposID=$reposID");

exit;
