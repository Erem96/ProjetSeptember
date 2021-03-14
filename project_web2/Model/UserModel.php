<?php



class comptesLists{

protected $comptes;
public function __construct()
{

    $this->table =  'personnes';
    $bdd = new PDO('mysql:host=localhost;dbname=Projectfinal;charset=utf8', 'testuser', 'alexis123', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $query = $bdd->prepare("select refPersonnes, pseudo, adresseMail, statut from personnes");
    $query->execute();
    
    $this->comptes = array();
    foreach($query->fetchAll() as $key => $value)
    {
        
        $compte = new compte();
        $compte->refPersonnes = $value['refPersonnes'];
        $compte->pseudo= $value['pseudo'];
        $compte->adresseMail= $value['adresseMail'];
        $compte->statut= $value['statut'];
        
        array_push($this->comptes, $compte);
    }
}

}

class compte {

    protected $table; /*Pour réduire les risques de fuites de données, les noms, et mot de passes ne sortent pas de la DB*/
    public $refPersonnes;
    public $pseudo;
    public $adresseMail;
    public $statut;

    public static function CorrespondingCount($userName, $password)
    {
        $bdd = new PDO('mysql:host=localhost;dbname=Projectfinal;charset=utf8', 'testuser', 'alexis123', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $query = $bdd->prepare("select refPersonnes FROM personnes WHERE pseudo LIKE '$userName' && motDePasse LIKE '$password'");
        $query->execute();
        return $query -> fetch();
    }

    public static function edit(string $prenomparam, string $nomparam, string $pseudoparam, string $passwordparam, string $mailparam, string $ref)
    {
        $bdd = new PDO('mysql:host=localhost;dbname=Projectfinal;charset=utf8', 'testuser', 'alexis123', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $query = $bdd->prepare("		
        UPDATE personnes
		SET
		nom = '$nomparam',  
		pseudo ='$pseudoparam', 
		prenom = '$prenomparam',
		adresseMail ='$mailparam', 
		motDePasse ='$passwordparam'
		WHERE refPersonnes LIKE $ref;
        ");
        $query->execute();
       // return $query -> fetch();
    }

    public static function addAccount(string $prenomparam, string $nomparam, string $pseudoparam, string $passwordparam, string $mailparam)
    {
        $bdd = new PDO('mysql:host=localhost;dbname=Projectfinal;charset=utf8', 'testuser', 'alexis123', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $query = $bdd->prepare("		
        insert into personnes(nom, pseudo, prenom, adresseMail, motDePasse, statut) 
		VALUES(
		'$nomparam',  
		'$pseudoparam', 
		'$prenomparam',
		'$mailparam', 
		'$passwordparam',
        'client');
        ");
        

        
        $query->execute();
    }

    public static function deleteAccount(string $ref)
    {
        $bdd = new PDO('mysql:host=localhost;dbname=Projectfinal;charset=utf8', 'testuser', 'alexis123', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $query = $bdd->prepare("		
        DELETE FROM personnes 
		WHERE refPersonnes LIKE '$ref';
        ");
        $query->execute();
    }


    
    public static function getOne($refPersonnes)
    {
        $bdd = new PDO('mysql:host=localhost;dbname=Projectfinal;charset=utf8', 'testuser', 'alexis123', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $query = $bdd->prepare("select * FROM personnes WHERE refPersonnes LIKE '$refPersonnes'");
        $query->execute();
        return $query -> fetchAll();
    }

    public static function getAll()
    {
        $bdd = new PDO('mysql:host=localhost;dbname=Projectfinal;charset=utf8', 'testuser', 'alexis123', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $query = $bdd->prepare("select * FROM personnes");
        $query->execute();
        return $query -> fetchAll();
    }

    public function __construct()
    {
        $this->table =  'personnes';
    }

// public function afficher(){
//     echo 'afficher personne';
    
   

    // $query = "call DeleteProduit('$refChoice', '$ref')";
    // $reponse = $bdd->prepare($query);
    // $reponse->execute();

    // $records = $reponse->fetchAll(PDO::FETCH_ASSOC);


}


?>