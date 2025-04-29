<?php
require_once __DIR__.'/config.bd.include.php';


/** Retourne le id et le nom d'un enregistrement selon le id */
function selectById(int $id)
{
    try {
    
        $maConnexionPDO = getConnexionBd(false);
        $pdoRequete = $maConnexionPDO->prepare("select * from Utilisateurs where id=:id");

        $pdoRequete->bindParam(":id",$id,PDO::PARAM_INT);
    
        $pdoRequete->execute();

        return $pdoRequete->fetch(PDO::FETCH_OBJ);

    } catch (Exception $e) {
        error_log("Exception pdo: ".$e->getMessage());
    }

}

function selectByEmail(string $email)
{
    try {
    
        $maConnexionPDO = getConnexionBd(false);
        $pdoRequete = $maConnexionPDO->prepare("select * from Utilisateurs where email=:email");

        $pdoRequete->bindParam(":email", $email, PDO::PARAM_STR);
    
        $pdoRequete->execute();

        return $pdoRequete->fetch(PDO::FETCH_OBJ);

    } 
    catch (Exception $e) {
        error_log("Exception pdo: ".$e->getMessage());
    }

}

function selectTout()
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

function insertUtilisateur(string $nom,string $email,string $mdp)
{
    try {

        $maConnexionPDO = getConnexionBd(true);
        $pdoRequete = $maConnexionPDO->prepare("INSERT INTO `Utilisateurs` (`nom`, `email`, `mdp`) VALUES (:nom, :email, :mdp)");

        // Lier les paramètres avec les valeurs
        $pdoRequete->bindParam(':nom', $nom, PDO::PARAM_STR);
        $pdoRequete->bindParam(':email', $email, PDO::PARAM_STR);
        $pdoRequete->bindParam(':mdp', $mdp, PDO::PARAM_STR);
        $pdoRequete->execute();        

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