<?php 

class User_Model extends CI_Model 
{
 //   protected $table; /*Pour réduire les risques de fuites de données, les noms, et mot de passes ne sortent pas de la DB*/
   
    public $pseudo;
    public $mot_de_passe;
    public $adresse_mail;
    public $statut;

    protected $table = 'comptes';
    protected $primaryKey = 'ID_client';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';


     protected $useSoftDeletes = false;

     protected $allowedFields = ['pseudo', 'mot_de_passe', 'adresse_mail', 
     'statut'];

     protected $useTimestamps = false;
     protected $createdField  = 'created_at';
     protected $updatedField  = 'updated_at';
     protected $deletedField  = 'deleted_at';

     protected $validationRules    = [];
     protected $validationMessages = [];
     protected $skipValidation     = false;


     public function getTable()
     {
      return 'comptes';
     }


     public function findAll()
     {
       $query = $this->db->get($this->getTable());
       return $query->result_array();
     }

     public function findAllWhere($condition)
     {
       $query = $this->db->query("select * from ".$this->getTable()." where ".$condition);
       return $query->result_array();
     }

     public function find($column, $value)
     {
       $query = $this->db->query("select * from ".$this->getTable()." where ".$column." = ". $value);
       return $query->result_array();
     }

     public function findCorresponding($password, $id)
     {
       $query = $this->db->query("select * from ".$this->getTable()." where ID_client = ".$id." and mot_de_passe = '".$password."'");
       return $query->result_array();
     }

     public function update($data)
     {
         $query = $this->db->query("update ".$this->getTable()."  SET pseudo = '".$data['pseudo']."' WHERE ID_client = ".$data['ID_client']);
     }

     public function updateEntity($id, $data)
     {
      
      $query = $this->db->query("update ".$this->getTable()."  SET ".$column." = ".$value." WHERE ".$condition);
      $query->result_array();

     }

     public function delete($column, $value)
     {
         $query = "delete FROM ".$this->getTable()." WHERE ".$column." = ".$value;
          return $query->result_array();
     }

     public function insert($data)
     {
            $query = $this->db->query
            ("INSERT INTO ".$this->getTable()."(pseudo, mot_de_passe, adresse_mail, 
            statut)
            VALUES ('".$data['pseudo']
            ."','".
            $data['mot_de_passe']
            ."','".
            $data['adresse_mail']
            ."','".
            $data['statut']
            ."')");
     }

}

?>