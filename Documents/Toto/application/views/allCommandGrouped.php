
<html>
<head>
        <title>Commands></title>
</head>
<body>
        <h1>Commands</h1>
        <?php 

        foreach ($panierGrouped as $key => $value) {

            $id = $value['ID_commande'];
                echo '<br><br><br><b>Command id:</b> '.$value['ID_commande'].'<br><b>User</b>: '.$value['pseudo']."(".$value['ID_client'].")".'<br><b>Total 
                price: </b><br>'.$value['prix_total'];
        }
        

        ?>

</body>
</html>

