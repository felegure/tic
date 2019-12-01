<?php

if(!isset($_SESSION['flag'])) {
session_start();
$_SESSION['flag'] = true;
// echo "session_started";
$profil =$_SESSION['profilAccess'];

}

?>


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

 <?php
 include 'entete_variables.php';					
?>			
 </div>
 <p>
 </p>
 <div class="row">
<?php 
 include 'entete_variables.php';
 //echo "entities_id=$entities_id, customers_id=$customers_id, computers_id=$computers_id <br>";
 if ($_SESSION['profilAccess'] == 'A' || $_SESSION['profilAccess'] == 'S') 		
        echo '<a href="create_cust_comp_virtuels.php?pcname=$pcname?entities_id=$entities_id&companyname=$companyname&customers_id=$customers_id&customer_name=$customer_name" class="btn btn-success">Ajout lecteur virtuel</a>';	
 else
 echo '<a href="create_cust_comp_virtuels.php?pcname=$pcname?entities_id=$entities_id&companyname=$companyname&customers_id=$customers_id&customer_name=$customer_name" onClick="ValidateON()" class="btn btn-success">Ajout lecteur virtuel</a>';
?>
 <div class="row">
 
 <table class="table table-striped table-bordered" >
 <thead>
 <tr class="rowcomputer">
 <th>Nom du lecteur virtuel</th>
 <th>Ordinateur</th>						  
 <th>Choix</th>
 </thead>
 <tbody>
 <?php
   include 'database.php';
  $profil = $_SESSION['profilAccess'];
  $pdo = Database::connect();					   
  echo "<h5> Liste des lecteurs virtuels du Client $companyname / $customer_name </h5>";

  $sql = 'select * from vtictan_cust_comp_virtuels where customers_id='; 
  $sql = $sql.$customers_id.' and entities_id='.$entities_id. ' and computers_id='.$computers_id .' and is_deleted = 0 order by drivename ';
  echo "sql = $sql <br>";


 
  foreach ($pdo->query($sql) as $row) {
  echo '<tr class="rowcomputer">';
  echo '<td>'. $row['drivename'] . '</td>';										
  echo '<td>'. $row['pcname'] . '</td>';	

  // parametre 	 a passer
  if ($_SESSION['profilAccess'] == 'A' || $_SESSION['profilAccess'] == 'S') 
  echo '<td width=250>';
  else echo '<td width=50>';						
  echo '<a class="btn" href="read_cust_comp_virtuels.php?id='.$row['id'].'">Voir</a>';
  echo ' ';
  if ($_SESSION['profilAccess'] == 'A' || $_SESSION['profilAccess'] == 'S') {
  echo '<a class="btn btn-success" href="update_cust_comp_virtuels.php?id='.$row['id'].'">Modifier</a>';
  echo ' ';
  echo '<a class="btn btn-danger" href="delete_cust_comp_virtuels.php?id='.$row['id'].'">Supprimer</a>';
  }
  echo '</td>';
  echo '</tr>';
  } 

  Database::disconnect();				   
 ?>					  
 </tbody>
</table>
 <div class="form-actions">
 <?php 
//   $customers_id = $row['customers_id'] ;
//  $customer_name = $row['customer_name'] ;
 ?>
 <a class="btn" href="virtuels_list.php?entities_id=<?php echo $entities_id; ?>&customer_id=<?php echo $customers_id; ?>&customer_name=<?php echo $customer_name;?> &type=virtuels">Retour</a>
 </div>	
 
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
