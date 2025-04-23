<?php
    include_once __DIR__.'/../donnees/bdcodehub.include.php';
    try {
        $email = $_POST['inscription-email'];
        $mdp = $_POST['inscription-mdp'];
        $mdp = password_hash($mdp,PASSWORD_DEFAULT);
        $pseudo = $_POST['inscription-pseudo'];
        insertUtilisateur($pseudo,$email,$mdp);
    } catch (Exception $e) {
        error_log("Exception pdo: ".$e->getMessage());
    }
?>