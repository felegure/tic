<?php
if(!isset($_SESSION['flag'])) {
session_start();
$_SESSION['flag'] = true;
// echo "session_started";
$profil =$_SESSION['profilAccess'];
//echo "profil dans index_copiers.php = $profil <br>";

}
   $type = null;
    if ( !empty($_GET['type'])) {
        $type= $_REQUEST['type'];
    }
 $objet = null;
    if ( !empty($_GET['objet'])) {
        $objet = $_REQUEST['objet'];
    }
 $nom = null;
    if ( !empty($_GET['nom'])) {
        $objet = $_REQUEST['nom'];
    }
 if (( null==$type ) || (null == $objet) || (null == $nom)) {
        header("Location: index_ent.php");
		
    } else {

        echo "type=$type <br>";
		echo "objet=$objet <br>";
echo "nom =$nom <br>";
	$formulaire = "index_".$objet.$type.".php";
	include $formulaire;
	
    }
?>
CTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="./css/mbcsmbmcp.css" type="text/css" />
</head>
 
<body>
<?php
				$profil = $_SESSION['profilAccess'];!
                $inclure='./entete'.$profil.'.php';
		        include_once $inclure ;
?>
    <div class="container">
            <div class="row">
                <h3><?php 
				$gestion = "Gestion des ".$nom."s";
				echo "$gestion <br>" ; ?> 
				</h3>
            </div>
            <div class="row">
                <p>
                    <a href="create_computer.php" class="btn btn-success">Nouvel ordinateur</a>
                </p>
                <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
						  <th>Modèle ordinateur</th>		  
                          <th>Commentaire</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      include 'database.php';
                       $pdo = Database::connect();					   

				   $sql = 'select * from tictan_computermodels where is_deleted=0 order by name DESC';	
			
							foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
							echo '<td>'. $row['name'] . '</td>';
							echo '<td>'. $row['comment'] . '</td>';						
   							echo '<td width=250>';
                            echo '<a class="btn" href="read_computer.php?id='.$row['id'].'">Voir</a>';
                            echo ' ';
                            echo '<a class="btn btn-success" href="update_computer.php?id='.$row['id'].'">Modifier</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="delete_computer.php?id='.$row['id'].'">Supprimer</a>';
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
