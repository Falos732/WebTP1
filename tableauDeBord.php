<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./tableauDeBord.css">
    <script src="./script.js?n=1"></script>
    <title>home</title>
</head>
<body>
    <div id="repos">
        <p>Vos repertoire</p>
        <?php
        for($i; $i<5; $i++)
        {
            echo"<a href='repos.php?nom=repos$i'>repos$i</a>";
            //nom serait le nom de la repos obtenu par la base de donner pour que la page repos.php sache quoi afficher
        }
        ?>
    </div>
    <div id="communaute">
        <p>communauté</p>
    </div>
    <div id="suivi">
        <p>repos suivi</p>
    </div>
    
    <!-- communauté au millieu (annonce repos populaire)
        repos personnel a gauche (boutton) 
        repos suivi a gauche (dernier commit)
        (generer avec du php)
        -->
</body>
</html>