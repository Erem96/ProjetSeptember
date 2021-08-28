<?php 


class Game_Model extends CI_Model
{
 //   protected $table; /*Pour réduire les risques de fuites de données, les noms, et mot de passes ne sortent pas de la DB*/
   
 public $refProduit;
    public $descriptionProduit;
    public $prixAchatParUnit;
    public $prixVenteParUnit;
    public $unit;
    public $illustrationUrl;
    public $dateEncodage;
    public $userCreator;


    protected $table = 'articles';
    protected $primaryKey = 'ID_article';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';


     protected $useSoftDeletes = false;

     protected $allowedFields = ['titre', 'prix_en_euro', 'description_article', 
     'chemin_image', 'genre', 'console', 'annee_de_sortie'];

     protected $useTimestamps = false;
     protected $createdField  = 'created_at';
     protected $updatedField  = 'updated_at';
     protected $deletedField  = 'deleted_at';

     protected $validationRules    = [];
     protected $validationMessages = [];
     protected $skipValidation     = false;

     public function getTable()
     {
      return 'articles';
     }


     public function findAll()
     {
       $query = $this->db->get('articles');
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
     }

     public function delete($value)
     {
        $this->db->query("delete FROM ".$this->getTable()." WHERE id_article = ".$value);
     }

     public function insert($data)
     {
            $query = $this->db->query
            (
               "INSERT INTO ".$this->getTable().
            "(titre, prix_en_euro, description_article, chemin_image, genre, console, annee_de_sortie) VALUES (".
            '"'.$data['titre'].'","'. $data['prix_en_euro'].'","'.$data['description_article'].'","'.$data['chemin_image'].'","'.
            $data['genre'].'","'.$data['console'].'","'.$data['annee_de_sortie'].'"'.")"
         );
     }



}

?>