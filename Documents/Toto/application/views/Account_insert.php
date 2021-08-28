
<html>
<head>
        <title><?= $titre ?></title>
</head>
<?php
            $this->load->library('session');


            echo "<form method='post'> <br> <br> 
            <input type='text' name='pseudo' id='pseudo' required> Pseudo <br> <br> 
            <input type='password' name='motDePasse' id='motDePasse' required> Mot de passe <br><br>
            <input type='password' name='motDePasseConfirm' id='motDePasseConfirm' required> Confirmer Mot de passe <br><br>
            <input type='text' name='adresseMail' id='adresseMail'> Adresse mail <br><br>";

            if(isset($_SESSION['statut']) && $_SESSION['statut'] === 'admin')
            {
                echo "<input type='text' name='statut' id='statut' value = 'client'>* Statut <br> <br>";        
            }

            echo "<input type='submit'>
            </form>";


?>
</body>
</html>