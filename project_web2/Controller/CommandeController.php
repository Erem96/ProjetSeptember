<?php

require ROOT.'Model/CommandeModel.php';
$ListeCommande = commande::getAll(0);
require ROOT.'View/ListeCommande.php';

if((isset($_POST['ficheCommande'])))
{   
    $fiche =  commandeLine::getAllForOneCommande($_POST['ficheCommande']);
    require ROOT.'View/FicheCommande.php';
}

?>