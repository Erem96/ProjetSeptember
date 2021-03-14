<?php

if(isset($_SESSION['reference'])){
    $ref = $_SESSION['reference'];
}
else
{
    $ref = 0;
}

require ROOT.'Model/ProduitModel.php';
require ROOT.'Model/CommandeModel.php';
$ListeCompte = produit::getAll();
$ListeCommande = commande::getAll($_SESSION['reference']);
require ROOT.'View/listeProduit.php';

if((isset($_POST['FicheProduit'])))
{   
    $fiche =  reset(produit::getOne($_POST['FicheProduit']));
    require ROOT.'View/FicheProduit.php';
}

if((isset($_POST['editerProduit'])))
{   
    produit::editProduct($_POST['nomProduit'], $_POST['description'], 
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

if(isset($_POST['acheterProduit']))
{
    $refChoice = $_POST['acheterProduit'];
    $refcommande = $_POST['Commande'];
    $quantity = $_POST['quantity'];
    $refPersonneParam = $_SESSION['reference'];
    if($quantity != null)
    {
        require ROOT.'Model/CommandeModel.php';

        if($refcommande === "0") //creer une nouvelle commande et une nouvelle ligne
        {
            commandeLine::addLine(reset(commande::addCommande($refPersonneParam)), $refChoice, $quantity);
        }
        else
        {
            $lineNumber = commandeLine::getline($refcommande, $refChoice);
            if($lineNumber != null)
            {
                commandeLine::addLine($refcommande,  $refChoice, $quantity);
            }
            else
            {
                commandeLine::updateLine($refLine, $quantity);
            }
            
        }



    //    produit::acheterProduit($refChoice, $refcommande, $quantity);
    }
    else
    {
        echo 'veuillez selectionner une quantite';
    }
}



?>