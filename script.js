function Connexion(){
    var email = document.getElementsByName('connexion-email')[0].value;
    var password = document.getElementsByName('connexion-mdp')[0].value;
    alert("Email: " + email + "\nMot de passe: " + password);
    window.location.href = "./tableauDeBord.php";
}

window.addEventListener('DOMContentLoaded', () => {
    const params = new URLSearchParams(window.location.search);
    if (window.location.pathname.endsWith('repos.php')) {
        const repoNom = params.get('nom');

        if (repoNom) {
            document.querySelector('#repos-nom').textContent = repoNom;
            document.querySelector('.repos-nom-ariane').textContent = repoNom;
        } 
    }
    if (window.location.pathname.endsWith('fichier.php')) {
        const fichierNom = params.get('nom');
        const repoNom = params.get('reposNom');

        if (fichierNom) {
            document.querySelector('#fichier-nom').textContent = fichierNom;
        } else {
            document.querySelector('#fichier-nom').textContent = "Aucun fichier sélectionné";
        }
        const repoElement = document.querySelector('.repos-nom-ariane');
            repoElement.textContent = repoNom;
            repoElement.href = `repos.php?nom=${encodeURIComponent(repoNom)}`; // Permet de cliquer pour revenir au repo
        
    }
});