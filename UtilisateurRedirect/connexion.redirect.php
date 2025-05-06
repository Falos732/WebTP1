<?php
    include_once __DIR__.'/../donnees/bdcodehub.include.php';
    require_once __DIR__."/../controller/SessionFinale.controller.php";
    require_once __DIR__."/gestionCompte.include.php";
    try {
        $courriel = $_POST['connexion-email'];
        $mdp = $_POST['connexion-mdp'];
        $utilisateur = selectUtilisateurByEmail($courriel);
        
        if($utilisateur && password_verify($mdp, $utilisateur->mdp))
        {
            generation2FA($courriel, $utilisateur->ID);
            exit();
        }
        else
        {
            header('Location: ../index.php');
            exit();
        }
    } catch (Exception $e) {
        error_log("Exception pdo: ".$e->getMessage());
    }
?>
