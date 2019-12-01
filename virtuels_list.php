<?php

if(!isset($_SESSION['flag'])) {
session_start();
$_SESSION['flag'] = true;
// echo "session_started";
$profil =$_SESSION['profilAccess'];

}

?>


<!DOCTYPE html>
<html>
<body>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <link   href="css/bootstrap.min.css" rel="stylesheet">
 <script src="js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="./css/mbcsmbmcp.css" type="text/css" />
</head>
 
<body>

 <div class="container">
  <div class="row">
 <p>
 </p>
 <?php
 include 'entete_variables.php';		
?>			
 </div>
 <div class="row">
 <table class="table table-striped table-bordered" >
 <thead>
 <tr class="rowcomputer">
 <th>Pc</th>
 <th>Modèle</th>
 <th>Type</th>								  
 <th>Numero de serie</th>	
 <th>Localisation</th>						  
 <th>Choix</th>
 </thead>
 <tbody>
 <?php
   include 'database.php';
  $profil = $_SESSION['profilAccess'];
  $pdo = Database::connect();					   
  echo "<h5> Liste des Ordinateurs du Client $companyname / $customer_name </h5>";

  $sql = 'select * from vtictan_customers_computers
  where customers_id='; 
  $sql = $sql.$customers_id.' and entities_id='.$entities_id. ' and is_deleted = 0 order by pcname DESC';
//  echo "sql = $sql <br>";
  foreach ($pdo->query($sql) as $row) {
  echo '<tr class="rowcomputer">';
  echo '<td>'. $row['pcname'] . '</td>';			
  echo '<td>'. $row['namemodel'] . '</td>';	
  echo '<td>'. $row['nametype'] . '</td>';	
  echo '<td>'. $row['serial'] . '</td>';								
  echo '<td>'. $row['location'] . '</td>';																						
  // parametrea a passer

  
  echo '<td width=250>';
  echo '<a  class="btn btn-success" href="index_cust_comp_virtuels.php?computers_id='.$row['id'].'&computer_name='.$row['pcname'].'&customer_name='.$row['customer_name'].'&customer_id='.$row['customers_id'].'">Liste des lecteurs virtuels</a>';  // parametres entities_id, customer_id, computers_id
  echo '</td>';
  echo '</tr>';
 
 }
  Database::disconnect();				   
 ?>					  
 </tbody>
</table>
<table  width="900" height="30" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#ECE9D8" frame="border">
 <tr valign="baseline">
      <td width="100" height="42" align="right" nowrap >
        <div align="center"><span class="Style22">	
        </div></td>
      <td width="200">
      </td>
	  <td width="300" height="42" align="right" nowrap >
        <div align="center"><span class="Style22">
	    </div>
	  </td>
      <td width="300" height="42" align="right" nowrap >
	  <div>
	  </div>
	  <p>
	  </p>
  <a class="btn" href="index_cust_choose.php?entities_id=<?php echo $entities_id; ?>&type=virtuels">Retour</a>
	  </td>  
 </tr> 
  </table>	
 </div>
 </div> <!-- /container -->
<script language="javascript">	
function ValidateON()
{
 var m="mon texte"; 
 var confirmation=confirm("Pas d'accès pour votre profil"); 
 // alert ("validateOn");
	
 //if (confirmation){ 
  //action à faire pour la valeur true 
alert ("Pas d'accès a cette fonctionalité");

//	}
	   
}
</script>	
</body>
</html>
