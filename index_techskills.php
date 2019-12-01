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

	
<title>index_techskills </title>
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
 // index_cust_techstaff.php               
				$profil = $_SESSION['profilAccess'];
                $inclure='./entete'.$profil.'.php';
		        include_once $inclure ;
	?>
	</div>
</div>
    <div class="container">
            <div class="row">
                <h3>Gestion des Compétences de Technicien</h3>
            </div>
            <div class="row">
                <p>
                    <a href="create_techskills.php" class="btn btn-success">Nouvelle compétence technicien</a>
                </p>
                <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
						  <th>Nom du technicien</th>		  
                          <th>Compétence technique</th>
                          <th>Mobile</th>	
                          <th>email</th>							  
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      include 'database.php';
                       $pdo = Database::connect();					   
				   $sql = 'select * from vtictan_skillteche where is_deleted=0 order by name DESC';			               
							foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
							echo '<td>'. $row['nametech'] . '</td>';
							echo '<td>'. $row['name'] . '</td>';	
							echo '<td>'. $row['mobile'] . '</td>';	
							echo '<td>'. $row['email'] . '</td>';					
   							echo '<td width=250>';
                            echo '<a class="btn" href="read_techskills.php?id='.$row['id'].'">Voir</a>';
                            echo ' ';
                            echo '<a class="btn btn-success" href="update_techskills.php?id='.$row['id'].'">Modifier</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="delete_techskills.php?id='.$row['id'].'">Supprimer</a>';
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
