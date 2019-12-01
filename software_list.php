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

				$profil = $_SESSION['profilAccess'];
                $inclure='./entete'.$profil.'.php';
//				echo "inclure = $inclure <br>";
		        include_once $inclure ;
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
				if (empty($companynament)) {
				$companynament = $_SESSION["companynament"] ;
				}
				if (empty($entities_id)) {
				$entities_id = $_SESSION["entities_id"] ;
				}				
//				echo "companynament = $companynament <br>";
				if (empty($customer_id)) {
				$customer_id = $_SESSION["customer_id"] ;
				}				
				if (empty($customer_name)) {
				$customer_name = $_SESSION["customer_name"] ;
				}
				if (empty($companynament)) {
				$companynament = $_SESSION["companynament"] ;
				}					
				
			?>			
            </div>
            <div class="row">
            <p>
			</p>
			<p>
			<?php
			if ($_SESSION['profilAccess'] == 'A' || $_SESSION['profilAccess'] == 'S') 		
			echo '<a href="create_cust_software.php?entities_id=$entities_id&companynament=$companynament&customer_id=$customer_id&customer_name=$customer_name" class="btn btn-success">Ajout logiciel</a>';
			else
			echo '<a href="create_cust_software.php?entities_id=$entities_id&companynament=$companynament&customer_id=$customer_id&customer_name=$customer_name" onClick="ValidateON()" class="btn btn-success">Ajout logiciel</a>';
            ?>				
             </p>
                <table class="table table-striped table-bordered" >
                      <thead>
                        <tr class="rowcomputer">
                          <th>Nom du logiciel</th>
						  <th>Type de logiciel</th>		  
						  <th>Licence</th>	
						  <th>Editeur</th>	
                          <th>Date début</th>
                          <th>Date fin</th>					   					  
						  <th>Action</th>
                      </thead>
                      <tbody>					  
                      <?php
                      include 'database.php';
                      $pdo = Database::connect();					   
						echo "<h5> Liste des Logiciels du Client $companynament / $customer_name </h5>";
	 		      
                        $sql = 'select * from vtictan_customers_software 
					    where customers_id='; 
				        $sql = $sql.$customer_id.' and entities_id='.$entities_id. ' and is_deleted = 0 order by namesoft DESC';				   

							foreach ($pdo->query($sql) as $row) {
                            echo '<tr class="rowcomputer">';
							echo '<td>'. $row['namesoft'] . '</td>';			
                            echo '<td>'. $row['nametype'] . '</td>';			
                            echo '<td>'. $row['licencesoft'] . '</td>';
                            echo '<td>'. $row['editorsoft'] . '</td>';									
                            echo '<td>'. $row['start_date'] . '</td>';								
                            echo '<td>'. $row['end_date'] . '</td>';																					
//                            echo '</tr>';
					        if ($_SESSION['profilAccess'] == 'A' || $_SESSION['profilAccess'] == 'S') 
    				        echo '<td width=250>';
					        else echo '<td width=50>';
                            echo '<a class="btn" href="read_cust_softwares.php?id='.$row['id_soft'].'">Voir</a>';
                            echo ' ';
				            if ($_SESSION['profilAccess'] == 'A' || $_SESSION['profilAccess'] == 'S') {				
                            echo '<a class="btn btn-success" href="update_cust_softwares.php?id='.$row['id_soft'].'">Modifier</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="delete_cust_softwares.php?id='.$row['id_soft'].'">Supprimer</a>';
                            } 
                            echo '</td>';							
                            echo '</tr>';
                       }
                       Database::disconnect();
					   
                      ?>
					  
                      </tbody>
                </table>
        <div class="form-actions">
                          <a class="btn" href="index_cust_choose.php?entities_id=<?php echo $entities_id; ?>&type=softwares">Retour</a>
                       </div>				
        </div>				
        </div>
    </div> <!-- /container -->
<script language="javascript">	
function ValidateON()
{
 var m="mon texte"; 
 alert ("Pas d'accès a cette fonctionalité");   
}
</script>	
  </body>
</html>
