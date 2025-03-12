<?php
    $nomRepertoire = $_POST["repertoire-nom"];
    
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirection</title>
</head>
<body>
    <form id="redirectForm" action="https://ouellet.h25.techinfo420.ca/html/repos.php" method="POST">
        <input type="hidden" name="reposNom" value="<?php echo "$nomRepertoire"; ?>">
    </form>

    <script type="text/javascript">
        document.getElementById('redirectForm').submit();
    </script>
</body>
</html>
