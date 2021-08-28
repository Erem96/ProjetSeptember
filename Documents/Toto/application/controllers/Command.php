<?php
defined('BASEPATH') OR exit('No direct script access allowed');




 class Command extends CI_Controller
 {

 	public function index()
     	{
 		$this->load->view('welcome_message');
 	}

     public function Panier()
     {
         $this->load->view('Header');
         $this->load->library('session');


        
         $db = $this->load->database();
         $this->load->model("Command_Model", 'commandModel');

         $panier = $this->commandModel->panier($_SESSION["ID_client"]);
    
         $this->load->view('panier', ['panier' => $panier]);
     }
               



     public function Valid()
     {
         $this->load->view('Header');
         $this->load->library('session');

         $this->load->model("Command_Model", 'commandModel');

         $db = $this->load->database();;
         $panier = $this->commandModel->Valid($_POST["Identifiant"]);



     }

     public function ValidAll()
 {
     $this->load->view('Header');
     $this->load->library('session');

    

     $db = $this->load->database();;
     $this->load->model("Command_Model", 'commandModel');

     $panier = $this->commandModel->panier($_SESSION["ID_client"]);

     $commandId = uniqid();
     foreach($panier as $key=> $value)
     {
        $panier = $this->commandModel->Valid($value["Identifiant"], $commandId);
     }

 }

     public function delete()
     {
         $this->load->view('Header');
         $this->load->library('session');

        

         $db = $this->load->database();
         $this->load->model("Command_Model", 'commandModel');

         $panier = $this->commandModel->Delete('Identifiant', $_POST["Identifiant"]);

     }


     public function commandStat()
     {
         $db = $this->load->database();;
         $this->load->model("Command_Model", 'commandModel');
         $this->load->view('Header'); 
         $soldGames = $this->commandModel->stat();


         $this->load->view('Stat', ['soldGames' => $soldGames]);
     }


     public function MyCommands()
     {

         $this->load->library('session');
         $this->load->view('Header');
        

        
         $db = $this->load->database();;
         $this->load->model("Command_Model", 'commandModel');


         $panierGrouped =  $this->commandModel->myCommandsGrouped($_SESSION["ID_client"]);
         $panier = $this->commandModel->myCommands($_SESSION["ID_client"]);
    
         $this->load->view('CommandesGrouped', ['panierGrouped' => $panierGrouped]);
         $this->load->view('commandes', ['panier' => $panier]);



     }

     public function CommandsList()
     {
        $this->load->library('session');
        $this->load->view('Header');
       

       
        $db = $this->load->database();;
        $this->load->model("Command_Model", 'commandModel');

        $commandsInWaiting = $this->commandModel->CommandsInWaiting();
        $panierGrouped =  $this->commandModel->allCommandsGrouped();
        $panier = $this->commandModel->allCommands();
        
        $this->load->view('CommandInWaiting', ['commandsInWaiting' => $commandsInWaiting]);
        $this->load->view('allCommandGrouped', ['panierGrouped' => $panierGrouped]);
        $this->load->view('allCommand', ['panier' => $panier]);

     }

    

 }




?>