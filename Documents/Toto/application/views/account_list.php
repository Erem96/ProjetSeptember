
<html>
<head>
        <title> Account list</title>
</head>
<body>
        <h1>Account list</h1>
        <?php 
         
         $this->load->library('session');
         $id = 1;

         if(isset($account))
         {

                foreach ($account as $key => $value) {
                        echo '<b>Pseudo: </b>'.$value['pseudo'].'<br><br><b> statut:   </b>'.$value['statut'].'<br><br>'."<form method='post' action='Account_detail'> 
                        <input type='submit' value= 'detail' name='accountDetail'>
                        <input type='hidden' name='accountId' value='$id' />
                        </form>"."<form method='post' action='Account_edit'> 
                        <input type='submit' value= 'edit' name='accountDetail'>
                        <input type='hidden' name='accountId' value='$id' />
                        </form><br><br>____________________<br>";
        
                        $id = $id + 1;
                }
                
                if($_SESSION['statut'] === 'admin')
                {
                   echo '<center>
                   <a href="../Account/Account_insert">Add an account</a>
                   </center>';


         }



     
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


