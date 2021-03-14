

<table border=1>
<tr>
<td>Reference </td>
<td>Quantite</td>
<td>Article</td>
<td>Prix de vente</td>
<td>Total</td>

</tr>
<br>
_________________________________________
<br>DETAIL COMMANDE";
<?php
foreach($fiche as $key => $value)
{
    
    $ref = $value['refLignes'];
    $QTT = $value['QTT'];
    $nomProduit = $value['nomProduit'];
    $prixDeVente = $value['PrixVenteParUnit'];
    $Total = $value['total'];


    echo "<tr>
    <td><input type='submit' name='ficheCommande'value='$ref'></td>
    <td>$QTT</td> 
    <td>$nomProduit</td> 
    <td>$prixDeVente</td>
    <td>$Total</td>
    </tr>";
}
?>
</table>

<br><br>
<form action='./index.php?action=listeCommandes' method='post'>
<input type='submit' name='validerCommande'value='$ref'> valider commande
</form>";



