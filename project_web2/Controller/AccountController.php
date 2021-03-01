<?php
require ROOT.'Model/UserModel.php';
$ListeCompte = compte::getAll();
require ROOT.'View/listeCompte.php';

if(isset($_POST['FicheClient']))
{
    $fiche = reset(compte::getOne($_POST['FicheClient']));
   require ROOT.'View/ficheClient.php'; 
}

if(isset($_POST['editer']))
{
    if(reset(compte::NumberOfCorrespondingCount($_POST['pseudo'], $_POST['Oldpassword'])) != "0")
    {
        compte::edit( $_POST['prenom'], $_POST['nom'], $_POST['pseudo'], $_POST['Newpassword'], $_POST['mail'],
        $_POST['ClientAccount']); 
        echo "Compte modifié";
    }
    else
    {
        echo "password incorrect";
    }
}


if(isset($_POST['AjouterUnCompte']))
{
    //compte::addAccount( $_POST['prenom'], $_POST['nom'], $_POST['pseudo'], $_POST['Newpassword'], $_POST['mail']); 
    require ROOT.'View/ajoutCompte.php';
}

if(isset($_POST['ajouter']))
{
    compte::addAccount( $_POST['prenom'], $_POST['nom'], $_POST['pseudo'], $_POST['password'], $_POST['mail']); 
    echo 'votre compte a été ajouté';
}

if(isset($_POST['supprimer']))
{
    if(reset(compte::NumberOfCorrespondingCount($_POST['pseudo'], $_POST['Oldpassword'])) != "0")
    {
        compte::deleteAccount($_POST['ClientAccount']);
        echo "Compte supprimé";
    }
    else
    {
        echo "password incorrect";
    }
}

?>