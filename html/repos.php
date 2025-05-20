<?php
    require_once __DIR__."/../controller/SessionFinale.controller.php";
    include __DIR__.'/../donnees/bdcodehub.include.php';
    
    $session = new SessionFinale();
    session_start();
    $session->validerSession();

    if (!isset($_GET['reposNom']) || !isset($_GET['reposID']) || !isset($_GET['reposDescription'])) {
        header('Location: /html/tableauDeBord.php');
        exit;
    }

    $reposNom = $_GET['reposNom'];
    $reposID = $_GET['reposID'];
    $reposDescription = $_GET['reposDescription'];

    $proprietaire = selectReposProprietaireNom($reposID);

    $infosRepos = selectReposByID($reposID);
    $estProprietaire = $infosRepos && $infosRepos->ProprietaireID == $_SESSION['ID'];
    $idReposSuivis = array_column(selectReposSuiviByUtilisateur($_SESSION['ID']), 'ID');
    $estSuivi = in_array($reposID, $idReposSuivis);
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
    <script src="/js/script.js?n=2" defer></script>
    <title>CodeHub</title>
</head>
<body class="body-column">
    <ul class="fil-ariane">
        <li><a href="tableauDeBord.php">Tableau de bord</a></li>
        <li class="repos-nom-ariane"><?php echo $reposNom;?></li>
    </ul>


    <div id="upload-modal">
      <div id="upload-form-div">
        <button id="fermer-modal-btn">X</button>
        <form id="upload-form">
          <input type="hidden" name="reposNom" value="<?php echo $reposNom; ?>">
          <input type="hidden" name="reposID" value="<?php echo $reposID; ?>">
          <input type="file" name="fichier" required>
          <button type="submit" id="upload-btn">Envoyer</button>
          <span id="upload-loading">⏳ Upload en cours...</span>
        </form>
      </div>
    </div>
    <div id="contenant-repos">
        <h1 id="repos-nom"><?php echo $reposNom; ?></h1>
        <div id="contenant-fichier">
            <div id="description-repos">
                <p>Auteur : <?php echo $proprietaire?></p>
                <?php
                echo"<p>$reposDescription</p>";
                ?>
            </div>
            <?php 
                if ($estProprietaire)
                {
                    echo '<button id="ouvrir-upload-modal"class="fichier">Ajouter un nouveau ficher</button>';
                }
            ?>
            <?php
            $pathRepos = "../../stockage_repos/Repos_" . $reposID;
            if (file_exists($pathRepos)) 
            {
                $fichiers = array_diff(scandir($pathRepos), array('.', '..'));
                if (count($fichiers) > 0) {
                    foreach ($fichiers as $fichier) {
                        echo "<form method='GET' action='/html/fichier.php' onclick='this.submit()' class='fichier'>";
                        echo "<input type='hidden' name='fichierNom' value='$fichier'>";
                        echo "<input type='hidden' name='reposNom' value='$reposNom'>";
                        echo "<input type='hidden' name='reposDescription' value='$reposDescription'>";
                        echo "<input type='hidden' name='reposID' value='$reposID'>";
                        echo "<p>$fichier</p>";
                        echo "<button type='button' onclick=\"event.stopPropagation(); telechargerFichier('$reposID', '$fichier')\">Télécharger</button>";
                        echo "</form>";
                    }
                } else {
                    echo "Cette repos est vide.";
                }
            } else {
                echo "Le dossier $pathRepos n'existe pas.";
            }
            ?>
        </div>
    </div>
    <?php 
    if ($estProprietaire)
    {
        echo '<form method="POST" action="/php/supprimerRepos.php" onsubmit="return confirm(\'Voulez-vous vraiment supprimer cette repos ?\');" class="supprimer-form">';
        echo '<input type="hidden" name="reposID" value='.$reposID.'>';
        echo '<input type="hidden" name="reposNom" value='.$reposNom.'>';
        echo '<button type="submit" class="supprimer-btn">Supprimer cette repos</button>';
        echo '</form>';
    }
    else
    {
        if ($estSuivi)
        {
            echo '<form method="POST" action="/php/arreterSuivreRepos.php" class="suivre-form">';
            echo '<input type="hidden" name="reposID" value='.$reposID.'>';
            echo "<input type='hidden' name='reposDescription' value='$reposDescription'>";
            echo '<input type="hidden" name="reposNom" value='.$reposNom.'>';
            echo '<button type="submit" class="suivre-btn">Arrêter de suivre cette repos</button>';
            echo '</form>';
        }
        else
        {
            echo '<form method="POST" action="/php/suivreRepos.php" class="suivre-form">';
            echo '<input type="hidden" name="reposID" value='.$reposID.'>';
            echo "<input type='hidden' name='reposDescription' value='$reposDescription'>";
            echo '<input type="hidden" name="reposNom" value='.$reposNom.'>';
            echo '<button type="submit" class="suivre-btn">Suivre cette repos</button>';
            echo '</form>';
        }
    }

    ?>
</body>
</html>