<?php

if(isset($_COOKIE['refPersonnes'])){
    $ref = $_COOKIE['refPersonnes'];
}
else
{
    $ref = 0;
}

require ROOT.'Model/ProduitModel.php';
$ListeCompte = produit::getAll();
require ROOT.'View/listeProduit.php';

if((isset($_POST['FicheProduit'])))
{   
    $fiche =  reset(produit::getOne($_POST['FicheProduit']));
    require ROOT.'View/FicheProduit.php';
}

if((isset($_POST['editerProduit'])))
{   
    produit::editProduct($_POST['nomProduit'], $_POST['description'], $_POST['buyPrice'], $_POST['sellPrice'], 
    $_POST['unit'], $_POST['PictureLink'], $_POST['RefProduit']);
    require ROOT.'View/ProduitEdite.php';

}

if((isset($_POST['AjouterProduit'])))
{   
    require ROOT.'View/addProductForm.php';
}

if((isset($_POST['validationAjoutProduit'])))
{
    produit::addProduct($_POST['nomProduit'], $_POST['description'], $_POST['buyPrice'], $_POST['sellPrice'], $_POST['unit'],
    $_POST['PictureLink']);
    require ROOT.'View/AddedProduct.php';
}


if((isset($_POST['SupprimerProduit'])))
{   
    produit::deleteProduit($_POST['SupprimerProduit']);
}

if(isset($_POST['acheterArticle']))
{
    $refChoice = $_POST['acheterArticle'];
    $refcommande = $_POST['Commande'];
    $quantity = $_POST['quantity'];
    if($quantity != null)
    {
        produit::acheterProduit($refChoice, $refcommande, $quantity);
    }
    else
    {
        echo 'veuillez selectionner une quantite';
    }
}



?>