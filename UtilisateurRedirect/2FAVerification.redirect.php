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

        header('Location: ../html/tableauDeBord.php');
        exit();
    } else {
        header('Location: ../UtilisateurRedirect/2FA.form.php');
        exit();
    }
} else {
    header('Location: ../UtilisateurRedirect/2FA.form.php');
    exit();
}
?>