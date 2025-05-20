<?php
require_once __DIR__.'/../../.config/config.bd.include.php';

function selectUtilisateurBycourriel(string $courriel)
{
    try {
        $maConnexionPDO = getConnexionBd(false);
        $pdoRequete = $maConnexionPDO->prepare("select * from Utilisateurs where email=:courriel");

        $pdoRequete->bindParam(":courriel", $courriel, PDO::PARAM_STR);
    
        $pdoRequete->execute();

        return $pdoRequete->fetch(PDO::FETCH_OBJ);

    } 
    catch (Exception $e) {
        error_log("Exception pdo: ".$e->getMessage());
    }

}

function selectUtilisateurTout()
{
    try {

        $maConnexionPDO = getConnexionBd(false);
        $pdoRequete = $maConnexionPDO->prepare("select * from Utilisateurs");
    
        $pdoRequete->execute();

        return $pdoRequete->fetchAll(PDO::FETCH_OBJ);
    
        

    } catch (Exception $e) {
        error_log("Exception pdo: ".$e->getMessage());
    }
}

function insertUtilisateur(string $nom,string $courriel,string $mdp)
{
    try {

        $maConnexionPDO = getConnexionBd(true);
        $pdoRequete = $maConnexionPDO->prepare("INSERT INTO `Utilisateurs` (`nom`, `email`, `mdp`) VALUES (:nom, :courriel, :mdp)");

        // Lier les paramètres avec les valeurs
        $pdoRequete->bindParam(':nom', $nom, PDO::PARAM_STR);
        $pdoRequete->bindParam(':courriel', $courriel, PDO::PARAM_STR);
        $pdoRequete->bindParam(':mdp', $mdp, PDO::PARAM_STR);
        $pdoRequete->execute();        
        file_put_contents(__DIR__ . '/../../logs/insertion-bd.log', "[".date('Y-m-d H:i:s')."] Création d'un nouvel utilisateur dans la base de données : $courriel depuis ".$_SERVER['REMOTE_ADDR']. PHP_EOL, FILE_APPEND);
        return (int)$maConnexionPDO->lastInsertId();  
    } catch (Exception $e) {
        error_log("Exception pdo: ".$e->getMessage());
    }
}

function selectReposByID($ID)
{
    try {
        $maConnexionPDO = getConnexionBd(false);
        $pdoRequete = $maConnexionPDO->prepare("SELECT * FROM Repos WHERE ID = :ID");
        $pdoRequete->bindParam(":ID", $ID, PDO::PARAM_INT);
        $pdoRequete->execute();
        return $pdoRequete->fetch(PDO::FETCH_OBJ);
    } catch (Exception $e) {
        error_log("Exception pdo: " . $e->getMessage());
    }
}

function selectReposByUtilisateur($ID)
{
    try {

        $maConnexionPDO = getConnexionBd(false);
        $pdoRequete = $maConnexionPDO->prepare("SELECT * FROM Repos WHERE ProprietaireID = :ID;");
        $pdoRequete->bindParam(":ID", $ID, PDO::PARAM_INT);
        $pdoRequete->execute();

        return $pdoRequete->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $e) {
        error_log("Exception pdo: ".$e->getMessage());
    }
}

function  selectReposTout()
{
    try {

        $maConnexionPDO = getConnexionBd(false);
        $pdoRequete = $maConnexionPDO->prepare("select * from Repos ORDER BY id DESC");
    
        $pdoRequete->execute();

        return $pdoRequete->fetchAll(PDO::FETCH_OBJ);

    } catch (Exception $e) {
        error_log("Exception pdo: ".$e->getMessage());
    }
}

function selectReposSuiviByUtilisateur($ID)
{
    try {

        $maConnexionPDO = getConnexionBd(false);
        $pdoRequete = $maConnexionPDO->prepare("SELECT R.* FROM ReposSuivi RS JOIN Repos R ON RS.ReposID = R.ID WHERE RS.UtilisateurID = :ID;");
        $pdoRequete->bindParam(":ID", $ID, PDO::PARAM_INT);
        $pdoRequete->execute();

        return $pdoRequete->fetchAll(PDO::FETCH_OBJ);
    } catch (Exception $e) {
        error_log("Exception pdo: ".$e->getMessage());
    }
}

function suivreRepos($utilisateurID, $reposID)
{
    try {
        $pdo = getConnexionBd(true);
        $stmt = $pdo->prepare("INSERT INTO ReposSuivi (UtilisateurID, ReposID) VALUES (:uID, :rID)");
        $stmt->bindParam(':uID', $utilisateurID, PDO::PARAM_INT);
        $stmt->bindParam(':rID', $reposID, PDO::PARAM_INT);
        $stmt->execute();
    } catch (Exception $e) {
        error_log("Exception pdo: " . $e->getMessage());
        return false;
    }
}

function arreterSuiviRepos(int $utilisateurID, int $reposID)
{
    try {
        $pdo = getConnexionBd(true);
        $stmt = $pdo->prepare("DELETE FROM ReposSuivi WHERE UtilisateurID = :uID AND ReposID = :rID");
        $stmt->bindParam(':uID', $utilisateurID, PDO::PARAM_INT);
        $stmt->bindParam(':rID', $reposID, PDO::PARAM_INT);
        $stmt->execute();
        file_put_contents(__DIR__ . '/../../logs/insertion-bd.log', "[".date('Y-m-d H:i:s')."] Table de suivi supprimer e la base de données : $utilisateurID suivait $reposID depuis ".$_SERVER['REMOTE_ADDR']. PHP_EOL, FILE_APPEND);
    } catch (Exception $e) {
        error_log("Exception pdo: " . $e->getMessage());
        return false;
    }
}


function supprimerReposByID($ID)
{
    try {

        $maConnexionPDO = getConnexionBd(true);
        $pdoRequete = $maConnexionPDO->prepare("DELETE FROM Repos WHERE ID = :ID;");
        $pdoRequete->bindParam(":ID", $ID, PDO::PARAM_INT);
        $pdoRequete->execute();
        file_put_contents(__DIR__ . '/../../logs/insertion-bd.log', "[".date('Y-m-d H:i:s')."] Répertoire $ID supprimer de la base de données par". $_SESSION["courriel"] ."depuis ".$_SERVER['REMOTE_ADDR']. PHP_EOL, FILE_APPEND);
    } catch (Exception $e) {
        error_log("Exception pdo: ".$e->getMessage());
    }
}

function creerRepos(string $nom,string $description)
{
    try {

        $maConnexionPDO = getConnexionBd(true);
        $pdoRequete = $maConnexionPDO->prepare("INSERT INTO `Repos` (`Nom`, `Description`, `ProprietaireID`) VALUES (:Nom, :Description, :ProprietaireID)");
        
        $pdoRequete->bindParam(':Nom', $nom, PDO::PARAM_STR);
        $pdoRequete->bindParam(':Description', $description, PDO::PARAM_STR); 
        $pdoRequete->bindParam(':ProprietaireID', $_SESSION["ID"], PDO::PARAM_INT); 
        $pdoRequete->execute();      
        file_put_contents(__DIR__ . '/../../logs/insertion-bd.log', "[".date('Y-m-d H:i:s')."] Création d'un nouveau répertoire dans la base de données par". $_SESSION["courriel"] ."depuis ".$_SERVER['REMOTE_ADDR']. PHP_EOL, FILE_APPEND);
        return (int)$maConnexionPDO->lastInsertId();  
        
    } catch (Exception $e) {
        error_log("Exception pdo: ".$e->getMessage());
    }
}

function selectReposProprietaireNom($ID)
{
    try {

        $maConnexionPDO = getConnexionBd(false);
        $pdoRequete = $maConnexionPDO->prepare("SELECT U.nom AS ProprietaireNom FROM Repos R JOIN Utilisateurs U ON R.ProprietaireID = U.ID WHERE R.ID = :ID;");
        $pdoRequete->bindParam(":ID", $ID, PDO::PARAM_INT);
        $pdoRequete->execute();

        return $pdoRequete->fetchColumn();
    } catch (Exception $e) {
        error_log("Exception pdo: ".$e->getMessage());
    }
}

function getConnexionBd(bool $ecrire)
{
    try 
    {
        $chaineConnexion = "mysql:dbname=".BDSCHEMA.";host=".BDSERVEUR;
        if(!$ecrire)
        {
            return new PDO($chaineConnexion,BDUTILISATEURLIRE,BDMDPLIRE);
        }
        else
        {
            return new PDO($chaineConnexion,BDUTILISATEURECRIRE,BDMDPECRIRE);
        }

    } catch (Exception $e) {
        error_log("Exception pdo: ".$e->getMessage());
    }

}