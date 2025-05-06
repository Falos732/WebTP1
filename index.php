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
        <p class="connexion-prompt">Email</p>
        <input type="email" name="connexion-email" class="connexion-input"/>
        <p class="connexion-prompt">Mot de passe</p>
        <input type="password" name="connexion-mdp" class="connexion-input"/>
        <input type="submit" value="connexion"  class="connexion-button"/>
    </form>
    <div class="connexion-inscription">
        <p class="connexion-prompt">Vous n'avez pas de compte ?</p>
        <a href="/html/creationCompte.php" class="connexion-prompt">créer un compte</a>
    </div>
    <?php
        include_once __DIR__.'/donnees/bdcodehub.include.php';
        try {
            $user = selectUtilisateurByEmail("Admin@admin.com");
            if($user)
            {
                echo "<p>".$user->ID."</p>";
                echo "<p>".$user->nom."</p>";
                echo "<p>".$user->email."</p>";
                echo "<p>".$user->mdp."</p>";
            }
            
        } catch (Exception $e) {
            error_log("Exception pdo: ".$e->getMessage());
        }
    ?>
</body>
</html>