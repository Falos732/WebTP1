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
        <form class="creation-formulaire" method="post" action="../php/creerCompte.php">
            <p class="inscription-prompt">Email</p>
            <input type="email" name="inscription-email" class="inscription-input"/>
            <p class="inscription-prompt">Mot de passe</p>
            <input type="password" name="inscription-mdp" class="inscription-input"/>
            <p class="inscription-prompt">Pseudonyme</p>
            <input type="text" name="inscription-pseudo" class="inscription-input"/>
            <input type="submit" value="Continuer"  class="inscription-button"/>
        </form>
    </div>
</body>
</html>