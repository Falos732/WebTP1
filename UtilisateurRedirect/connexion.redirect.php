<?php
    include_once __DIR__.'/../donnees/bdcodehub.include.php';
    require_once __DIR__."/../controller/SessionFinale.controller.php";
    try {
        $email = $_POST['connexion-email'];
        $mdp = $_POST['connexion-mdp'];
        $utilisateur = selectByEmail($email);
        
        if($utilisateur)
        {
            if(password_verify($mdp,$utilisateur->mdp))
            {
                $session = new SessionFinale();
                session_start();
                $session->setSession($utilisateur->email, $_SERVER['REMOTE_ADDR']);
                header('Location: ../html/tableauDeBord.php');
                exit();
            }
        }
        header('Location: ../index.php');
        exit();
    } catch (Exception $e) {
        error_log("Exception pdo: ".$e->getMessage());
    }
?>