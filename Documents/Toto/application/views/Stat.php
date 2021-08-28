
<html>
<head>
        <title><?= $titre ?></title>
</head>
<body>
<?php

foreach($soldGames as $key => $value)
{
  echo '<b>Titre: </b>'.$value['titre'].'<br><br><b> Sold quantity:   </b>'.$value['QTT'].'<br><br><b> Total gain:  </b>'.$value['gain_total']."<br>______<br>";
}




?>

</body>
</html>



