<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/style.css">
        <title>Vérification 2FA</title>
    </head>
    <body class ="body-fixed-column">
        <h1 class="connexion-texte">Un code a été envoyé à votre adresse courriel.</h1>
        <form class="connexion" method="post" action="2FAVerification.redirect.php">
            <label class="connexion-prompt" for="code">Code de vérification :</label>
            <input type="text" class="connexion-input" name="code" id="code" required>
            <input type="submit" value="Vérifier" class="connexion-button">
        </form>
        
    </body>
</html>