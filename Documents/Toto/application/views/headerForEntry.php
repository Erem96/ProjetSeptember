<?php
$this->load->library('session');
if(isset($_SESSION['statut']))
{
   echo '<br>pseudo: '.$_SESSION['pseudo'].'<br>statut: '.$_SESSION['statut'].'<br><br>';

   echo '<center>
   <a href="index.php/Game/Game_list">Game list</a>
   <a href="index.php/Account/deconnection">Deconnection</a>
   <a href="index.php/Command/Panier">Panier</a>
   <a href="index.php/Command/MyCommands">My confirmed commands</a>
   </center>';

   if($_SESSION['statut'] === 'admin')
   {
      echo '<center>
      <a href="index.php/Game/Game_insert">Add a game</a>
      <a href="index.php/Account/Account_List">Account list</a>
      <a href="index.php/Command/CommandsList">Commands lists</a>
      <a href="index.php/Command/CommandStat">Command stat</a>
      </center>';

   }

   
}
else
{
   echo '<center>
   <a href="index.php/Account/Connection">Connection</a>
   <a href="index.php/Account/Account_insert">Register</a>
   <a href="index.php/Game/Game_list">Game list</a></center>';
}




?>





