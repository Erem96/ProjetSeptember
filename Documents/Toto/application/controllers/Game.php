<?php
defined('BASEPATH') OR exit('No direct script access allowed');





class Game extends CI_Controller
{

	public function index()
	{
        $this->load->view('Header');
		$this->load->view('welcome_message');
	}
    
    public function game_list()
    {
        $this->load->view('Header');
        $this->load->library('session');

        $db = $this->load->database();
        $this->load->model("Game_Model", 'gameModel');
        
        
        if(isset($_POST['search']))
        {
            $gamesQueryResult =
            $this->gameModel->findAllWhere(" titre like '%".$_POST['search']."%'");
            print_r($gamesQueryResult);
        
        }
        else
        {
            
             $gamesQueryResult = $this->gameModel->findAll();
        }

        $this->load->view('game_list', ['games' => $gamesQueryResult]);
    }

    public function Game_Detail()
    {
        $this->load->view('Header');
        $this->load->library('session');

        $db = $this->load->database();
        $this->load->model("Game_Model", 'gameModel');
        $gamesQueryResult = $this->gameModel->find('ID_article', $_POST["fieldId"]);

        $this->load->view('game_detail', ['games' => $gamesQueryResult[0]]);

    }

    public function Game_edit()
    {
        $this->load->view('Header');
            $this->load->library('session');


            if($_POST){
                $db = $this->load->database();
                $model =  $this->load->model("Game_Model", 'gameModel');

                if(isset($_POST["fieldId"])) //We came by clicking on edit from the menu
                {
                    $id = $_POST["fieldId"];
                    $game = $this->gameModel->find('id_article',$id);
                    $this->load->view('game_edit', ['game' => $game[0]]);
                }
                else if(isset($_POST["productToEditId"]))
                {
                        $id = $_POST["productToEditId"];
                        $data = [
                            'titre' => $_POST["titre"],
                            'prix_en_euro' => $_POST["prix_en_euro"],
                            'description_article' => $_POST["description_article"],
                            'chemin_image' => $_POST["chemin_image"],
                            'genre' => $_POST["genre"],
                            'console' => $_POST["console"],
                            'annee_de_sortie' => $_POST["annee_de_sortie"],
                        ];

                        foreach($data as $key => $value)
                        {
                            $this->gameModel->update($key , "'".$value."'", "id_article = ".$id);
                        }
                        $game = $this->gameModel->find('id_article',$id);
                        $this->load->view('game_edit', ['game' => $game[0]]);
                      };
                }
            
    }

    public function Game_insert()
    {
        $this->load->view('Header');
        $this->load->library('session');
        $db = $this->load->database();
        $model =  $this->load->model("Game_Model", 'gameModel');
        $id = 1;


        if($_POST){
            $data = [
                'titre' => $_POST["nomProduit"],
                'prix_en_euro' => $_POST["prix"],
                'description_article' => $_POST["description"],
                'chemin_image' => $_POST["PictureLink"],
                'genre' => $_POST["genre"],
                'console' => $_POST["console"],
                'annee_de_sortie' => $_POST["annee_de_sortie"],
            ];
            $this->gameModel->insert($data);
            $this->load->view('gameCreation');

          };

          $this->load->view('game_insert');
        
    }


    public function Game_delete()
    {
        if($_POST){
        $db = $this->load->database();
        $this->load->view('Header');
        $this->load->library('session');
        $this->load->model("Game_Model", 'gameModel');
        $this->gameModel->delete($_POST["fieldId"]);
        }
       


        
    }

    public function Game_Buy()
    {
        if($_POST){
        $this->load->library('session');

        
        $this->load->view('Header');
        $db = $this->load->database();;
        $this->load->model("Game_Model", 'gameModel');
        $game = $this->gameModel->find('id_article',$_POST["fieldId"]);


        $this->load->model("Command_Model", 'commandModel');
        $DejaDansLepanier = $this->commandModel->findallwhere("ID_article = ".$_POST["fieldId"]." and ID_client = ".$_SESSION['ID_client'].
        " and achete = false");
    }


        $data = [

            'ID_article' => $_POST["fieldId"],
            'ID_client' => $_SESSION['ID_client'],
            'QTT' => $_POST["QTT"],
            'achete' => 0,
            'ID_commnande' => null
        ];


         if(!empty($DejaDansLepanier))
         {
            $DejaDansLepanier = $this->commandModel->increment($data["ID_article"], $data["QTT"]);

         }

         else
         {
                $this->commandModel->insert($data);
         }

    }



}




?>