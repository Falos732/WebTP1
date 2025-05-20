<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['fichier'], $_POST['reposNom'], $_POST['reposID'])) {
    $reposNom = htmlspecialchars($_POST['reposNom']);
    $reposID = htmlspecialchars($_POST['reposID']);

    $dossierCible = __DIR__ . "/../../stockage_repos/Repos_" . $reposID;

    if (!is_dir($dossierCible)) {
        mkdir($dossierCible, 0777, true);
    }

    $nomFichier = basename($_FILES['fichier']['name']);
    $nomFichier = preg_replace('/[^a-zA-Z0-9_\.\-]/', '_', $nomFichier); // nettoyage
    $cheminFichier = $dossierCible . "/" . $nomFichier;

    if (move_uploaded_file($_FILES['fichier']['tmp_name'], $cheminFichier)) {
        http_response_code(200);
        echo json_encode([
            "success" => true,
            "message" => "Fichier uploadé avec succès.",
            "reposNom" => $reposNom,
            "reposID" => $reposID
        ]);
    } else {
        http_response_code(500);
        echo json_encode([
            "success" => false,
            "message" => "Erreur lors du téléchargement du fichier."
        ]);
    }
} else {
    http_response_code(400);
    echo json_encode([
        "success" => false,
        "message" => "Paramètres invalides ou fichier manquant."
    ]);
}
?>
