
<html>
<head>
        <title>Commands></title>
</head>
<body>
        <h1>Valided</h1>
        <?php 


foreach ($panier as $key => $value) {

        $id = $value['Identifiant'];
            echo '<b>Command id: </b>'.$value['ID_commande'].
            '<br><b>titre: </b>'.$value['titre'].'<br><br><b> Quantity:   </b>'.$value['QTT'].'<br><br>____________________<br>';
    }
        

        ?>

</body>
</html>




