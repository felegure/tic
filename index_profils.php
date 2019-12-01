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

	
<title>index_profils </title>
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
	$profil = $_SESSION['profilAccess'];
    $inclure='./entete'.$profil.'.php';
	include_once $inclure ;
	?>
	</div>
</div>

    <div class="container">
            <div class="row">
                <h3>Gestion des profils utilisateurs TIC Tanneurs</h3>
            </div>
            <div class="row">
                <p>
                    <a href="create_profils.php" class="btn btn-success">Nouveau profil</a>
                </p>
                <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Code profil</th>
                          <th>Description du profil</th>                          
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                       include 'database.php';
                       $pdo = Database::connect();
                       $sql = 'SELECT * FROM tictan_profil ORDER BY profil DESC';
                       foreach ($pdo->query($sql) as $row) {
                                echo '<tr>';
                                echo '<td>'. $row['profil'] . '</td>';
                                echo '<td>'. $row['description'] . '</td>';								
								echo '<td width=250>';
                                echo '<a class="btn" href="read_profils.php?id='.$row['id'].'">Voir</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="update_profils.php?id='.$row['id'].'">Modifier</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="delete_profils.php?id='.$row['id'].'">Supprimer</a>';
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
