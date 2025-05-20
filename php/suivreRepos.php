<?php
require_once __DIR__.'/../controller/SessionFinale.controller.php';
require_once __DIR__.'/../donnees/bdcodehub.include.php';

$session = new SessionFinale();
session_start();
$session->validerSession();

if (!isset($_POST['reposID']) || !isset($_POST['reposNom']) || !isset($_POST['reposDescription']) || !isset($_SESSION['ID'])) {
    header('Location: /html/tableauDeBord.php');
    exit;
}

$utilisateurID = $_SESSION['ID'];
$reposID = $_POST['reposID'];
$reposNom = $_POST['reposNom'];
$reposDescription = $_POST['reposDescription'];

suivreRepos($utilisateurID, $reposID);


$params = [
    'reposNom' => $reposNom,
    'reposDescription' => $reposDescription,
    'reposID' => $reposID,
];
header("Location: ../html/repos.php?" . http_build_query($params));

exit;
