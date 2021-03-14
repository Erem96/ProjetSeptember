<?php

require ROOT.'Model/CommandeModel.php';
$ListeCommande = commande::getAll($_SESSION['reference']);
require ROOT.'View/ListeCommande.php';

if((isset($_POST['ficheCommande'])))
{   
    $fiche =  commandeLine::getAllForOneCommande($_POST['ficheCommande']);
    require ROOT.'View/FicheCommande.php';
}

?>