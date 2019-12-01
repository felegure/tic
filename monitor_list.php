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
<body>

    <div class="container">
            <div class="row">
			<p>
			</p>
			<?php
			if(!isset($_SESSION['flag'])) {
            session_start();
            $_SESSION['flag'] = true;
           // echo "session_started";
            $profil =$_SESSION['profilAccess'];
            }
                $profil = $_SESSION['profilAccess'];
                $inclure='./entete'.$profil.'.php';
//				echo "inclure = $inclure <br>";
		        include_once $inclure ;
				$type='monitors';
				include 'entete_variables.php';

			?>			
            </div>
            <div class="row">
            <p>
			</p>
			<p>
			<?php
			if ($_SESSION['profilAccess'] == 'A' || $_SESSION['profilAccess'] == 'S') 		
			echo '<a href="create_cust_monitors.php?entities_id=$entities_id&companyname=$companyname&customer_id=$customer_id&customer_name=$customer_name" class="btn btn-success">Ajout Moniteur</a>';
			else
			echo '<a href="create_cust_monitors.php?entities_id=$entities_id&companyname=$companyname&customer_id=$customer_id&customer_name=$customer_name" onClick="ValidateON()" class="btn btn-success">Ajout Moniteur</a>';
            ?>
                </p>
                <table class="table table-striped table-bordered" >
                      <thead>
                        <tr class="rowcomputer">
                          <th>Moniteurs</th>
						  <th>Modèle</th>		  
						  <th>Type de Moniteur</th>	
						  <th>Numero de serie</th>						  
						  <th>Localisation</th>							  
                      </thead>
                      <tbody>
                      <?php
                      include 'database.php';
                       $pdo = Database::connect();					   
echo "<h5> Liste des Moniteurs du Client $companyname / $customer_name </h5>";
					$sql = 'select * from vtictan_customers_monitors 
					 where customers_id='; 
				     $sql = $sql.$customers_id.' and entities_id='.$entities_id. ' and is_deleted=0 order by namemonitor DESC';	
						foreach ($pdo->query($sql) as $row) {
                            echo '<tr class="rowcomputer">';
							echo '<td>'. $row['namemonitor'] . '</td>';			
                            echo '<td>'. $row['namemodel'] . '</td>';			
                            echo '<td>'. $row['nametype'] . '</td>';
                            echo '<td>'. $row['serial'] . '</td>';														
                            echo '<td>'. $row['location'] . '</td>';	
					        if ($_SESSION['profilAccess'] == 'A' || $_SESSION['profilAccess'] == 'S') 
    				        echo '<td width=250>';
					        else echo '<td width=50>';						
                            echo '<a class="btn" href="read_cust_monitors.php?id='.$row['id_monitor'].'">Voir</a>';
                            echo ' ';
				            if ($_SESSION['profilAccess'] == 'A' || $_SESSION['profilAccess'] == 'S') {				
                            echo '<a class="btn btn-success" href="update_cust_monitors.php?id='.$row['id_monitor'].'">Modifier</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="delete_cust_monitors.php?id='.$row['id_monitor'].'">Supprimer</a>';
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
	<table  width="900" height="30" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#ECE9D8" frame="border">
 <tr valign="baseline">
      <td width="100" height="42" align="right" nowrap >
        <div align="center"><span class="Style22">	
        </div></td>
      <td width="200">
      </td>
	  <td width="300" height="42" align="right" nowrap >
        <div align="center"><span class="Style22">
	    </div>
	  </td>
      <td width="300" height="42" align="right" nowrap >
	  <div>
	  </div>
	  <p>
	  </p>
      <a class="btn" href="index_cust_choose.php?entities_id=<?php echo $entities_id; ?>&type=monitors">Retour</a>
	  </td>  
 </tr> 
  </table>
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
 