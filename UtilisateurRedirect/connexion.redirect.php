<?php
    include_once __DIR__.'/../donnees/bdcodehub.include.php';
    require_once __DIR__."/../controller/SessionFinale.controller.php";
    require_once __DIR__."/gestionCompte.include.php";
    try {

    if (!isset($_POST['connexion-courriel']) || !isset($_POST['connexion-mdp'])) {
        header('Location: /index.php');
        exit;
    }

        $courriel = $_POST['connexion-courriel'];
        $mdp = $_POST['connexion-mdp'];
        $utilisateur = selectUtilisateurByCourriel($courriel);
        
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
