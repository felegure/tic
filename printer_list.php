<?php
// computer_list.php
// Start the session
if(!isset($_SESSION['flag'])) {
session_start();
$_SESSION['flag'] = true;
}
else {
//ce que tu veux
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
			$type='printers';
            include 'entete_variables.php';				
			?>			
            </div>
            <div class="row">
            <p>
			</p>
			<p>	
			<?php
			if ($_SESSION['profilAccess'] == 'A' || $_SESSION['profilAccess'] == 'S') 		
			echo ' <a href="create_cust_printers.php?entities_id=$entities_id&companyname=$companyname&customers_id=$customer_id&customer_name=$customer_name" class="btn btn-success">Ajout Imprimante</a>';
			else
			echo '<a href="create_cust_printers.php?entities_id=$entities_id&companyname=$companyname&customer_id=$customer_id&customer_name=$customer_name" onClick="ValidateON()" class="btn btn-success">Ajout Imprimante</a>';
            ?>			
                </p>
                <table class="table table-striped table-bordered" >
                      <thead>
                        <tr class="rowcomputer">
                          <th>Imprimante</th>
						  <th>Modèle</th>		  
						  <th>Type d'imprimante</th>	
						  <th>Numero de serie</th>						  
						  <th>Adresse ip</th>	
                          <th>Connexion via</th>	   
						  <th>Localisation</th>							  
                      </thead>
                      <tbody>
                      <?php
                      include 'database.php';
                      $pdo = Database::connect();					   
echo "<h5> Liste des Imprimantes du Client $companyname / $customer_name </h5>";
					  $sql = 'select * from vtictan_customers_coprinters 
					  where customers_id='; 
				      $sql = $sql.$customers_id.' and entities_id='.$entities_id. ' and is_deleted=0 order by name';	
					  foreach ($pdo->query($sql) as $row) {
                      echo '<tr class="rowcomputer">';
				      echo '<td>'. $row['name'] . '</td>';			
                      echo '<td>'. $row['namemodel'] . '</td>';			
                      echo '<td>'. $row['nametype'] . '</td>';
                      echo '<td>'. $row['serial'] . '</td>';								
                      echo '<td>'. $row['adresseip'] . '</td>';	
                      echo '<td>'. $row['connexionvia'] . '</td>';							
                      echo '<td>'. $row['location'] . '</td>';															
//                    echo '</tr>';
					  if ($_SESSION['profilAccess'] == 'A' || $_SESSION['profilAccess'] == 'S') 
    				  echo '<td width=250>';
					  else echo '<td width=50>';
                      echo '<a class="btn" href="read_cust_printers.php?id='.$row['id'].'">Voir</a>';
                      echo ' ';
					  if ($_SESSION['profilAccess'] == 'A' || $_SESSION['profilAccess'] == 'S') {
                      echo '<a class="btn btn-success" href="update_cust_printers.php?id='.$row['id'].'">Modifier</a>';
                      echo ' ';
                      echo '<a class="btn btn-danger" href="delete_cust_printers.php?id='.$row['id'].'">Supprimer</a>';
					  }
					  echo '</td>';
					  echo '</tr>';
                      }
                      Database::disconnect(); 
                      ?>  
                      </tbody>
                </table>
				
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
      <a class="btn" href="index_cust_choose.php?entities_id=<?php echo $entities_id; ?>&type=printers">Retour</a>
	  </td>  
 </tr> 
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
 