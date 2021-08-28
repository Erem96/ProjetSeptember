<html>
<head>
        <title><?= $titre ?></title>
</head>
<body>



<?php
            
           echo "<form method='post'> <br> <br> 
            <input type='text' name='nomProduit' id='nomProduit' required>* nom Produit <br> <br> 
            <input type='text' name='description' id='description_article' required> Descrition <br><br>
            <input type='text' name='genre' id='genre' required> genre <br><br>
            <input type='text' name='console' id='console' required> console <br><br>
            <input type='numeric' name='annee_de_sortie' id='annee_de_sortie' required> annee_de_sortie <br><br>
            <input type='numeric' name='prix' id='prix' required> prix <br><br>
        <input type='text' name='PictureLink' id='PictureLink' required>* PictureLink <br> <br>
            <input type='submit' value='addProduct' name='addProduct'> 
            </form>"
?>

</body>
</html>
