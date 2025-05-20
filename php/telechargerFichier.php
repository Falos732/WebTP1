<?php

$reposID = basename($_GET['reposID']);
$fichierNom = $_GET['fichierNom'];

// Construire le chemin complet vers le fichier
$cheminFichier = "../../stockage_repos/Repos_" . $reposID . "/" . $fichierNom;

// Vérifier que le fichier existe
if (!file_exists($cheminFichier)) {
    http_response_code(404);
    echo "Fichier non trouvé.";
    exit;
}

header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . $fichierNom . '"');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($cheminFichier));

readfile($cheminFichier);
exit;
