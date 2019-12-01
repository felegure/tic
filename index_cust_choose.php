<?php
if(!isset($_SESSION['flag'])) {
session_start();
$_SESSION['flag'] = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="./css/mbcsmbmcp.css" type="text/css" />
	<link rel="stylesheet" href="./scss/.css" type="text/css" />	
</head>
 
<body>


<form class="form-horizontal" name=f1 action="check_entities.php?nomprog=$type" method="post"> 

<div class="container">
<div class="row">
<p>
</p>
<?php       
$profil = $_SESSION['profilAccess'];
$inclure='./entete'.$profil.'.php';
include $inclure ;	
$profil = $_SESSION['profilAccess'];			
include_once 'database.php';				
$pdo = Database::connect();

if ( !empty($_GET['entities_id'])) {
$entities_id  = $_REQUEST['entities_id'];
$sql = "SELECT * FROM tictan_customers WHERE entities_id=".$entities_id ." and is_deleted = 0 ORDER BY customer_name ";						
}
else {
$sql = "SELECT * FROM tictan_customers WHERE is_deleted = 0 ORDER BY customer_name";
//           echo "2 sql=$sql <br><br>";
}
				
if ( !empty($_GET['type'])) {
$type  = $_REQUEST['type'];
 //     				echo "Xtype=$type<br>";				
}
else {
$type = 'computers';
$sql = "SELECT * FROM tictan_customers WHERE is_deleted = 0 ORDER BY customer_name";
 //            echo "11 ELSE type=$type <br>";
}
				
$profil = $_SESSION['profilAccess'];			
 	//	    echo "1.sql = $sql <br>";			
?>
</div>
</div>
<div class="container">
<div class="row">
<?php
 // $type = null;
if ( !empty($_GET['type'])) {
$type = $_REQUEST['type'];
$_SESSION['type'] = $type;	
}
// echo "Type = $type <br> ";
switch ($type)
{	
	case 'computers': {
	echo '  <h3>Gestion des ordinateurs (disque,logiciels, lecteurs reseaux)</h3>';
	break;
	}
	case 'computers_comp': {
	echo '  <h3>Gestion des ordinateurs/Site</h3>';
	break;
	}
	case 'monitors':{
	              echo '  <h3>Gestion des Moniteurs/Site</h3>';
				  	break;
	}
	case 'printers': {
	              echo '  <h3>Gestion des Imprimantes/Site</h3>';
				  	break;
	}
	case 'copiers': {
	              echo '  <h3>Gestion des Photocopieurs/Site</h3>';
				 	break; 
	}
	case 'networks': {
	              echo '  <h3>Gestion des Equipements réseaux/Site</h3>';
				  	break;
	}
	case 'softwares': {
	              echo '  <h3>Gestion des Logiciels/Site</h3>';
				  	break;
	}
	case 'accessories': {
	              echo '  <h3>Gestion des Accessoires/Site</h3>';
				  	break;
	}
	case 'disks': {
	              echo '  <h3>Gestion des Disques/Site</h3>';
				  	break;
	}
	case 'virtuels': {
	              echo '  <h3>Gestion des Lecteurs virtuels/Site</h3>';
				  	break;
	}
	case 'customers': {
	              echo '  <h3>Gestion des Clients/Site</h3>';
				  break;
	}
	default :
	{
	              echo '  <h3>Gestion des Ordinateurs/Site</h3>';
				  	break;
	}
		
}			  
?> 
<div class="control-group <?php echo !empty($entities_idError)?'error':'';?>">
	<div> 
	 <dd>
 	 <?php
	 $conn = mysqli_connect("localhost", "root", "") or die('Error connecting to MySQLserver.');
	 mysqli_select_db($conn, "tictan") or die("Failed to connect to database");
	?>
	<select name="entities_id" class="entities_id">
	<option  value="0">Selectionnez une entite</option>
	<?php 
	$sql=mysqli_query($conn, "select id, companyname from tictan_entities WHERE is_deleted = 0 
	order by companyname ASC");
	while($row1=mysqli_fetch_array($sql))
	{
	echo '<option value="'.$row1['id'].'">'.$row1['companyname'].'</option>';
//	echo "companyname=$row1[companyname] <br>";	
	} ?>
	</select>
	<?php echo "<input type=submit value=Rechercher>";?>						
	</dd>			    
    </div>
</div>			
			

<table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>Client/Site</th>
        <th>Adresse</th>
        <th>Localité</th>		                          
        <th>Téléphone</th>	
        <th>Adresse email</th>
        <th>Action</th>
        </tr>
        </thead>
        <tbody>
       <?php

		include_once 'database.php';				
	    $pdo = Database::connect();
		if ( !empty($_GET['entities_id'])) {
        $entities_id  = $_REQUEST['entities_id'];
	//			   echo "entities_id=$entities_id <br>";
        $sql = "SELECT * FROM vtictan_customers WHERE entities_id=".$entities_id ." and is_deleted = 0 ORDER BY customer_name";				   
		}
		else 
		$sql = "SELECT * FROM vtictan_customers WHERE is_deleted = 0 ORDER BY customer_name ";
 //  	       echo "sql = $sql <br>";			
		 $profil = $_SESSION['profilAccess'];
//			  echo " index_cust ====>  profil = $profil entities_id=$entities_id<br>";
         foreach ($pdo->query($sql) as $row) {
         echo '<tr>';
         echo '<td>'. $row['customer_name'] . '</td>';
         echo '<td>'. $row['address'] . '</td>';
         echo '<td>'. $row['town'] . '</td>';								
         echo '<td>'. $row['phone'] . '</td>';								
         echo '<td>'. $row['email'] . '</td>';
		 if($_SESSION['profilAccess'] == 'A' || $_SESSION['profilAccess'] == 'S') 
    	 echo '<td width=250>';
		 else echo '<td width=50>';
				  
switch ($type)
{	
    case 'computers_comp': {
	echo '<a class="btn btn-success" href="computer_comp_list.php?customers_id='.$row['customers_id'].'&customer_name='.$row['customer_name'].'&entities_id='.$row['entities_id'].'&companyname='.$row['companyname'].'">Liste des ordinateurs </a>';
	break;
    }	
	case 'computers': {
	echo '<a class="btn btn-success" href="computer_list.php?customers_id='.$row['customers_id'].'&customer_name='.$row['customer_name'].'&entities_id='.$row['entities_id'].'&companyname='.$row['companyname'].'">Liste des ordinateurs (composants)</a>';
	break;
    }	
	case 'monitors':{
	echo '<a class="btn btn-success" href="monitor_list.php?customers_id='.$row['customers_id'].'&customer_name='.$row['customer_name'].'&entities_id='.$row['entities_id'].'&companyname='.$row['companyname'].'">Liste des moniteurs</a>';
	break;
    }
	
	case 'printers': {
		echo '<a class="btn btn-success" href="printer_list.php?customers_id='.$row['customers_id'].'&customer_name='.$row['customer_name'].'&entities_id='.$row['entities_id'].'&companyname='.$row['companyname'].'">Liste des imprimantes</a>';
	break;
	}
	case 'copiers': {
		echo '<a class="btn btn-success" href="copier_list.php?customers_id='.$row['customers_id'].'&customer_name='.$row['customer_name'].'&entities_id='.$row['entities_id'].'&companyname='.$row['companyname'].'">Liste des photocopieurs</a>';
	break; 
	}
	case 'networks': {
		echo '<a class="btn btn-success" href="network_list.php?customers_id='.$row['customers_id'].'&customer_name='.$row['customer_name'].'&entities_id='.$row['entities_id'].'&companyname='.$row['companyname'].'">Liste des equipements reseaux</a>';
	break;
	}
	case 'softwares': {
		echo '<a class="btn btn-success" href="softs_list.php?customers_id='.$row['customers_id'].'&entities_id='.$row['entities_id'].'&customer_name='.$row['customer_name'].'&companyname='.$row['companyname'].'">Liste des logiciels</a>';
	break;
	}
	case 'disks': {
		echo '<a class="btn btn-success" href="disks_list.php?customers_id='.$row['customers_id'].'&customer_name='.$row['customer_name'].'&customer_name='.$row['customer_name'].'&entities_id='.$row['entities_id'].'&companyname='.$row['companyname'].'">Liste des disques</a>';
	break;
	}
	case 'virtuels': {
		echo '<a class="btn btn-success" href="virtuels_list.php?customers_id='.$row['customers_id'].'&customer_name='.$row['customer_name'].'&entities_id='.$row['entities_id'].'&customer_name='.$row['customer_name'].'&companyname='.$row['companyname'].'">Liste des lecteurs</a>';
	break;
	}	
	case 'accessories': {
		echo '<a class="btn btn-success" href="accessories_list.php?customers_id='.$row['customers_id'].'&customer_name='.$row['customer_name'].'&entities_id='.$row['entities_id'].'&customer_name='.$row['customer_name'].'&companyname='.$row['companyname'].'">Liste des accessoires</a>';
	break;
	}
	case 'customers': {
		echo '<a class="btn btn-success" href="customer_list.php?entities_id='.$row['entities_id'].'&companyname='.$row['companyname'].'">Liste des clients</a>';
	break;
	}
	default :
	{
	
	break;
	}
		
  }		 	
 }						   
 //                      Database::disconnect();
                      ?>
                      </tbody>
                </table>
        </div>
    </div> <!-- /container -->
</form>

<script language="javascript">	
function ValidateON()
{
 var m="mon texte"; 
 var confirmation=confirm("Pas d'accès pour votre profil");  
 alert ("Pas d'accès a cette fonctionalité");
}
</script>	
</body>
</html>
