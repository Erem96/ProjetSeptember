
<html>
<head>
        <title>game_list</title>
</head>
<body>
        <h1> Game list</h1>
        <?php 


   
$this->load->library('session');

         echo "<form method='post' action='Game_list'> 
         <input type='text' name='search'>
         <input type='submit' value= 'search title' name='sub'>
         </form>";

         $this->load->library('session');

          foreach ($games as $key => $value) {

        

            
                $id = $value['ID_article'];
                echo '<b>Titre: </b>'.$value['titre'].'<br><br>'.$value['chemin_image'].'<br><br> prix: '.$value['prix_en_euro'].
                "<form method='post' action='Game_detail'> 
                <input type='submit' value= 'detail' name='productDetail'>
                <input type='hidden' name='fieldId' value='$id' />
                </form>";

                if(isset($_SESSION['statut']))
                {
                        echo "<form method='post' action='Game_buy'> 
                        <input type='number' name='QTT' required> 
                        <input type='submit' value= 'buy' name='productBuy'>
                        <input type='hidden' name='fieldId' value='$id' /></form>";

                        if($_SESSION['statut'] === 'admin')
                        {
                                echo "<form method='post' action='Game_edit'> 
                                <input type='submit' value= 'edit' name='productEdit'>
                                <input type='hidden' name='fieldId' value='$id' /></form>";
        
                                echo "<form method='post' action='Game_delete'> 
                                <input type='submit' value= 'delete' name='productDelete'>
                                <input type='hidden' name='fieldId' value='$id' /></form>";
                        }
                }


                echo "<br><br>____________________<br>";
             
         }

        ?>

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


