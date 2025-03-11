<!-- 
 cette page devrait etre generer a partir d'une base de donner
        -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./gestionCompte.css">
    <script src="./script.js?n=1" defer></script>
    <title>CodeHub</title>
</head>
<body>
    <ul class="fil-ariane">
        <li><a href="tableauDeBord.php">Tableau de bord</a></li>
        <li class="repos-nom-ariane" href="#">repos</li>
    </ul>
    <h1 id="repos-nom"></h1>
        <!-- repos-nom est definie dans le js a partir du lien venant de tableau de bord -->
    <div id="contenant-fichier">
        <div id="entête-commit">
            <p>Alexy : </p>
            <p>salut</p>
            <p>il y a 15 minute</p>
        </div>
        <?php
        for($i; $i<20; $i++)
        {
            echo"<a class='fichier' href='fichier.php?nom=fichiertest$i&reposNom=" . urlencode($_GET['nom']) . "'>fichiertest$i</a>";
            //nom serait le nom du fichier obtenu par la base de donner pour que la page fichier.php sache quoi afficher
        }
        ?>
    </div>
</body>
</html>