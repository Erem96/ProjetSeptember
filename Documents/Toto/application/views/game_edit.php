
<html>
<head>
        <title></title>
</head>
<body>

  
            <form method="post"> <br> <br> 
            <input type='hidden' name='productToEditId' value= <?php echo $game['ID_article'] ?> />
            <input type="text" name="titre" id="titre" required value=<?php echo $game['titre'] ?>>* nom Produit <br> <br> 
            <input type="textarea" name="description_article" id="description_article" required value=<?php echo $game['description_article'] ?>> Descrition <br><br>
            <input type="text" name="genre" id="genre" required value=<?php echo $game['genre'] ?>> genre <br><br>
            <input type="text" name="console" id="console" required value=<?php echo $game['console'] ?>> console <br><br>
            <input type="numeric" name="annee_de_sortie" id="annee_de_sortie" required value=<?php echo $game['annee_de_sortie'] ?>> annee_de_sortie <br><br>
            <input type="numeric" name="prix_en_euro" id="prix_en_euro" required value=<?php echo $game['prix_en_euro'] ?>> prix <br><br>
            <input type="text" name="chemin_image" id="chemin_image" required value=<?php echo $game['chemin_image'] ?>>* PictureLink <br> <br>
             <input type="submit" value="editerProduit" name="editerProduit"> 
            </form> 


</body>
</html>



