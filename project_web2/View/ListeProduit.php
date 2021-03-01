<?php
    foreach($ListeCompte as $key => $value)
    {

        if($value['QTT'] === null)
        {
            $stock = 'out of stock';
        }
        else
        {
            $stock = $value['QTT'];
        }
        echo '<br><br>'.$value['nomProduit'].' '.$value['prixVenteParUnit'].' €/'.$value['unit']."(unite en stock: ".$stock.")";
        $refProduit = $value['refProduit'];

              echo "<form action='./index.php?action=ListeProduit' method='post'><input type='number' name='quantity' placeholder='quantite'> quantite 
              <input type='submit' name='acheterProduit'value='$refProduit'> Acheter cet article pour la commande n° (selectionnez 0 pour une nouvelle commande) 
            //   <SELECT name='Commande' size='1'>
            //   <option value=0> 0</option>";
            //   foreach($records2 as $key2 => $value2)
            //   {
            //       $refCommande = $value2['refCommande'];
            //       echo "<option value=$refCommande> $refCommande";
            //   }
            echo "</SELECT></form>";
              echo '<br>';
              echo "<form action='./index.php?action=ListeProduit' method='post'> <input type='submit' name='SupprimerProduit'value='$refProduit'> Supprimer cet article</form>";
              echo '<br>';
              echo "<form action='./index.php?action=ListeProduit' method='post'> <input type='submit' name='FicheProduit'value='$refProduit'> Fiche produit</form>"; 
              echo '<br>';
               $imageName = $value['illustrationUrl'];  
               echo  "<img src='view/images/$imageName'>" ;  
               
               echo '<br><br>_______________________________________________<br><br>';
              
    }
    echo "<br><br>______________________________________________________________________________________________________________<br><br><form action='./index.php?action=ListeProduit' method='post'> <input type='submit' name='AjouterProduit'> Ajouter un produit</form>";
    ?>
</body>
</html>