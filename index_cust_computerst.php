<?php
if(!isset($_SESSION['flag'])) {
//session_start();
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
</head>
 
<body>

<div class="container">
	<div class="row">
			<p>
			</p>

<?php
 // index_cust_computerst.php               
				$profil = $_SESSION['profilAccess'];
                $inclure='./entete'.$profil.'.php';
		        include_once $inclure ;

?>
	</div>
 </div>
    <div class="container">
            <div class="row">
                <h4>Liste des Clients/Site</h4> 
            </div>
            <div class="row">
                
                <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Nom Entité/Client</th>
						  <th>Nom du Client/site</th>		  
						   <th>Adresse</th>		   						  
						  <th>Localité</th>	
                          <th>Mobile</th>
                          <th>Adresse email</th>
						</tr>
                      </thead>
                      <tbody>
                      <?php
                      include 'database.php';
                       $pdo = Database::connect();					   
	
				$sql = 'select customers_id, entities_id, companyname, customer_name, address, 
				town, mobile, email from vtictan_customers 
				where is_deleted=0 order by customer_name';	
							foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
							echo '<td>'. $row['companyname'] . '</td>';

echo '<td>'.'<a href="index_cust.php?customers_id='.$row['customers_id'].'&customer_name='.$row["customer_name"].'&entities_id='.$row['entities_id'].'&companyname='.$row['companyname'].'&first=0'.'">'. $row["customer_name"]. '</a>'. '</td>';	
                            echo ' ';			
                            echo '<td>'. $row['address'] . '</td>';
                            echo '<td>'. $row['town'] . '</td>';									
                            echo '<td>'. $row['mobile'] . '</td>';								
                            echo '<td>'. $row['email'] . '</td>';
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
