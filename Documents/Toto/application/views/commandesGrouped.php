
<html>
<head>
        <title>Commands></title>
</head>
<body>
        <h1>Details</h1>
        <?php 

        foreach ($panierGrouped as $key => $value) {

            $id = $value['ID_commande'];
                echo '<br><br><br><b>Command id:<br></b> '.$value['ID_commande'].'<br><b>Total 
                price: </b><br>'.$value['prix_total'];
        }
        

        ?>

</body>
</html>
