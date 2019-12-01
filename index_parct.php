<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
            <div class="row">
                <h3>GESTION DU PARC CLIENT</h3>
            </div>
            <div class="row">
                <p>
                    <a href="create_cust.php" class="btn btn-success">Ajout du Parc</a>
                </p>
                <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Client/Site</th>
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
                       $sql = 'SELECT * FROM tictan_customers WHERE is_deleted = 0 ORDER BY id DESC';
                       foreach ($pdo->query($sql) as $row) {
                                echo '<tr>';
								/* <td><a href='#'>$Nom</a></td> */
                    //   echo '<td>'.  '< a href="parc_list.php?id='.$row['id'].'&customer_id='.$row['entities_id'].'">  $row["customer_name"]  '</a>';
					      echo '<td>'.  '< a href="parc_list.php?id='.$row['id'].'&customer_id='.$row['entities_id'].'"> '. $row["customer_name"] . '</a>' 
								. '</td>';								
                                echo '<td>'. $row['address'] . '</td>';
                                echo '<td>'. $row['town'] . '</td>';								
                                echo '<td>'. $row['phone'] . '</td>';								
                                echo '<td>'. $row['email'] . '</td>';
								echo '<td width=250>';
                                echo '<a class="btn" href="read_cust.php?id='.$row['id'].'">Voir</a>';
                                echo ' ';
                                echo '<a class="btn btn-success" href="update_cust.php?id='.$row['id'].'">Modifier'. $row["id"]. '</a>';
                                echo ' ';
                                echo '<a class="btn btn-danger" href="delete_cust.php?id='.$row['id'].'">Supprimer</a>';
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
