<?php
$this->load->library('session');
if(isset($_SESSION['statut']))
{
   echo '<br>pseudo: '.$_SESSION['pseudo'].'<br>statut: '.$_SESSION['statut'].'<br><br>';

   echo '<center>
   <a href="../Game/Game_list">Game list</a>
   <a href="../Account/deconnection">Deconnection</a>
   <a href="../Command/Panier">Panier</a>
   <a href="../Command/MyCommands">My confirmed commands</a>
   </center>';

   if($_SESSION['statut'] === 'admin')
   {
      echo '<center>
      <a href="../Game/Game_insert">Add a game</a>
      <a href="../Account/Account_List">Account list</a>
      <a href="../Command/CommandsList">Commands lists</a>
      <a href="../Command/CommandStat">Command stat</a>
      </center>';

   }

   
}
else
{
   echo '<center>
   <a href="../Account/Connection">Connection</a>
   <a href="../Account/Account_insert">Register</a>
   <a href="../Game/Game_list">Game list</a></center>';
}




?>





