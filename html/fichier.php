<?php
    require_once __DIR__."/../controller/SessionFinale.controller.php";
    include_once __DIR__.'/../donnees/bdcodehub.include.php';
    
    $session = new SessionFinale();
    session_start();
    $session->validerSession();
    
    if (!isset($_GET['reposNom']) || !isset($_GET['reposID']) || !isset($_GET['fichierNom']) || !isset($_GET['reposDescription'])) {
        header('Location: /html/tableauDeBord.php');
        exit;
    }

    $reposNom = $_GET['reposNom'];
    $reposID = $_GET['reposID'];
    $fichierNom = $_GET['fichierNom'];
    $reposDescription = $_GET['reposDescription'];

    $infosRepos = selectReposByID($reposID);
    $estProprietaire = $infosRepos && $infosRepos->ProprietaireID == $_SESSION['ID'];
?>
<!-- 
 cette page devrait etre generer a partir d'une base de donner
        -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/script.js" defer></script>
    <title>CodeHub</title>
</head>
<body class="body-column">
    <ul class="fil-ariane">
        <li><a href="tableauDeBord.php">Tableau de bord</a></li>
        <li class='repos-nom-ariane'>
            <form method='GET' action='/html/repos.php' onclick='this.submit()' >
                <input type='hidden' name='reposNom' value="<?php echo $reposNom;?>">
                <input type='hidden' name='reposDescription' value='<?php echo $reposDescription;?>'>
                <input type='hidden' name='reposID' value="<?php echo $reposID;?>">
                    <?php echo "$reposNom";?>
            </form>
        </li>
        <li id="fichier-nom"><?php echo $fichierNom; ?></li>
    </ul>
    <div id="contenu-fichier">
        <div id="description-repos">
            <p>Auteur : Alexy</p>
            <?php
                echo"<p>$reposDescription</p>";
            ?>
        </div>
        

        <?php
            $pathFichier = "../../stockage_repos/Repos_" . $reposID."/".$fichierNom;
            $contenuFichier = file_get_contents($pathFichier);
            echo '<p class="texte">'.$contenuFichier.'</p>';   
        ?>
    </div>
    <?php
        echo '<form method="POST" action="/php/supprimerFichier.php" onsubmit="return confirm(\'Voulez-vous vraiment supprimer ce fichier ?\');" class="supprimer-form">';
        echo '<input type="hidden" name="reposID" value="' . $reposID . '">';
        echo '<input type="hidden" name="reposNom" value="' . $reposNom . '">';
        echo '<input type="hidden" name="fichierNom" value="' . $fichierNom . '">';
        echo '<button type="submit" class="supprimer-btn">Supprimer ce fichier</button>';
        echo '</form>';  
    ?>
</body>
</html>