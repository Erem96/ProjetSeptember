
<html>
<head>
        <title><?= $title ?></title>
</head>
<body>
        <h1>Panier</h1>
        <?php 
         
         $this->load->library('session');
         $id = 1;


        foreach ($panier as $key => $value) {

            $id = $value['Identifiant'];
                echo '<b>titre: </b>'.$value['titre'].'<br><br><b> Quantity:   </b>'.$value['QTT'].'<br><br><b> Total:   </b>'.$value['prix_total'].
                '<br><br>'."<form method='post' action='Valid'> 
                <input type='submit' value= 'Valid' name='Valid'>
                <input type='hidden' name='Identifiant' value='$id' />
                </form>"."<form method='post' action='delete'> 
                <input type='submit' value= 'Delete' name='Delete'>
                <input type='hidden' name='Identifiant' value='$id' />
                </form><br><br>____________________<br>";
        }



        

        ?>

        <form method='post' action='ValidAll'>
        <input type='submit' value= 'validAll' name='ValidAll'>
        </form> 


</body>
</html>


<!-- echo 'this is a game list';
//echo $gameList;

echo $data;

// foreach ($gameList as $key => $value) {
//     # code...
// }


// foreach($gameList as $key => $value)
// {
    
// echo 'this is a game list';
// //echo $key.'<br>'.$value.'<br>_______________________-';
// } -->


