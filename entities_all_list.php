<?php
if(!isset($_SESSION['flag'])) {
session_start();
$_SESSION['flag'] = true;
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

	<?php
 // contact_all_list.php               
				$profil = $_SESSION['profilAccess'];
                $inclure='./entete'.$profil.'.php';
		        include_once $inclure ;
	?>
	</div>
</div>
    <div class="container">
            <div class="row">
			   <h3>Liste des Entités</h3>		
            </div>
            <div class="row">
                <table class="table table-striped table-bordered" >
                      <thead>
                        <tr class="rowcomputer">
						  <th>Raison sociale</th>
                          <th>Adresse</th>
						  <th>Telephone</th>		  					  
						  <th>Adresse email</th>							  
                    </thead>
                      <tbody>
                      <?php
 
                      include 'database.php';
                       $pdo = Database::connect();					   
	                   $sql = 'select * from tictan_entities  
					   where is_deleted = 0 order by companyname'; 
					   
							foreach ($pdo->query($sql) as $row) {
                            echo '<tr class="rowcomputer">';
							echo '<td>'. $row['companyname'] .'</td>';			
                            echo '<td>'. $row['address'] . '</td>';															
                            echo '<td>'. $row['phone'] . '</td>';													
                            echo '<td>'. $row['email'] . '</td>';								
	//                     echo '</tr>';
					  if ($_SESSION['profilAccess'] == 'A' || $_SESSION['profilAccess'] == 'S') 
    				  echo '<td width=250>';
					  else echo '<td width=50>';
            echo '<a class="btn" href="read_entities.php?id='.$row['id'].'">Voir</a>';
                            echo ' ';
							if ($_SESSION['profilAccess'] == 'A' || $_SESSION['profilAccess'] == 'S') {							
                            echo '<a class="btn btn-success" href="update_entities.php?id='.$row['id'].'">Modifier</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="delete_entities.php?id='.$row['id'].'">Supprimer</a>';
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
 