<?php
    include_once __DIR__.'/../donnees/bdcodehub.include.php';
    require_once __DIR__."/../controller/SessionFinale.controller.php";
    
    $session = new SessionFinale();
    session_start();
    $session->validerSession();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/script.js?n=1"></script>
    <title>home</title>
</head>
<body class="body-fixed">
    <div id="repos">
        <div id="nouvelle-repos-div">
            <p>Vos repertoires</p>
            <Button onclick="window.location.href = 'nouveauRepos.php';"  class="creer-repos-button">Nouveau</Button>
        </div>
        <?php
        $repos = selectReposByUtilisateur($_SESSION['ID']);
        if ($repos)
        {
            foreach($repos as $r)
            {
                $nom = htmlspecialchars($r->Nom);
                $ID = htmlspecialchars($r->ID);
                $description = htmlspecialchars($r->Description);
                echo "<form method='GET' action='/html/repos.php' onclick='this.submit()' class='repos-nom'>";
                echo "<input type='hidden' name='reposNom' value='$nom'>";
                echo "<input type='hidden' name='reposDescription' value='$description'>";
                echo "<input type='hidden' name='reposID' value='$ID'>";
                echo "<p>$nom</p>";
                echo "</form>";
            }
        }
        ?>
    </div>
    <div id="communaute">
        <p id="communaute-texte">communauté</p>
        
        <?php
        $repos = selectReposTout();
        if ($repos)
        {
            foreach($repos as $r)
            {
                $ID = htmlspecialchars($r->ID);
                $nom = htmlspecialchars($r->Nom);
                $description = htmlspecialchars($r->Description);
                echo "<form method='GET' action='/html/repos.php' onclick='this.submit()' class='message'>";
                echo "<input type='hidden' name='reposNom' value='$nom'>";
                echo "<input type='hidden' name='reposDescription' value='$description'>";
                echo "<input type='hidden' name='reposID' value='$ID'>";
                echo "<h1 class='message-titre'>$nom</h1>";
                echo "<p class='message-texte'>$description</p>";
                echo "</form>";
            }
        }
        for($i=0; $i<10; $i++)
        {
            
            //nom serait le nom de la repos obtenu par la base de donner pour que la page repos.php sache quoi afficher
        }
        ?>
    </div>
    <div id="repos">
        <p>repertoires suivi</p>
        <?php
        $repos = selectReposSuiviByUtilisateur($_SESSION['ID']);
        if ($repos)
        {
            foreach($repos as $r)
            {
                $ID = htmlspecialchars($r->ID);
                $nom = htmlspecialchars($r->Nom);
                $description = htmlspecialchars($r->Description);
                echo "<form method='GET' action='/html/repos.php' onclick='this.submit()' class='repos-nom'>";
                echo "<input type='hidden' name='reposNom' value='$nom'>";
                echo "<input type='hidden' name='reposDescription' value='$description'>";
                echo "<input type='hidden' name='reposID' value='$ID'>";
                echo "<p>$nom</p>";
                echo "</form>";
                //nom serait le nom de la repos obtenu par la base de donner pour que la page repos.php sache quoi afficher
            }
        }
        ?>
    </div>
    
    <!-- communauté au millieu (annonce repos populaire)
        repos personnel a gauche (boutton) 
        repos suivi a gauche (dernier commit)
        (generer avec du php)
        -->
</body>
</html>