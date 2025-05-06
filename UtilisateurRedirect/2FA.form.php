<?php
        session_start();
        echo $_SESSION['code'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="post" action="2FAVerification.redirect.php">
            <p>Un code a été envoyé à votre adresse courriel.</p>
            <label for="code">Code de vérification :</label>
            <input type="text" name="code" id="code" required>
            <input type="submit" value="Vérifier">
        </form>
        
    </body>
</html>