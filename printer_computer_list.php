


<?php
// computer_list.php
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
			 <a href="create_cust_printers.php?entities_id=$entities_id&companynament=$companynament&customer_id=$customer_id&customer_name=$customer_name" class="btn btn-success">Ajout ordinateur</a>
             </p>
                <table class="table table-striped table-bordered" >
                      <thead>
                        <tr class="rowcomputer">
                          <th>Imprimante</th>
						  <th>Modèle</th>		  
						  <th>Numero de serie</th>	
                          <th>Adresse ip</th>					   
						  <th>Localisation</th>						  
						  <th>Action</th>
                      </thead>
                      <tbody>
                      <?php
                      include 'database.php';
                       $pdo = Database::connect();					   
echo "<h5> Liste des Imprimantes du Client  $companynament / $customer_name </h5>";
//				   $sql = 'select * from vtictan_customers_computers 
//					   where customers_idcust=$customer_id and entities_idcust=$entities_id order by pcnamecust DESC';	 
//				   where customers_idcust=$customer_id and entities_idcust=$entities_id order by pcnamecust DESC';	 


			   $sql = 'select * from vtictan_customers_coprinters 
				   where isdeleted=0 order by namecoprinters DESC';	 

							foreach ($pdo->query($sql) as $row) {
                            echo '<tr class="rowcomputer">';
							echo '<td>'. $row['namecoprinters'] . '</td>';			
                            echo '<td>'. $row['name_model'] . '</td>';																	
                            echo '<td>'. $row['adresseipcust'] . '</td>';
                            echo '<td>'. $row['location'] . '</td>';																					
//                            echo '</tr>';
							echo '<td width=250>';
                           echo '<a class="btn" href="read_cust_printers.php?idcust='.$row['customers_idcust'].'">Voir</a>';
                            echo ' ';
                            echo '<a class="btn btn-success" href="update_cust_printers.php?idcust='.$row['customers_idcust'].'">Modifier</a>';
                            echo ' ';
                           echo '<a class="btn btn-danger" href="delete_cust_printers.php?idcust='.$row['customers_idcust'].'">Supprimer</a>';
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
