<?php
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
            <Button onclick="window.location.href = 'creerRepos.html';"  class="creer-repos-button">Nouveau</Button>
        </div>
        <?php
        for($i=0; $i<5; $i++)
        {
            echo "<form method='POST' action='/html/repos.php' onclick='this.submit()' class='repos-nom'>";
            echo "<input type='hidden' name='reposNom' value='repos$i'>";
            echo "<p>repos$i</p>";
            echo "</form>";
            //nom serait le nom de la repos obtenu par la base de donner pour que la page repos.php sache quoi afficher
        }
        ?>
    </div>
    <div id="communaute">
        <p id="communaute-texte">communauté</p>
        
        <?php
        for($i=0; $i<10; $i++)
        {
            echo "<div class = 'message'>";
            echo "<h1 class='message-titre'>Test$i</h1>";
            echo "<p class='message-texte'>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat pulvinar erat et suscipit. In varius tortor vel pulvinar tincidunt. Donec ultrices at mi at iaculis. In tincidunt lacinia semper. In ac fringilla ligula. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse sagittis tellus ut ante facilisis accumsan. Mauris et risus quis dolor vulputate suscipit eget at est. Phasellus porta laoreet vulputate. Morbi sit amet aliquam erat.</p>";
            echo "</div>";
            //nom serait le nom de la repos obtenu par la base de donner pour que la page repos.php sache quoi afficher
        }
        ?>
    </div>
    <div id="repos">
        <p>repertoires suivi</p>
        <?php
        for($i=5; $i<10; $i++)
        {
            echo "<form method='POST' action='/html/repos.php' onclick='this.submit()' class='repos-nom'>";
            echo "<input type='hidden' name='reposNom' value='repos$i'>";
            echo "<p>repos$i</p>";
            echo "</form>";
            //nom serait le nom de la repos obtenu par la base de donner pour que la page repos.php sache quoi afficher
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