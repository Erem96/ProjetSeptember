
<?php

 echo    "<form action='./index.php?action=listeComptes' method='post'> <br> <br> 
     <input type='text' name='prenom' id='prenom' required value=".$fiche["nom"].">* prenom <br> <br> 
     <input type='text' name='nom' id='nom' required value=".$fiche["prenom"].">* nom <br> <br>
     <input type='text' name='pseudo' id='pseudo' required value=".$fiche["pseudo"].">* pseudo <br> <br>
     <input type='password' name='Oldpassword' id='Oldpassword' required>* Ancien mot de passe <br> <br>
     <input type='password' name='Newpassword' id='Newpassword'> Nouveau mot de passe (laissez le vide si vous ne souhaitez pas le changer <br> <br>
     <input type='text' name='mail' id='mail' required value=".$fiche["adresseMail"].">* mail <br> <br>
     <input type='hidden' name='ClientAccount' value=".$fiche["refPersonnes"].">
     <input type='submit' value='editer' name='editer'> <input type='submit' value='supprimer' name='supprimer'>
     </form>
     Remarque: la modification et la suppression d'un compte exige l'entree de l'ancien mot de passe de ce compte"


?>

