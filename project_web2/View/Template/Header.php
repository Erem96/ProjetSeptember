<?php

 if(isset($_COOKIE['login']))
    {
        echo "<div align='left'>"."User:".$_COOKIE['login']."<br></div>";
        echo '<a href="?action=deconnectionRequest">Deconnection test</a><br>';
        echo '<a href="?action=ListeProduit">Produits</a><br>';
    }
     else
     {
        echo '<a href="?action=connectionRequest">Connection</a><br>';
     }

     echo '<a href="?action=listeComptes">Clients</a><br>';



?>


