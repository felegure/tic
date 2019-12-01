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
<form class="form-horizontal" name=f1 action="check_entities.php?nomprog=C" method="post">  

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
				echo "1 entities_id=$entities_id<br>";				
				}
				else {
				$sql = "SELECT * FROM tictan_customers WHERE is_deleted = 0 ORDER BY customer_name DESC";
 //              echo "2 <br>";
				}
	            $profil = $_SESSION['profilAccess'];			
 //			    echo "1.sql = $sql <br>";			
		
	?>
	</div>
</div>
    <div class="container">
            <div class="row">
			<?php
			
              echo '  <h3>Gestion des ordinateurs/Site</h3>';
            ?> 
	<div class="control-group <?php echo !empty($entities_idError)?'error':'';?>">
					     <label class="control-label">Selectionnez une entite</label>
						 <div class="controls">
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
			  <?php        echo "<input type=submit value=Submit>";?>						
						</dd>	
			    
                    </div>
				    </div>			
			
			<?php
			
			if ($_SESSION['profilAccess'] == 'A' || $_SESSION['profilAccess'] == 'S') 		
			echo '<a href="create_cust_computers.php" class="btn btn-success">Ajout nouvel ordinateur</a>';
			else
			echo '<a href="create_cust_computers.php" onClick="ValidateON()" class="btn btn-success">Nouvel ordinateur</a>';
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
	//				  session_start();
	//				  $_SESSION['username'] = $user_name; 
				include_once 'database.php';				
	            $pdo = Database::connect();
			    if ( !empty($_GET['entities_id'])) {
                   $entities_id  = $_REQUEST['entities_id'];
      $sql = "SELECT * FROM tictan_customers WHERE entities_id=".$entities_id ." and is_deleted = 0 ORDER BY customer";				   
				   }
				  else 
				  $sql = "SELECT * FROM tictan_customers WHERE is_deleted = 0 ORDER BY customer";
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
					   
				//	 } 
					   
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
