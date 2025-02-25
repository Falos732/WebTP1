<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Chef Alexyo</h1>
    </header>
    <nav>
<a href="index.html">Accueil</a>
<a href="themes.html">Thèmes de recettes</a>
<a href="recettes.html">Les recettes de déjeuner</a>
<a href="recette.html">Crêpes</a>
    </nav>
    <main>
        <div class="flex-recette">
        <div class="texte-recette">
        <h1>Wrap beurre de peanut et banane</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus convallis id turpis ac vulputate. Cras viverra ultricies ornare. Phasellus dictum nisi vel ligula venenatis viverra ut et leo. Donec egestas ex eu euismod tempor. Donec tempus et elit eget posuere. Cras sit amet purus vitae enim pellentesque vulputate. Pellentesque vel posuere sem, sit amet bibendum nisl. Etiam quis sagittis libero. </p>
        </div>
        <img class="image-moyen" src="./images/wrap-beurre-arachides-bananes-miel.avif" alt="wrap beurre de peanut">
        </div>

        <div class="flex-recette">
            <div class="texte-recette">
            <h1>Grill cheese aux jalapenos rôtis</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus convallis id turpis ac vulputate. Cras viverra ultricies ornare. Phasellus dictum nisi vel ligula venenatis viverra ut et leo. Donec egestas ex eu euismod tempor. Donec tempus et elit eget posuere. Cras sit amet purus vitae enim pellentesque vulputate. Pellentesque vel posuere sem, sit amet bibendum nisl. Etiam quis sagittis libero. </p>
            </div>
            <img class="image-moyen" src="./images/grilled-cheese-jalapeno-roti-540x401.avif" alt="wrap beurre de peanut">
        </div>
        <?php
        for($i; $i<5; $i++)
        {
            echo'<div class="flex-recette">
            <div class="texte-recette">
            <h1>Grill cheese aux jalapenos rôtis</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus convallis id turpis ac vulputate. Cras viverra ultricies ornare. Phasellus dictum nisi vel ligula venenatis viverra ut et leo. Donec egestas ex eu euismod tempor. Donec tempus et elit eget posuere. Cras sit amet purus vitae enim pellentesque vulputate. Pellentesque vel posuere sem, sit amet bibendum nisl. Etiam quis sagittis libero. </p>
            </div>
            <img class="image-moyen" src="./images/grilled-cheese-jalapeno-roti-540x401.avif" alt="wrap beurre de peanut">
            </div>';
        }
        ?>

    </main>
    <footer>

    </footer>

</body>