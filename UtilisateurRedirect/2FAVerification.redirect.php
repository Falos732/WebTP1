<?php
session_start();

if (isset($_POST['code']) && isset($_SESSION['code'])) {
    if ($_POST['code'] == $_SESSION['code']) {
        $ID = $_SESSION['ID'];
        $courriel =$_SESSION['courriel'];
        require_once __DIR__ . "/../controller/SessionFinale.controller.php";
        session_destroy();
        $session = new SessionFinale();
        session_start(); 
        $session->setSession($courriel, $_SERVER['REMOTE_ADDR'], $ID);

        file_put_contents(__DIR__ . '/../logs/acces-reussis.log', "[".date('Y-m-d H:i:s')."] Connexion réussi pour $courriel depuis ".$_SERVER['REMOTE_ADDR']. PHP_EOL, FILE_APPEND);

        header('Location: ../html/tableauDeBord.php');
        exit();
    } else {

        file_put_contents(__DIR__ . '/../logs/acces-refuses.log', "[".date('Y-m-d H:i:s')."] Mauvais code 2FA pour $courriel depuis ".$_SERVER['REMOTE_ADDR']. PHP_EOL, FILE_APPEND);
        header('Location: ../UtilisateurRedirect/2FA.form.php');
        exit();
    }
} else {
    file_put_contents(__DIR__ . '/../logs/acces-refuses.log', "[".date('Y-m-d H:i:s')."] Acces non autorisé à la verification 2FA pour $courriel depuis ".$_SERVER['REMOTE_ADDR']. PHP_EOL, FILE_APPEND);
    header('Location: ../UtilisateurRedirect/2FA.form.php');
    exit();
}
?>