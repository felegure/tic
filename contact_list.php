<?php
// network_list.php
// Start the session
session_start();

// include "./entete.php";
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
			<p>
			</p>
			<?php
			    include "./entete.php";  
				if (isset($_GET["entities_id"])) {
				$entities_id=$_GET["entities_id"];
				$_SESSION["entities_id"] = $entities_id;
				}
				if (isset($_GET["companynament"])) {
				$companynament=$_GET["companynament"];
				$_SESSION["companynament"] = $companynament;
				}
				if (isset($_GET["customer_id"])) {
				$customer_id=$_GET["customer_id"];
				$_SESSION["customer_id"] = $customer_id;												
				}
				if (isset($_GET["customer_name"])) {
				$customer_name=$_GET["customer_name"];
				$_SESSION["customer_name"] = $customer_name;
				}
			?>			
            </div>
            <div class="row">
            <p>
			</p>
			<p>	
	        <?php
			if ($_SESSION['profilAccess'] == 'A' || $_SESSION['profilAccess'] == 'S') 		
			echo '<a href="create_cust_contact.php?entities_id=$entities_id&companynament=$companynament&customer_id=$customer_id&customer_name=$customer_name" class="btn btn-success">Ajout Contact</a>';
			else
			echo '<a href="create_cust_contact.php?entities_id=$entities_id&companynament=$companynament&customer_id=$customer_id&customer_name=$customer_name" onClick="ValidateON()" class="btn btn-success">Ajout Contact</a>';
            ?>			

            </p>
                <table class="table table-striped table-bordered" >
                      <thead>
                        <tr class="rowcomputer">
                          <th>Nom et Prénom</th>
						  <th>Type de contact</th>
						  <th>Telephone</th>		  
						  <th>Mobile</th>	
						  <th>Telephone</th>						  
						  <th>Adresse email</th>	
                    </thead>
                      <tbody>
                      <?php
                      include 'database.php';
                       $pdo = Database::connect();					   
                       echo "<h5> Liste des Contacts du Client $companynament / $customer_name </h5>";
	                   $sql = 'select * from vtictan_customers_contacts  
					   where customers_id='; 
				       $sql = $sql.$customer_id.' and entities_id='.$entities_id. ' and is_deleted = 0 order by name_contacts DESC';						   
							foreach ($pdo->query($sql) as $row) {
                            echo '<tr class="rowcomputer">';
							echo '<td>'. $row['name_contacts'] . " " . $row['firstName_contacts'].'</td>';			
                            echo '<td>'. $row['name_contacttypes'] . '</td>';			
                            echo '<td>'. $row['mobilecust'] . '</td>';								
                            echo '<td>'. $row['phone_contacts'] . '</td>';													
//                              echo '</tr>';
					  if ($_SESSION['profilAccess'] == 'A' || $_SESSION['profilAccess'] == 'S') 
    				  echo '<td width=250>';
					  else echo '<td width=50>';
                            echo '<a class="btn" href="read_cust_contact.php?id='.$row['idcontact'].'">Voir</a>';
                            echo ' ';
							if ($_SESSION['profilAccess'] == 'A' || $_SESSION['profilAccess'] == 'S') {							
                            echo '<a class="btn btn-success" href="update_cust_contact.php?id='.$row['idcontact'].'">Modifier</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="delete_cust_contact.php?id='.$row['idcontact'].'">Supprimer</a>';
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
 