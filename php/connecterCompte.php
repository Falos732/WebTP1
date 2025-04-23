<?php
    include_once __DIR__.'/../donnees/bdcodehub.include.php';
    try {
        $email = $_POST['connexion-email'];
        $mdp = $_POST['connexion-mdp'];
        $utilisateur = selectByEmail($email);
        
        if($utilisateur)
        {
            if(password_verify($mdp,$utilisateur->mdp))
            {
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