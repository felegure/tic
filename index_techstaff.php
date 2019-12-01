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
 // index_cust_techstaff.php               
				$profil = $_SESSION['profilAccess'];
                $inclure='./entete'.$profil.'.php';
		        include_once $inclure ;

	?>
	</div>
</div>

    <div class="container">
            <div class="row">
                <h3>Gestion des techniciens ATT</h3>
            </div>
            <div class="row">
                <p>
                    <a href="create_techstaff.php" class="btn btn-success">Nouveau technicien</a>
                </p>
                <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
						  <th>Prénom et Nom du technicien</th>		  
                          <th>Mobile</th>
                          <th>Adresse email</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      include 'database.php';
                       $pdo = Database::connect();					   

				   $sql = 'select * from tictan_tecstaff where is_deleted=0 order by name DESC';	
			
							foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
							echo '<td>'. $row['firstName'] . '   ' . $row['name'].'</td>';
							echo '<td>'. $row['mobile'] . '</td>';	
							echo '<td>'. $row['email'] . '</td>';							
   							echo '<td width=250>';
                            echo '<a class="btn" href="read_techstaff.php?id='.$row['id'].'">Voir</a>';
                            echo ' ';
                            echo '<a class="btn btn-success" href="update_techstaff.php?id='.$row['id'].'">Modifier</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="delete_techstaff.php?id='.$row['id'].'">Supprimer</a>';
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
