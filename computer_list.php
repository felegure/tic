<?php
if(!isset($_SESSION['flag'])) {
session_start();
$_SESSION['flag'] = true;
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

	
<title>Customer_list </title>
<style type="text/css">
<!--
.Style25 {
	font-size: 16px;
	color: #000099;
	font-weight: bold;
}
.Style31 {color: #000000}
-->
<!--
.Style1 {
	font-size: 18px;
	color: #0000FF;
	font-weight: bold;
}
.Style19 {
	font-size: 18px;
	color: #006600;
	font-weight: bold;
}
.Style21 {font-size: 9px}
.Style22 {color: #000033 ;
font-size:12px}
.Style23 {color: #00CC66}
.Style24 {color: #000066}
.Style30 {color: #000099; font-weight: bold; }
.Style32 {color: #000000; font-weight: bold; }
-->
</style>	
</head>
<body>

 <div class="container">
  <div class="row">
 <p>
 </p>
 <?php
 $type='computers_comp';
 include 'entete_variables.php';				
?>			
 </div>
 <div class="row">
 <table class="table table-striped table-bordered" >

 <tr class="rowcomputer">
<p>
</p>
 <p>
 <?php
 if ($_SESSION['profilAccess'] == 'A' || $_SESSION['profilAccess'] == 'S') 		
 echo ' <a href="create_cust_customers.php?entities_id=$entities_id&companyname=$companyname&customers_id=$customers_id&customer_name=$customer_name" class="btn btn-success">Ajout ordinateur</a>';
 else
 echo '<a href="create_cust_customers.php?entities_id=$entities_id&companyname=$companyname&customers_id=$customers_id&customer_name=$customer_name" onClick="ValidateON()" class="btn btn-success">Ajout ordinateur</a>';
 ?>
 </p>
 <thead>
 <tr class="rowcomputer">
 <th>Pc</th>
 <th>Modèle</th>
 <th>Type</th>
 <th>Administrateur</th> 
 <th>Mot de passe</th>	
 <th>Teamviewer login</th>
 <th>Teamviewer pwd</th>
 <th>Adresse ip</th>					   
 <th>Localisation</th>						  
 <th>Action</th>
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
// echo "sql = $sql <br>";
  foreach ($pdo->query($sql) as $row) {
  echo '<tr class="rowcomputer">';
  echo '<td>'. $row['pcname'] . '</td>';			
  echo '<td>'. $row['namemodel'] . '</td>';	
  echo '<td>'. $row['nametype'] . '</td>';									
  echo '<td>'. $row['session_admin_name'] . '</td>';
  echo '<td>'. $row['session_admin_pwd'] . '</td>';									
  echo '<td>'. $row['teamv_logname'] . '</td>';	
  echo '<td>'. $row['teamv_pwd'] . '</td>';								
  echo '<td>'. $row['adresseip'] . '</td>';
  echo '<td>'. $row['location'] . '</td>';																						
  if ($_SESSION['profilAccess'] == 'A' || $_SESSION['profilAccess'] == 'S') 
  echo '<td width=350>';
  else echo '<td width=50>';						
  echo '<a class="btn" href="read_cust_computers.php?id='.$row['id'].'">Voir</a>';
  echo ' ';
  if ($_SESSION['profilAccess'] == 'A' || $_SESSION['profilAccess'] == 'S') {
  echo '<a class="btn btn-success" href="update_cust_computers.php?id='.$row['id'].'">Modifier</a>';
  echo ' ';
  echo '<a class="btn btn-danger" href="delete_cust_computers.php?id='.$row['id'].'">Supprimer</a>';
  }
  echo '</td>';
  echo '</tr>';
  }
  Database::disconnect();				   
 ?>					  
 </tbody>
</table>
 <div class="form-actions">
 <a class="btn" href="index_cust_choose.php?entities_id=<?php echo $entities_id; ?>&type=computers">Retour</a>
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
