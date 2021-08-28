<?php





class Account extends CI_Controller
{

   // $this->load->library('session');

	public function index()
	{
        $this->load->view('Header');
		$this->load->view('welcome_message');
	}


public function connection()
{

       $this->load->model("User_Model", 'userModel');
       $this->load->view('Header');
       $db = $this->load->database();
       $account = $this->userModel->findAll();;
       $this->load->library('session');
        $connection = false;
    
       if(!isset($_SESSION['statut']))
         {
             $this->load->view('connection');
         }
         else
         {
            $this->load->view('alreadyConnected');
         }



       if($_POST)
         {
             foreach ($account as $key => $value) 
             {
                 if($value['pseudo'] == $_POST["pseudo"]
                 && $value['mot_de_passe'] == $_POST["motDePasse"])
                 {

                     $account = $this->userModel->find('ID_client', $value['ID_client']);
                     if(!empty($account))
                     {
                    
                        $this->session->set_userdata($account[0]);
                        session_write_close();
                        $connection = true;
                     }

                 }



             }

             if(!$connection)
             {
                $this->load->view('FailedConnection');
             }
             else
             {
                $this->load->view('alreadyConnected');
             }

         }
}


     public function deconnection()
     {
         
         $this->load->library('session');
         session_destroy();
         $this->load->view('Header');
         $this->load->view('Deconnection');

     }


    
     public function account_list()
     {
        $this->load->library('session');
        $this->load->view('Header');
        $db = $this->load->database();
         $this->load->library('session');
         $this->load->model("User_Model", 'userModel');
         $account = $this->userModel->findall();


        
         $this->load->view('account_list', ['account' => $account]);
     }

     public function Account_Detail()
     {
         
         $this->load->model("User_Model", 'userModel');
         $this->load->library('session');
         $db = $this->load->database();
         $account = $this->userModel->find('ID_client', $_POST["accountId"]);
         $this->load->view('Header');
         $this->load->view('account_detail', ['account' => $account[0]]);

     }

     public function Account_edit()
     {
         $this->load->model("User_Model", 'userModel');
         $db = $this->load->database();

         $this->load->library('session');
         $this->load->view('Header');


         if(isset($_POST["idClientToEdit"]))
         {
            
            $account = $this->userModel->findCorresponding($_POST["motDePasse"],$_POST["idClientToEdit"]);

                if(!empty($account) && ($_POST["motDePasse"] === $_POST["motDePasseConfirm"]))
                {
                    $data = [
                        'pseudo' => $_POST["pseudo"],
                        'ID_client' => $account[0]["ID_client"]
                    ];

                    $this->userModel->update($data);

                }
                else
                {
                    $this->load->view('wrongInformationEdit');
                    $account = $this->userModel->find('ID_client',$_POST["idClientToEdit"]);
                }

           }
           else
           {
            $account = $this->userModel->find('ID_client',$_POST["accountId"]);
           }

        
           $this->load->view('account_edit', ['account' => $account[0]]);
     }

     public function Account_insert()
     {
         $this->load->library('session');
         $this->load->model("User_Model", 'userModel');
         $this->load->view('Header');
         $db = $this->load->database();
         


         $this->load->view('account_insert');

         if($_POST)
         {
             if($_POST["motDePasse"] == $_POST["motDePasseConfirm"])
             {

                  $existingAccount =  $this->userModel               
                  ->findAllWhere(" pseudo like '".$_POST['pseudo']."' or adresse_mail like '".$_POST["adresseMail"]."'");

                if(!empty($existingAccount))
                {
                    $this->load->view('alreadyUsedInfos');
                    
                }
                else
                {

                    $data = [
                        'pseudo' => $_POST["pseudo"],
                        'mot_de_passe' => $_POST["motDePasse"],
                        'adresse_mail'=> $_POST["adresseMail"],
                        'statut' => 'client'
                    ];

                    if(isset($_POST["statut"]))
                    {
                        $data['statut'] = $_POST["statut"];
                    }




                    $this->userModel->insert($data);
                    $this->load->view('accountCreation');

                }
            }
            else
            {
                $this->load->view('accountCreationFail');
            }

        }

           

    }

}



?>