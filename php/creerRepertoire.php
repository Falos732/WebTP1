<?php 
    $nomRepertoire = $_POST["repertoire-nom"];
    header("Location: https://ouellet.h25.techinfo420.ca/html/repos.php?reposNom=$nomRepertoire");

    exit;
?>