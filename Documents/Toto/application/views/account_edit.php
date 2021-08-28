
<html>
<head>
        <title><?= $titre ?></title>
</head>
<body>   
   
            <form method="post"> <br> <br> 
            <input type="hidden" name="idClientToEdit" id="idClientToEdit" value=<?php echo $account['ID_client'] ?>>
            <input type="text" name="pseudo" id="pseudo" required value=<?php echo $account['pseudo'] ?>> Pseudo <br> <br> 
            <input type="password" name="motDePasse" id="motDePasse" required value=""> Mot de passe <br><br>
            <input type="password" name="motDePasseConfirm" id="motDePasseConfirm"> Confirmer Mot de passe <br><br>
            <input type="submit"> 
            </form>
</body>
</html>



