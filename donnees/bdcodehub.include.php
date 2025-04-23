<?php
require_once __DIR__.'/config.bd.include.php';


/** Retourne le id et le nom d'un enregistrement selon le id */
function selectById(int $id)
{
    try {
    
        $maConnexionPDO = getConnexionBd();
        $pdoRequete = $maConnexionPDO->prepare("select * from Utilisateurs where id=:id");

        $pdoRequete->bindParam(":id",$id,PDO::PARAM_INT);
    
        $pdoRequete->execute();

        return $pdoRequete->fetch(PDO::FETCH_OBJ);

    } catch (Exception $e) {
        error_log("Exception pdo: ".$e->getMessage());
    }

}

/** Retourne tous les enregistrements de la table fleurs */
function selectTout()
{
    try {

        $maConnexionPDO = getConnexionBd();
        $pdoRequete = $maConnexionPDO->prepare("select * from Utilisateurs");
    
        $pdoRequete->execute();

        return $pdoRequete->fetchAll(PDO::FETCH_OBJ);
    
        

    } catch (Exception $e) {
        error_log("Exception pdo: ".$e->getMessage());
    }
}


/** Retourne une connexion avec le driver Mariabd sur la bd. */
function getConnexionBd()
{
    try {
        $chaineConnexion = "mysql:dbname=".BDSCHEMA.";host=".BDSERVEUR;

        return new PDO($chaineConnexion,BDUTILISATEUR,BDMDP);

    } catch (Exception $e) {
        error_log("Exception pdo: ".$e->getMessage());
    }

}