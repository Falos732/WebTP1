<?php
    include_once __DIR__.'/../donnees/bdcodehub.include.php';
    require_once __DIR__."/../controller/SessionFinale.controller.php";
    require_once __DIR__."/gestionCompte.include.php";
    try {
        $courriel = $_POST['inscription-courriel'];
        $mdp = password_hash($_POST['inscription-mdp'],PASSWORD_DEFAULT);
        $pseudo = $_POST['inscription-pseudo'];

        if ( !isset($_POST['inscription-courriel']) || empty(trim($_POST['inscription-courriel'])) || !isset($_POST['inscription-mdp']) || empty(trim($_POST['inscription-mdp'])) || !isset($_POST['inscription-pseudo']) || empty(trim($_POST['inscription-pseudo'])))   {
            header("Location: /html/creationCompte.php?erreur=champs_vides");
            exit;
        }

        $utilisateur = array_column(selectUtilisateurTout(), 'email');
        $exist= in_array($courriel, $utilisateur);
        if ($exist) {
            header("Location: /html/creationCompte.php?erreur=courriel_utilise");
            exit;
        }
        $ID = insertUtilisateur($pseudo,$courriel,$mdp);
        generation2FA($courriel,$ID);
    } catch (Exception $e) {
        error_log("Exception pdo: ".$e->getMessage());
    }
?>