function Connexion(){
    var email = document.getElementsByName('connexion-email')[0].value;
    var password = document.getElementsByName('connexion-mdp')[0].value;
    alert("Email: " + email + "\nMot de passe: " + password);
    window.location.href = "/html/tableauDeBord.php";
}
