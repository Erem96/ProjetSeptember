<?php

if((isset($_POST['FicheProduit'])))
    {
         $refProduit = $fiche['refProduit'];
         $nomProduit = $fiche['nomProduit'];
        $PrixAchatParUnit = $fiche['prixAchatParUnit'];
        if($PrixAchatParUnit == null)
        {
            $PrixAchatParUnit = 'non_communiqué';
        }
        
        
         $PrixVenteParUnit = $fiche['prixVenteParUnit'];
         $Unit = $fiche['unit'];
         $description = $fiche['descriptionProduit'];
         $pictureLink = $fiche['illustrationUrl'];


             ?>
            
            <form action="./index.php?action=ListeProduit" method="post"> <br> <br> 
            <input type="text" name="nomProduit" id="nomProduit" required value=<?php echo $nomProduit ?>>* nom Produit <br> <br> 
            <input type="text" name="description" id="description" required value=<?php echo $description ?>> <br> Descrition <br>
            <input type="text" name="PictureLink" id="PictureLink" required value=<?php echo $pictureLink ?>>* PictureLink <br> <br>
            <input type="text" name="unit" id="unit" required value=<?php echo $Unit ?>>* Unit <br> <br>
            <input type="hidden" name="RefProduit" value=<?php echo $refProduit ?>>
            <input type="submit" value="editerProduit" name="editerProduit"> 
            </form>
            <?php


    }

?>