<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="indextic_files/mbcsmbmcp.css" type="text/css" />
</head>
 
<body>
<?php
 session_start();
include "./entete.php";
?>
    <div class="container">
            <div class="row">
                <h3>Gestion de Client/Site</h3>
            </div>
            <div class="row">
            <p>
			<?php
			if ($_SESSION['profilAccess'] == 'A' || $_SESSION['profilAccess'] == 'S') 		
			echo '<a href="create_cust.php" class="btn btn-success">Nouveau site</a>';
			else
			echo '<a href="create_cust.php" onClick="ValidateON()" class="btn btn-success">Nouveau site</a>';
            ?>				
    		</p>
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
                       include 'database.php';
	//				   $profil = $_SESSION['profilAccess'];
	//				   echo " index_cust ====>  profil = $profil <br>";
                       $pdo = Database::connect();
                       $sql = 'SELECT * FROM tictan_customers WHERE is_deleted = 0 ORDER BY id DESC';
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
                                echo '<a class="btn" href="read_cust.php?id='.$row['id'].'">Voir</a>';
                                echo ' ';
								if ($_SESSION['profilAccess'] == 'A' || $_SESSION['profilAccess'] == 'S') {
                                echo '<a class="btn btn-success" href="updated_cust.php?id='.$row['id'].'">Modifier</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="delete_cust.php?id='.$row['id'].'">Supprimer</a>';
								}
								echo '</td>';
                                echo '</tr>';
                       }
                       Database::disconnect();
                      ?>
                      </tbody>
                </table>
        </div>
    </div> <!-- /container -->
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
