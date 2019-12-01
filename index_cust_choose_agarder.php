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
	//            $entities_id = null;
	
	            $profil = $_SESSION['profilAccess'];			
                include_once 'database.php';				
	            $pdo = Database::connect();
                if ( !empty($_GET['entities_id'])) {
                $entities_id  = $_REQUEST['entities_id'];
	            $sql = "SELECT * FROM tictan_customers WHERE entities_id=".$entities_id ." and is_deleted = 0 ORDER BY customer_name DESC";			
//				echo "1 entities_id=$entities_id<br>";	
//				  echo "1.sql = $sql <br>";	
//echo "type=$type <br>";				
				}
				else {
				$sql = "SELECT * FROM tictan_customers WHERE is_deleted = 0 ORDER BY customer_name DESC";
 //            echo "2 sql=$sql <br><br>";
				}
				if ( !empty($_GET['type'])) {
                $type  = $_REQUEST['type'];
//	           				echo "type=$type<br>";				
				}
				else {
				$type = 'computers';
				$sql = "SELECT * FROM tictan_customers WHERE is_deleted = 0 ORDER BY customer_name DESC";
 //             echo "11 ELSE type=$type <br>";
				}
				
	            $profil = $_SESSION['profilAccess'];			
 //			    echo "1.sql = $sql <br>";			
		
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
	echo '  <h3>Gestion des ordinateurs/Site</h3>';
	break;
	}
	case 'monitors':{
	              echo '  <h3>Gestion des Ecrans/Site</h3>';
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
	default :
	{
	              echo '  <h3>Gestion des ordinateurs/Site</h3>';
				  	break;
	}
		
}			  
 ?> 
	<div class="control-group <?php echo !empty($entities_idError)?'error':'';?>">
					<div 
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
						while($row=mysqli_fetch_array($sql))
						{
						echo '<option value="'.$row['id'].'">'.$row['companyname'].'</option>';
						} ?>
						</select>
			  <?php        echo "<input type=submit value=Rechercher>";?>						
						</dd>	
			    
                    </div>
				    </div>			
			
<?php

			
//echo "AVANT switch type=$type <br>";
switch ($type)
{	
	case 'computers': {
		
	if ($_SESSION['profilAccess'] == 'A' || $_SESSION['profilAccess'] == 'S') 
	echo '<a href="create_cust_computers.php" class="btn btn-success">Ajout nouvel ordinateur</a>';
    else echo '<a href="create_cust_computers.php" onClick="ValidateON()" class="btn btn-success">Nouvel ordinateur</a>';	
	break;
	}
	case 'monitors':{
	if ($_SESSION['profilAccess'] == 'A' || $_SESSION['profilAccess'] == 'S') 
	echo '<a href="create_cust_monitors.php" class="btn btn-success">Ajout nouveau matériel</a>';
    else echo '<a href="create_cust_monitors.php" onClick="ValidateON()" class="btn btn-success">Nouveau matériel</a>';	
	break;
	}
	case 'printers': {
if ($_SESSION['profilAccess'] == 'A' || $_SESSION['profilAccess'] == 'S') 
	echo '<a href="create_cust_printers.php" class="btn btn-success">Ajout nouveau matériel</a>';
    else echo '<a href="create_cust_printers.php" onClick="ValidateON()" class="btn btn-success">Nouveau matériel</a>';	
	break;
	}
	case 'copiers': {
if ($_SESSION['profilAccess'] == 'A' || $_SESSION['profilAccess'] == 'S') 
	echo '<a href="create_cust_copiers.php" class="btn btn-success">Ajout nouveau matériel</a>';
    else echo '<a href="create_cust_copiers.php" onClick="ValidateON()" class="btn btn-success">Nouveau matériel</a>';	
	break; 
	}
	case 'networks': {
	if ($_SESSION['profilAccess'] == 'A' || $_SESSION['profilAccess'] == 'S') 
	echo '<a href="create_cust_networks.php" class="btn btn-success">Ajout nouveau matériel</a>';
    else echo '<a href="create_cust_networks.php" onClick="ValidateON()" class="btn btn-success">Nouveau matériel</a>';	
	break;
	}
	case 'softwares': {
   if ($_SESSION['profilAccess'] == 'A' || $_SESSION['profilAccess'] == 'S') 
	echo '<a href="create_cust_softwares.php" class="btn btn-success">Ajout nouveau matériel</a>';
    else echo '<a href="create_cust_softwares.php" onClick="ValidateON()" class="btn btn-success">Nouveau matériel</a>';	
	break;
	}
	case 'accessories': {
    if ($_SESSION['profilAccess'] == 'A' || $_SESSION['profilAccess'] == 'S') 
	echo '<a href="create_cust_accessoiries.php" class="btn btn-success">Ajout nouveau matériel</a>';
    else echo '<a href="create_cust_accessories.php" onClick="ValidateON()" class="btn btn-success">Nouveau matériel</a>';	
	break;
	}
	default :
	{
	
	break;
	}
}			
    ?>	

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
      $sql = "SELECT * FROM tictan_customers WHERE entities_id=".$entities_id ." and is_deleted = 0 ORDER BY customer_name DESC";				   
				   }
				  else 
				  $sql = "SELECT * FROM tictan_customers WHERE is_deleted = 0 ORDER BY customer_name DESC";
 //  			       echo "sql = $sql <br>";			
				  $profil = $_SESSION['profilAccess'];
//			  echo " index_cust ====>  profil = $profil entities_id=$entities_id<br>";

                  foreach ($pdo->query($sql) as $row) {
                      echo '<tr>';
                      echo '<td>'. $row['customer_name'] . '</td>';
                      echo '<td>'. $row['address'] . '</td>';
                      echo '<td>'. $row['town'] . '</td>';								
                      echo '<td>'. $row['phone'] . '</td>';								
                      echo '<td>'. $row['email'] . '</td>';
					  if ($_SESSION['profilAccess'] == 'A' || $_SESSION['profilAccess'] == 'S') 
    				  echo '<td width=250>';
					  else echo '<td width=50>';
				  
switch ($type)
{	
	case 'computers': {
	echo '<a class="btn" href="read_cust_computers.php.?id='.$row['id'].'">Voir</a>';
	if ($_SESSION['profilAccess'] == 'A' || $_SESSION['profilAccess'] == 'S') {
                      echo '<a class="btn btn-success" href="update_cust_computers.php?id='.$row['id'].'">Modifier</a>';
                      echo ' ';
                      echo '<a class="btn btn-danger" href="delete_cust_computers.php?id='.$row['id'].'">Supprimer</a>';
					  }
					  echo '</td>';
                      echo '</tr>';
					  break;
    }
	
	case 'monitors':{
	echo '<a class="btn" href="read_cust_monitors.php.?id='.$row['id'].'">Voir</a>';
	if ($_SESSION['profilAccess'] == 'A' || $_SESSION['profilAccess'] == 'S') {
                      echo '<a class="btn btn-success" href="update_cust_monitors.php?id='.$row['id'].'">Modifier</a>';
                      echo ' ';
                      echo '<a class="btn btn-danger" href="delete_cust_monitors.php?id='.$row['id'].'">Supprimer</a>';
					  }
					  echo '</td>';
                      echo '</tr>';
	break;
	}
	case 'printers': {
	echo '<a class="btn" href="read_cust_printers.php.?id='.$row['id'].'">Voir</a>';
	if ($_SESSION['profilAccess'] == 'A' || $_SESSION['profilAccess'] == 'S') {
                      echo '<a class="btn btn-success" href="update_cust_printers.php?id='.$row['id'].'">Modifier</a>';
                      echo ' ';
                      echo '<a class="btn btn-danger" href="delete_cust_printers.php?id='.$row['id'].'">Supprimer</a>';
					  }
					  echo '</td>';
                      echo '</tr>';
	break;
	}
	case 'copiers': {
	echo '<a class="btn" href="read_cust_copiers.php.?id='.$row['id'].'">Voir</a>';
	if ($_SESSION['profilAccess'] == 'A' || $_SESSION['profilAccess'] == 'S') {
                      echo '<a class="btn btn-success" href="update_cust_copiers.php?id='.$row['id'].'">Modifier</a>';
                      echo ' ';
                      echo '<a class="btn btn-danger" href="delete_cust_copiers.php?id='.$row['id'].'">Supprimer</a>';
					  }
					  echo '</td>';
                      echo '</tr>';
	break; 
	}
	case 'networks': {
	echo '<a class="btn" href="read_cust_networks.php.?id='.$row['id'].'">Voir</a>';
	if ($_SESSION['profilAccess'] == 'A' || $_SESSION['profilAccess'] == 'S') {
                      echo '<a class="btn btn-success" href="update_cust_networks.php?id='.$row['id'].'">Modifier</a>';
                      echo ' ';
                      echo '<a class="btn btn-danger" href="delete_cust_networkss.php?id='.$row['id'].'">Supprimer</a>';
					  }
					  echo '</td>';
                      echo '</tr>';
	break;
	}
	case 'softwares': {
	echo '<a class="btn" href="read_cust_softwares.php.?id='.$row['id'].'">Voir</a>';
	if ($_SESSION['profilAccess'] == 'A' || $_SESSION['profilAccess'] == 'S') {
                      echo '<a class="btn btn-success" href="update_cust_softwares.php?id='.$row['id'].'">Modifier</a>';
                      echo ' ';
                      echo '<a class="btn btn-danger" href="delete_cust_softwares.php?id='.$row['id'].'">Supprimer</a>';
					  }
					  echo '</td>';
                      echo '</tr>';
	break;
	}
	case 'accessories': {
	echo '<a class="btn" href="read_cust_accessories.php.?id='.$row['id'].'">Voir</a>';
	if ($_SESSION['profilAccess'] == 'A' || $_SESSION['profilAccess'] == 'S') {
                      echo '<a class="btn btn-success" href="update_cust_accessories.php?id='.$row['id'].'">Modifier</a>';
                      echo ' ';
                      echo '<a class="btn btn-danger" href="delete_cust_accessories.php?id='.$row['id'].'">Supprimer</a>';
					  }
					  echo '</td>';
                      echo '</tr>';
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
