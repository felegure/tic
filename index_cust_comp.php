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
include "./entete.php";
?>
    <div class="container">
            <div class="row">
                <h3>Gestion des Contacts/Site</h3>
            </div>
            <div class="row">
                <p>
                    <a href="create_contact.php" class="btn btn-success">Nouveau Contact</a>
                </p>
                <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Raison sociale</th>
						  <th>Nom du site</th>		  
                          <th>Nom</th>	
						   <th>Prénom</th>		   						  
						  <th>Téléphone</th>	
                          <th>Mobile</th>
                          <th>Adresse email</th>
                          <th>Localité</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      include 'database.php';
                       $pdo = Database::connect();					   

					   $sql = 'select idcontact, companynament, customer_name, firstName_contacts, name_contacts, 
						phone_contacts, mobile_contacts, email_contacts, town_contacts from 
						vtictan_customers_contacts where is_deleted_contacts=0 order by name_contacts DESC';					
							foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
							echo '<td>'. $row['companynament'] . '</td>';
                            echo '<td>'. $row['customer_name'] . '</td>';
                            echo '<td>'. $row['name_contacts'] . '</td>';
                            echo '<td>'. $row['firstName_contacts'] . '</td>';									
                            echo '<td>'. $row['phone_contacts'] . '</td>';								
                            echo '<td>'. $row['mobile_contacts'] . '</td>';
                            echo '<td>'. $row['email_contacts'] . '</td>';								
                            echo '<td>'. $row['town_contacts'] . '</td>';								
							echo '<td width=250>';
                            echo '<a class="btn" href="read_contact.php?id='.$row['idcontact'].'">Voir</a>';
                            echo ' ';
                            echo '<a class="btn btn-success" href="update_contact.php?id='.$row['idcontact'].'">Modifier</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="delete_contact.php?id='.$row['idcontact'].'">Supprimer</a>';
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
