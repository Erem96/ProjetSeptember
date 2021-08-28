<?php 
class Command_Model extends CI_Model 
{
 //   protected $table; /*Pour réduire les risques de fuites de données, les noms, et mot de passes ne sortent pas de la DB*/
   
 protected $Identifiant;
 protected $ID_article;
 protected $ID_client;
 protected $QTT;
 protected $achete;
 protected $ID_commnande;


    protected $table = 'article_souhaite';
    protected $primaryKey = 'Identifiant';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';


     protected $useSoftDeletes = false;

     protected $allowedFields = ['ID_article', 'ID_client', 'QTT', 
     'achete', 'ID_commande'];

     protected $useTimestamps = false;
     protected $createdField  = 'created_at';
     protected $updatedField  = 'updated_at';
     protected $deletedField  = 'deleted_at';

     protected $validationRules    = [];
     protected $validationMessages = [];
     protected $skipValidation     = false;


     public function getTable()
     {
      return 'article_souhaite';
     }


     public function findAll()
     {
       $query = $this->db->get($this->getTable());
       return $query->result_array();
     }

     public function find($column, $value)
     {
       $query = $this->db->query("select * from ".$this->getTable()." where ".$column." = ". $value);
       return $query->result_array();
     }

     public function findAllWhere($condition)
     {
       $query = $this->db->query("select * from ".$this->getTable()." where ".$condition);
       return $query->result_array();
     }

     public function update($column, $value, $condition)
     {
         $query = $this->db->query("update ".$this->getTable()."  SET ".$column." = ".$value." WHERE ".$condition);
         return $query->result_array();
     }

     public function increment($id, $value)
     {
         $query = $this->db->query("update ".$this->getTable()."  SET QTT = QTT +".$value." WHERE id_article = ".$id);
     }


     public function delete($column, $value)
     {
        $this->db->query("delete FROM ".$this->getTable()." WHERE ".$column." = ".$value);
     }

     public function insert($data)
     {
            $query = $this->db->query("INSERT INTO ".$this->getTable()."(ID_article, ID_client, QTT, 
            achete)
            VALUES(".$data['ID_article'].", ".$data['ID_client'].", ".$data['QTT'].", false)");
     }

     public function panier($ID_client)
     {
      $query = $this->db->query("select *, articles.prix_en_euro * article_souhaite.QTT as 'prix_total' 
      FROM `article_souhaite` left join articles ON articles.ID_article = article_souhaite.ID_article 
      WHERE ID_client = ".$ID_client." and achete= false");
      return $query->result_array();
     }

     public function CommandsInWaiting()
     {
      $query = $this->db->query("select *, articles.prix_en_euro * article_souhaite.QTT as 'prix_total' 
      FROM `article_souhaite` left join articles ON articles.ID_article = article_souhaite.ID_article 
      left join comptes ON comptes.ID_client = comptes.ID_client
      WHERE achete= false");
      return $query->result_array();
     }

     public function myCommands($ID_client)
     {
      $query = $this->db->query("select *, articles.prix_en_euro * article_souhaite.QTT as 'prix_total' 
      FROM `article_souhaite` left join articles ON articles.ID_article = article_souhaite.ID_article 
      WHERE ID_client = ".$ID_client." and achete= true");
      return $query->result_array();
     }

     public function myCommandsGrouped($ID_client)
     {
      $query = $this->db->query("select *, sum(articles.prix_en_euro * article_souhaite.QTT) as 'prix_total' 
      FROM `article_souhaite` left join articles ON articles.ID_article = article_souhaite.ID_article 
      WHERE ID_client = ".$ID_client." and achete= true GROUP by ID_commande");
      return $query->result_array();
     }



     public function allCommands()
     {
      $query = $this->db->query("select *, articles.prix_en_euro * article_souhaite.QTT as 'prix_total' 
      FROM `article_souhaite` left join articles ON articles.ID_article = article_souhaite.ID_article
      left join comptes ON comptes.ID_client = comptes.ID_client 
      WHERE achete= true");
      return $query->result_array();


     }

     public function allCommandsGrouped()
     {
      $query = $this->db->query("select *, sum(articles.prix_en_euro * article_souhaite.QTT) as 'prix_total' 
      FROM `article_souhaite` left join articles ON articles.ID_article = article_souhaite.ID_article 
      left join comptes ON comptes.ID_client = comptes.ID_client
      WHERE achete= true GROUP BY `ID_commande`");
      return $query->result_array();
     }

     public function stat()
     {
      $query = $this->db->query("select *, sum(articles.prix_en_euro * article_souhaite.QTT) as 
      'gain_total', sum(article_souhaite.QTT) FROM `article_souhaite` left join articles ON articles.ID_article = 
      article_souhaite.ID_article WHERE article_souhaite.achete = true GROUP BY articles.ID_article");
      return $query->result_array();
     }

     public function valid($id,$commandId)
     {

      $query = $this->db->query("update ".$this->getTable()."  SET achete = true, ID_commande = '".$commandId."' where 
      Identifiant = ".$id);   
     }

}

?>