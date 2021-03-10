
<?php

class commande
{

    public static function getAll($refAcheteur)
    {
        $bdd = new PDO('mysql:host=localhost;dbname=Projectfinal;charset=utf8', 'testuser', 'alexis123', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $query = $bdd->prepare("select * FROM commandes WHERE refAcheteur = '$refAcheteur';");
        $query->execute();
        return $query -> fetchAll(); 
    }

    public static function addCommande($refPersonneParam)
    {
        $bdd = new PDO('mysql:host=localhost;dbname=Projectfinal;charset=utf8', 'testuser', 'alexis123', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $query = $bdd->prepare("insert INTO commandes(creationDate, refAcheteur, numberLines, total, acheteurName) VALUES (SYSDATE(), 0 , 0, 0, (SELECT CONCAT(nom, ' ', prenom)FROM personnes WHERE refPersonnes = '$refPersonneParam'))");
        $query->execute();

        $query = $bdd->prepare("select MAX(refCommande) FROM commandes; ");
        $query->execute();
        return $query->fetch();
    }


}





class commandeLine
{
    public static function getAllForOneCommande($refCommande)
    {
        $bdd = new PDO('mysql:host=localhost;dbname=Projectfinal;charset=utf8', 'testuser', 'alexis123', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $query = $bdd->prepare("select refLignes, QTT, nomProduit, PrixVenteParUnit, PrixVenteParUnit * QTT AS 'total'  
		FROM lignescommandes
		JOIN produits ON lignescommandes.refProduit = produits.refProduit 
		WHERE lignescommandes.refCommande = $refCommande;");
        $query->execute();
        return $query -> fetchAll();
    }

    public static function addLine($refCommandeParam, $refproduct, $qtt)
    {
        $bdd = new PDO('mysql:host=localhost;dbname=Projectfinal;charset=utf8', 'testuser', 'alexis123', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $query = $bdd->prepare("insert INTO lignescommandes(refCommande, refProduit,qtt) VALUES ($refCommandeParam, $refproduct, $qtt);");
        $query->execute();
    }

    public static function UpdateLine($refLine, $qtt)
    {
        $bdd = new PDO('mysql:host=localhost;dbname=Projectfinal;charset=utf8', 'testuser', 'alexis123', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $query = $bdd->prepare("
        UPDATE lignesCommandes 
        SET qtt = qtt + $qtt
        WHERE lignesCommandes.reflignes = $refLine;");
    }

}