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
<div class="container">
	<div class="row">
			<p>
			</p>
	<?php
 // index_cust_ent.php               
				$profil = $_SESSION['profilAccess'];
                $inclure='./entete'.$profil.'.php';
		        include_once $inclure ;
	?>
	</div>
</div>
    <div class="container">
            <div class="row">
                <h3>Gestion des Entités/Clients</h3>
            </div>
            <div class="row">
                <p>
                    <a href="create_entities.php" class="btn btn-success">Nouvelle Entité/Client</a>
                </p>
                <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Raison sociale</th>
                          <th>Adresse</th>
                          <th>Localité</th>		                          
						  <th>Téléphone</th>	
                          <th>Adresse email</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                       include 'database.php';
                       $pdo = Database::connect();
                       $sql = 'SELECT * FROM tictan_entities where is_deleted = 0 ORDER BY companyname';
                       foreach ($pdo->query($sql) as $row) {
                                echo '<tr>';
                                echo '<td>'. $row['companyname'] . '</td>';
                                echo '<td>'. $row['address'] . '</td>';
                                echo '<td>'. $row['town'] . '</td>';								
                                echo '<td>'. $row['phone'] . '</td>';								
                                echo '<td>'. $row['email'] . '</td>';
								echo '<td width=250>';
                                echo '<a class="btn" href="read_entities.php?id='.$row['id'].'">Voir</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="update_entities.php?id='.$row['id'].'">Modifier</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="delete_entities.php?id='.$row['id'].'">Supprimer</a>';
                                echo '</td>';
                                echo '</tr>';
                       }
                       Database::disconnect();
                      ?>
                      </tbody>
                </table>
        </div>
    </div> <!-- /container -->
  </body>
</html>
