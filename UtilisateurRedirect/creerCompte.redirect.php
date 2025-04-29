<?php
    include_once __DIR__.'/../donnees/bdcodehub.include.php';
    require_once __DIR__."/../controller/SessionFinale.controller.php";
    try {
        $email = $_POST['inscription-email'];
        $mdp = $_POST['inscription-mdp'];
        $mdp = password_hash($mdp,PASSWORD_DEFAULT);
        $pseudo = $_POST['inscription-pseudo'];
        insertUtilisateur($pseudo,$email,$mdp);
        $session = new SessionFinale();
        session_start();
        $session->setSession($courriel, $_SERVER['REMOTE_ADDR']);
        header('Location: ../html/tableauDeBord.php');
    } catch (Exception $e) {
        error_log("Exception pdo: ".$e->getMessage());
    }
?>