<?php

require ROOT.'Model/UserModel.php';

if(isset($_SESSION['login']))
{
    
   setcookie('login',"", -3000,'../');
    require ROOT.'View/deconnection.php';
    header(ROOT.'View/ConnectionForm.php') ;
}
else
{
    if(isset($_POST['login']))
    {
        
        $login = $_POST['login'];
        $password = $_POST['password'];
        echo 'test connection';
        if(reset(compte::NumberOfCorrespondingCount($login, $password)) != "0")
        {

            
            $_SESSION['login'] = $login;

            setcookie('login',$login, 0,'../');
            setcookie('refPersonnes',0, 0,'../'); //0 pour le moment, le modifier en créant une fonction de recuperation de la reference
            echo 'connection reussie';
           // header(ROOT.'index.php');
            //setcookie('refPersonnes',$records['refPersonnes'], 0,'../');
            // setcookie('statut',$records['statut'], 0,'../');
        }
        else
        {
            require ROOT.'View/FailedConnection.php';
            require ROOT.'View/ConnectionForm.php';
        }
    }   
    else
    {
        require ROOT.'View/ConnectionForm.php';
    }
}
?>