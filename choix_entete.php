<div class="container">
            <div class="row">
			<p>
<?php
 
if(!isset($_SESSION['flag'])) {
session_start();
$_SESSION['flag'] = true;
}

$username=$_SESSION['username'];
echo "<tr>";
echo "<td>Utilisateur:<b>$username </b>          </td>";
echo "<td>";
$date = date("d-m-Y");
$heure = date("H:i");
echo ", la date du jour est $date:$heure" ;
echo "<td>";
echo "<tr>";
$profil = $_SESSION['profilAccess'];
switch($profil){
  case 'A':
	{
	 include_once 'enteteA.php';
	 break;
	}
  case 'C':
  {
	 include_once 'enteteC.php';
  break;
  }
  case 'T':{
	 include_once 'enteteT.php';
  break;
  }
  case 'S':{
	 include_once 'enteteS.php';
  break;
  }
  default: 
  {
	 include_once 'enteteC.php';
  break;
  }
}
?>			
			</p>
 </div>
 </div



