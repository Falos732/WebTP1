<?php
function supprimerDossier($pathDossier) {
    if (!is_dir($pathDossier)) {
        return false;
    }

    $items = scandir($pathDossier);
    foreach ($items as $item) {
        if ($item === '.' || $item === '..') {
            continue;
        }

        $path = $pathDossier . DIRECTORY_SEPARATOR . $item;

        if (is_dir($path)) {
            deleteFolder($path);
        } else {
            unlink($path);
        }
    }
    return rmdir($pathDossier);
}


require_once __DIR__."/../controller/SessionFinale.controller.php";
include_once __DIR__.'/../donnees/bdcodehub.include.php';

$session = new SessionFinale();
session_start();
$session->validerSession();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!isset($_POST['reposID']) || !isset($_POST['reposNom'])) {
        header('Location: /html/tableauDeBord.php');
        exit;
    }

    $reposID = $_POST['reposID'];
    $reposNom = $_POST['reposNom'];

    $cheminFichier = __DIR__ . "/../../stockage_repos/Repos_" . $reposID;

    if (file_exists($cheminFichier)) {
        supprimerReposByID($reposID);
        supprimerDossier($cheminFichier);
        header("Location: /html/tableauDeBord.php");
        exit();
    } else {
        echo "Repos introuvable.";
    }
} else {
    echo "Méthode non autorisée.";
}
?>
