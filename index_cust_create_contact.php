
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
</head>
 
<body>
<div class="container">
	<div class="row">

	<?php
 // contact_all_list.php               
				$profil = $_SESSION['profilAccess'];
                $inclure='./entete'.$profil.'.php';
		        include_once $inclure ;
	?>
	</div>
</div>
    <div class="container">
            <div class="row">
                <h4>Création des contacts/Site</h3>
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
                      </thead>
                      <tbody>
                      <?php
                     include 'database.php';
                       $pdo = Database::connect();					   
	
//				   $sql = 'select customers_id, entities_id,companyname, customer_name, address, town, 
//				   mobile, email from vtictan_customers where is_deleted = 0 order by companyname, customer_name ';	
				   $sql='select * from vtictan_customers where is_deleted=0 order by companyname, customer_name';
							foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
							echo '<td>'. $row['companyname'] . '</td>';
//
//  ici on va tester les droits 
//
echo '<td>'.'<a href="create_cust_contact.php?customers_id='.$row['customers_id'].'&customer_name='.$row["customer_name"].'&entities_id='.$row['entities_id'].'&companyname='.$row['companyname'].'&first=0'.'">'. $row["customer_name"]. '</a>'. '</td>';	
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
