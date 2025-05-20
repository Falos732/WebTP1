<?php 
$erreur = $_GET['erreur'];
if (isset($erreur))
{
    if ($erreur == "courriel_utilise")
    {
        echo "<script>alert('Le courriel est déjà utilisé');</script>";
    }
    else if ($erreur == "champs_vides")
    {
        echo "<script>alert('Il y a des champs vides');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/script.js?n=1"></script>
    <title>Création de compte</title>
</head>
<body class="body-fixed-column">
    <div class="formulaire-creation">
        <h1 class="formulaire-creation-text">Création de compte</h1>
        <form class="creation-formulaire" method="post" action="../UtilisateurRedirect/creerCompte.redirect.php">
            <p class="inscription-prompt">Courriel</p>
            <input type="email" name="inscription-courriel" class="inscription-input" require/>
            <p class="inscription-prompt">Mot de passe</p>
            <input type="password" name="inscription-mdp" class="inscription-input" require/>
            <p class="inscription-prompt">Pseudonyme</p>
            <input type="text" name="inscription-pseudo" class="inscription-input" require/>
            <input type="submit" value="Continuer"  class="inscription-button"/>
        </form>
    </div>
</body>
</html>