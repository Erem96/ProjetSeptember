<?php

foreach($ListeCompte as $key => $value)
    {
        
         echo 'Reference: '. $value["refPersonnes"].'<br><br>Pseudo: '.$value["pseudo"].'<br><br>Adresse mail: '.
         $value["adresseMail"]." <br><br><form action='./index.php?action=ListeProduit' method='post'><input type='submit' name='FicheClient'value='".$value["refPersonnes"]."'>voir compte </form><br><br><br>_______________________________________________<br><br>";
    }
  echo "<form action='./index.php?action=ListeProduit' method='post'><input type='submit' name='AjouterUnCompte'value='AjouterUnCompte'></form><br><br>;";
?>