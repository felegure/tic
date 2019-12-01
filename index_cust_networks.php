
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
			<p>
			</p>

<?php
 // index_cust_network.php               
				$profil = $_SESSION['profilAccess'];
                $inclure='./entete'.$profil.'.php';
		        include_once $inclure ;

?>
	</div>
 </div>

    <div class="container">
            <div class="row">
                <h4>Gestion des equipements reseaux/Site</h3>
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
	
				   $sql = 'select ident, idencust, entities_id,companynament, customer_name, addresscust, towncust, mobilecust, emailcust from vtictan_customers 
				   where is_deletecust=0 order by customer_name DESC';	
							foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
							echo '<td>'. $row['companynament'] . '</td>';
$_SESSION["companynament"] = $row['companynament'];

echo '<td>'.'<a href="network_list.php?customer_id='.$row['idencust'].'&customer_name='.$row["customer_name"].'&entities_id='.$row['entities_id'].'&companynament='.$row['companynament'].'&first=0'.'">'. $row["customer_name"]. '</a>'. '</td>';	
                            echo ' ';			
                            echo '<td>'. $row['addresscust'] . '</td>';
                            echo '<td>'. $row['towncust'] . '</td>';									
                            echo '<td>'. $row['mobilecust'] . '</td>';								
                            echo '<td>'. $row['emailcust'] . '</td>';
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
