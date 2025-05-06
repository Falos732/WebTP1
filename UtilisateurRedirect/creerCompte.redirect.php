<?php
    include_once __DIR__.'/../donnees/bdcodehub.include.php';
    require_once __DIR__."/../controller/SessionFinale.controller.php";
    require_once __DIR__."/gestionCompte.include.php";
    try {
        $courriel = $_POST['inscription-email'];
        $mdp = password_hash($_POST['inscription-mdp'],PASSWORD_DEFAULT);
        $pseudo = $_POST['inscription-pseudo'];
        insertUtilisateur($pseudo,$courriel,$mdp);
        generation2FA($courriel);
    } catch (Exception $e) {
        error_log("Exception pdo: ".$e->getMessage());
    }
?>