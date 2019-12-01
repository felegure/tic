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

	
<title>Customer_list </title>
<style type="text/css">
<!--
.Style25 {
	font-size: 16px;
	color: #000099;
	font-weight: bold;
}
.Style31 {color: #000000}
-->
<!--
.Style1 {
	font-size: 18px;
	color: #0000FF;
	font-weight: bold;
}
.Style19 {
	font-size: 18px;
	color: #006600;
	font-weight: bold;
}
.Style21 {font-size: 9px}
.Style22 {color: #000033 ;
font-size:12px}
.Style23 {color: #00CC66}
.Style24 {color: #000066}
.Style30 {color: #000099; font-weight: bold; }
.Style32 {color: #000000; font-weight: bold; }
-->
</style>	
</head>
<body>
<form class="form-horizontal" name="computer_list" action="computer_list.php?entities_id=$entities_id" method="post">  

<div class="container">
	<div class="row">
	<p>
	</p>
	<?php              
	$profil = $_SESSION['profilAccess'];
    $inclure='./entete'.$profil.'.php';
    include $inclure ;
//	$entities_id=$_SESSION["entities_id"] ;
//    $entities_id = null;
    if ( !empty($_GET['entities_id'])) {
    $entities_id  = $_REQUEST['entities_id'];
//	echo "entities_id=$entities_id <br>";
	include 'database.php';				
	$pdo = Database::connect();
	if ($entities_id > 0)
    $sql = "SELECT * FROM tictan_customers WHERE entities_id=".$entities_id ." and is_deleted = 0 ORDER BY customer_name";
  // 	echo "sql = $sql <br>";			
  //    echo "1.  entities_id=$entities_id <br>";
	else 
$sql=" SELECT * FROM tictan_customers WHERE is_deleted = 0 ORDER BY customer_name";	
    }
		if ( !empty($_GET['companyname'])) {
        $companyname = $_REQUEST['companyname'];
		$companyname_save=$companyname;
//		echo "companyname=$companyname<br>";
//		echo "companyname_save=$companyname_save <br>";
	}
    else {
	$companyname=$_SESSION["companyname"] ;
//	echo "EMPTY companyname=$companyname <br>";	
	}
	?>
	</div>
</div>
    <div class="container">
            <div class="row">
                <h3>Gestion de Client/Site</h3>
             		
			
			<?php
			if ($_SESSION['profilAccess'] == 'A' || $_SESSION['profilAccess'] == 'S') 
// echo '<a class="btn" href="read_customers.php?customers_id='.$row['id'].'">Voir</a>';			
			echo '<a class="btn btn-success"  href="create_customers.php?entities_id='.$entities_id.'&companyname='.$companyname.'" >Nouveau site</a>';
			else
			echo '<a href="create_customers.php" onClick="ValidateON()" class="btn btn-success">Nouveau site</a>';
            ?>	

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

	              if ( !empty($_GET['entities_id'])) {
                   $entities_id  = $_REQUEST['entities_id'];
//				   echo "Xentities_id = $entities_id <br>";
			
	               $pdo = Database::connect();
				   if ($entities_id > 0)
                   $sql = "SELECT * FROM tictan_customers WHERE entities_id=".$entities_id ." and is_deleted = 0 ORDER BY customer_name";
				    else 
					$sql=" SELECT * FROM tictan_customers WHERE is_deleted = 0 ORDER BY customer_name";	
//				  echo "sql = $sql <br>";			
				      
//	             echo "1.  entities_id=$entities_id <br>";

				  $profil = $_SESSION['profilAccess'];
//				  echo " index_cust ====>  profil = $profil entities_id=$entities_id<br>";

                  foreach ($pdo->query($sql) as $row) {
                      echo '<tr>';
                      echo '<td>'. $row['customer_name'] . '</td>';
                      echo '<td>'. $row['address'] . '</td>';
                      echo '<td>'. $row['town'] . '</td>';								
                      echo '<td>'. $row['phone'] . '</td>';								
                      echo '<td>'. $row['email'] . '</td>';
					  if ($_SESSION['profilAccess'] == 'A' || $_SESSION['profilAccess'] == 'S') 
    				  echo '<td width=250>';
					  else echo '<td width=50>';
                      echo '<a class="btn" href="read_customers.php?customers_id='.$row['id'].'">Voir</a>';
                      echo ' ';
					  if ($_SESSION['profilAccess'] == 'A' || $_SESSION['profilAccess'] == 'S') {
                      echo '<a class="btn btn-success" href="update_customers.php?customers_id='.$row['id'].'">Modifier</a>';
                      echo ' ';
                      echo '<a class="btn btn-danger" href="delete_customers.php?customers_id='.$row['id'].'&entities_id='.$row['entities_id'].'">Supprimer</a>';
					  }
					  echo '</td>';
                      echo '</tr>';
                      }
					   
					 } 
					   
 //                     Database::disconnect();
                      ?>
                      </tbody>
                </table>
        </div>
    </div> <!-- /container -->
</form>

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
