<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/script.js?n=1"></script>
    <title>CodeHub</title>
</head>
<body class ="body-fixed-column">
    <h1 class="connexion-texte">Connexion</h1>
    <form class="connexion" method="post" action="../UtilisateurRedirect/connexion.redirect.php">
        <p class="connexion-prompt">Courriel</p>
        <input type="email" name="connexion-courriel" class="connexion-input"/>
        <p class="connexion-prompt">Mot de passe</p>
        <input type="password" name="connexion-mdp" class="connexion-input"/>
        <input type="submit" value="connexion"  class="connexion-button"/>
    </form>
    <div class="connexion-inscription">
        <p class="connexion-prompt">Vous n'avez pas de compte ?</p>
        <a href="/html/creationCompte.php" class="connexion-prompt">créer un compte</a>
    </div>
</body>
</html>