<?php
    $reposNom = $_POST['reposNom'];
    $fichierNom = $_POST['fichierNom'];
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
            <form method='POST' action='/html/repos.php' onclick='this.submit()' >
                <input type='hidden' name='reposNom' value=<?php echo "$reposNom";?>>
                    <?php echo "$reposNom";?>
            </form>
        </li>
        <li id="fichier-nom"><?php echo $fichierNom; ?></li>
    </ul>
    <div id="contenu-fichier">
        <div id="entête-commit">
            <p>Alexy : </p>
            <p>salut</p>
            <p>il y a 15 minute</p>
        </div>
        <p class="texte">body{
    height: 100%;
    width: 100%;
    margin: 0; 
    display: flex;
    flex-direction: column;
}

.connexion-texte{
    position: relative;
    top: var(--offset);
    display: flex;
    justify-content: center; 
    padding: 10px; 
    margin: 0 auto; 
}
.connexion {
    position: relative;
    top: var(--offset);
    display: flex;
    flex-direction: column; 
    align-items: start;   
    padding: 20px; 
    border: 1px solid #ccc; 
    border-radius: 10px;
    background-color: #f9f9f9; 
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
    width: 250px;
    margin: 10px auto; 
}
.connexion-prompt{
    padding: 0px;
    margin: 0px;
    font-size: 18px;
}
.connexion-input{
    margin: 10px 0 20px 0;
    width: 98%;  
    border: 1px solid black;
    border-radius: 5px;
    height: 20px;  
}
.connexion-button{
    margin: -5px 0 0 0;
    width: 100%;  
    height: 40px;  
    font-size: 20px;
    background-color: green;
    color: #f9f9f9;
    cursor: pointer;
    text-align: center;
    border: none;
    border-radius: 12px;
}
.connexion-button:hover {
    background-color: #017707;
}

.connexion-inscription{
    position: relative;
    top: var(--offset);
    display: flex;
    flex-direction: column; 
    align-items: start;   
    justify-content: center;
    padding: 20px; 
    border: 1px solid #ccc; 
    border-radius: 10px;
    background-color: #f9f9f9; 
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
    width: 250px;
    margin: 10px auto; 
}</p>
        <!-- nom serait le nom de la repos obtenu par la base de donner pour que la page repos.php sache quoi afficher -->
</body>
</html>