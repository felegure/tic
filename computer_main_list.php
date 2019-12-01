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

 <tr class="rowcomputer">
<p>
</p>
 <p>
 <?php
 if ($_SESSION['profilAccess'] == 'A' || $_SESSION['profilAccess'] == 'S') 		
 echo ' <a href="create_cust_c.php?entities_id=$entities_id&companynament=$companynament&customers_id=$customers_id&customer_name=$customer_name" class="btn btn-success">Ajout ordinateur</a>';
 else
 echo '<a href="create_cust_c.php?entities_id=$entities_id&companynament=$companynament&customers_id=$customers_id&customer_name=$customer_name" onClick="ValidateON()" class="btn btn-success">Ajout ordinateur</a>';
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
  echo "<h5> Liste des Ordinateurs du Client $companynament / $customer_name </h5>";

  $sql = 'select * from vtictan_customers_computers
  where customers_id='; 
  $sql = $sql.$customers_id.' and entities_id='.$entities_id. ' and is_deleted = 0 order by pcname DESC';
// echo "sql = $sql <br>";
  foreach ($pdo->query($sql) as $row) {
  echo '<tr class="rowcomputer">';
  echo '<td>'. $row['pcname'] . '</td>';			
  echo '<td>'. $row['modelname'] . '</td>';	
  echo '<td>'. $row['typename'] . '</td>';									
  echo '<td>'. $row['session_admin_name'] . '</td>';
  echo '<td>'. $row['session_admin_pwd'] . '</td>';									
  echo '<td>'. $row['teamv_logname'] . '</td>';	
  echo '<td>'. $row['teamv_pwd'] . '</td>';								
  echo '<td>'. $row['adresseip'] . '</td>';
  echo '<td>'. $row['location'] . '</td>';																						
  if ($_SESSION['profilAccess'] == 'A' || $_SESSION['profilAccess'] == 'S') 
  echo '<td width=250>';
  else echo '<td width=50>';						
  echo '<a class="btn" href="read_cust_c.php?id='.$row['id'].'">Voir</a>';
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
 <a class="btn" href="index_cust_choose.php?entities_id=<?php echo $entities_id; ?>&type=computers_main">Retour</a>
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
