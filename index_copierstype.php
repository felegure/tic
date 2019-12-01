<?php
if(!isset($_SESSION['flag'])) {
session_start();
$_SESSION['flag'] = true;
// echo "session_started";
$profil =$_SESSION['profilAccess'];
//echo "profil dans index_printers.php = $profil <br>";

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
<?php
				$profil = $_SESSION['profilAccess'];
                $inclure='./entete'.$profil.'.php';
		        include_once $inclure ;
?>
    <div class="container">
            <div class="row">
                <h3>Photocopieurs</h3>
            </div>
            <div class="row">
                <p>
                    <a href="create_general.php?form_name=index_copierstype.php&table_name=tictan_copierstypes&entete=Type Photocopieur" class="btn btn-success">Nouveau type de Photocopieur</a>				
                </p>
                <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
						  <th>Type Photocopieur</th>		  
                          <th>Commentaire</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
			          $table_name='tictan_copierstypes';
					  $entete='Type Photocopieur';	
                      $form_name='index_copierstype.php';					 					  
                      include 'database.php';
                       $pdo = Database::connect();					   

				   $sql = 'select * from tictan_copierstypes where is_deleted=0 order by name';	
						foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
							echo '<td>'. $row['name'] . '</td>';
							echo '<td>'. $row['comment'] . '</td>';						
   							echo '<td width=250>';
 							echo '<a class="btn" href="read_admin_general.php?id='.$row['id'].'&table_name='.$table_name .' &entete='. $entete.' &form_name='.$form_name.'">Voir</a>';							
                            echo ' ';
   echo '<a class="btn btn-success" href="update_general.php?id='.$row['id'].'&table_name='.$table_name .' &entete='. $entete.' &form_name='.$form_name.'">Modifier</a>';
                            echo ' ';
  echo '<a class="btn btn-danger" href="delete_general.php?id='.$row['id'].'&table_name='.$table_name .' &entete='. $entete.' &form_name='.$form_name.'">Supprimer</a>'; 
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
