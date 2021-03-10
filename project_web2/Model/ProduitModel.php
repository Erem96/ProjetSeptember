<?php

class produit
{
    protected $table; /*Pour réduire les risques de fuites de données, les noms, et mot de passes ne sortent pas de la DB*/
    public $refProduit;
    public $descriptionProduit;
    public $prixAchatParUnit;
    public $prixVenteParUnit;
    public $unit;
    public $illustrationUrl;
    public $dateEncodage;
    public $userCreator;


public static function getOne($refProduit)
{
    $bdd = new PDO('mysql:host=localhost;dbname=Projectfinal;charset=utf8', 'testuser', 'alexis123', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $query = $bdd->prepare("select * FROM produits WHERE refProduit LIKE '$refProduit'");
    $query->execute();
    return $query -> fetchAll();
}

public static function getAll()
{
    $bdd = new PDO('mysql:host=localhost;dbname=Projectfinal;charset=utf8', 'testuser', 'alexis123', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $query = $bdd->prepare("select nomProduit, prixAchatParUnit, prixVenteParUnit, unit, illustrationUrl, dateEncodage, 
    refStock, produits.refProduit, QTT FROM produits
    LEFT JOIN stocks
    ON stocks.refProduit = produits.refProduit;");
    $query->execute();
    return $query -> fetchAll();
}

public static function deleteProduit(string $ref)
{
        $bdd = new PDO('mysql:host=localhost;dbname=Projectfinal;charset=utf8', 'testuser', 'alexis123', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $query = $bdd->prepare("		
        DELETE FROM produits 
		WHERE refProduit LIKE '$ref';
        ");
        $query->execute();
}

public static function addProduct(string $articleName, string $descriptionParam, string $buyPrice, string $sellPrice, string $unitParam,
string $illustrationUrlParam)
{
    $bdd = new PDO('mysql:host=localhost;dbname=Projectfinal;charset=utf8', 'testuser', 'alexis123', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $query = $bdd->prepare(" insert INTO produits(nomProduit, descriptionProduit, prixAchatParUnit, prixventeParUnit, unit, illustrationUrl, dateEncodage) 
    VALUES ('$articleName', '$descriptionParam',  '$buyPrice', '$sellPrice', '$unitParam', '$illustrationUrlParam', SYSDATE());");

    $query->execute();
}

public static function editProduct(string $articleName, string $descriptionParam, string $unitParam,
string $illustrationUrlParam, string $refProduit)
{
    $bdd = new PDO('mysql:host=localhost;dbname=Projectfinal;charset=utf8', 'testuser', 'alexis123', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $query = $bdd->prepare("update produits 
    SET nomProduit = '$articleName',
    illustrationUrl = '$illustrationUrlParam',
    descriptionProduit = '$descriptionParam',
    unit =  '$unitParam' 
    WHERE refProduit =  $refProduit;");


    $query->execute();
}



}

?>