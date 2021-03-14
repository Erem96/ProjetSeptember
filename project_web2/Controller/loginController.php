<?php

require ROOT.'Model/UserModel.php';

if(isset($_SESSION['login']))
{
    
    session_destroy();
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
        $_SESSION['reference'] =reset(compte::CorrespondingCount($login, $password));
        if($_SESSION['reference'] != null)
        {
            $_SESSION['login'] = $login;
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