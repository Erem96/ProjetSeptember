
<?php
    
    echo "<form action='./index.php?action=listeCommandes' method='post'>
    <table border='1'>
    <tr>
    <td>Reference </td>
    <td>Date</td>
    <td>Articles liés a la commande</td>
    <td>Total</td>
    
    </tr>";
    
    
    foreach($ListeCommande as $key => $value)
    {
        $ref = $value['refCommande'];
        $date = $value['creationDate'];
        $numberLines = $value['NumberLines'];
        $Total = $value['total'];


        echo "<tr>
        <td><input type='submit' name='ficheCommande'value='$ref'></td>
        <td>$date</td> 
        <td>$numberLines</td>
        <td>$Total</td>
        </tr>";
    }

    echo '</table></form>';
    ?>
</body>
</html>