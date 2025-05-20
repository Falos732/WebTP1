<?php
require_once __DIR__."/../controller/SessionFinale.controller.php";

$session = new SessionFinale();
session_start();
$session->validerSession();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!isset($_POST['reposID']) || !isset($_POST['fichierNom']) || !isset($_POST['reposNom'])) {
        header('Location: /html/tableauDeBord.php');
        exit;
    }

    $reposID = $_POST['reposID'];
    $fichierNom = $_POST['fichierNom'];
    $reposNom = $_POST['reposNom'];

    $cheminFichier = __DIR__ . "/../../stockage_repos/Repos_" . $reposID . "/" . $fichierNom;

    if (file_exists($cheminFichier)) {
        unlink($cheminFichier);
        header("Location: /html/repos.php?reposNom=" . urlencode($reposNom) . "&reposID=" . urlencode($reposID));
        exit();
    } else {
        echo "Fichier introuvable.";
    }
} else {
    echo "Méthode non autorisée.";
}
?>
