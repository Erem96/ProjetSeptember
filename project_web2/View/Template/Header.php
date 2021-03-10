<?php

 if(isset($_SESSION['login'])) 
    {
       $test = ROOT;
        echo "<div align='left'>"."User:".$_COOKIE['login']."<br></div>";
        echo '<a href="?action=deconnectionRequest">Deconnection test</a><br>';
        echo "<a href='$test'>Produits</a><br>";
        //.'article/'.'listeProduit
    }
     else
     {
        echo '<a href="?action=connectionRequest">Connection</a><br>';
     }
  //   session_start();
  //   $_SESSION['login'] = "lol";
     echo $_SESSION['login'];
     echo '<a href="?action=listeComptes">Clients</a><br>';
     echo '<a href="?action=listeCommandes">Commandes</a><br>';



?>


