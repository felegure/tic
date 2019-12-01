<?php
    session_start();  
    include 'database.php';
    $profil = $_SESSION['profilAccess'];
    $entities_id = 0;
	$customers_id = 0;
  	if ( !empty($_GET['entities_id'])) {
        $entities_id = $_REQUEST['entities_id'];
		$idsaventities=$entities_id;
//		echo "entities_id=$entities_id <br>";
//		echo "idsaventities=$idsaventities <br>";
	} 
		if ( !empty($_GET['customers_id'])) {
        $customers_id = $_REQUEST['customers_id'];
		$customers_idsave=$customers_id;
//		echo "customers_id=$customers_id<br>";
//		echo "customers_idsave=$customers_idsave <br>";
	} 
  if ( !empty($_POST)) {
//  echo "POST submit <br>";
  $customers_id = $_REQUEST['customers_id'];
//	$entities_id = $_REQUEST['entities_id'];
  $pdo = Database::connect();		
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "UPDATE tictan_customers  SET is_deleted=1 WHERE id =".$customers_id;
  $q = $pdo->prepare($sql);
  $q->execute(array($customers_id));	
  $sqls = "SELECT * FROM vtictan_customers where customers_id = ?";
  $qs = $pdo->prepare($sqls);
  $qs->execute(array($customers_id));
  $datas = $qs->fetch(PDO::FETCH_ASSOC);
  $_SESSION["companyname"] = $datas['companyname'];
  $_SESSION["customer_name"] = $datas['customer_name'];
  $_SESSION["entities_id"] = $datas['entities_id'];
  $entities_id=$datas['entities_id'];
  $_SESSION["customers_id"] = $datas['customers_id'];	
  $companyname = $_SESSION["companyname"];
  $customer_name = $_SESSION["customer_name"];
  $username = $_SESSION["username"];
//		$entities_id = $_SESSION["entities_id"];
//		header("Location: customer_list.php?entities_id=$entities_id"); 
//	echo "username=$username <br>";
//  echo "YYYY entities_id=$entities_id <br>";		
	
  Database::disconnect();
//  echo "XXXXXXXXXXentities_id=$entities_id <br>";
//		header("Location: customer_list.php?entities_id=$entities_id");
  header("Location: customer_list.php?entities_id=$entities_id&companyname=$companyname");		
  $id=0;	
  } 
  else { 
//			echo "NOT POST customers_idsave=$customers_idsave <br>";
//			echo "NOT POST idsaventities=$idsaventities <br>";
//	echo "NOT POST_SUBMIT 	idddd=$id iddddsave=$idsave <br>"; 
	//$idsave = $id;
  }
  $pdo = Database::connect();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sqls = "SELECT * FROM vtictan_customers where customers_id = ?";
  $qs = $pdo->prepare($sqls);
  $qs->execute(array($customers_id));
  $datas = $qs->fetch(PDO::FETCH_ASSOC);
  $_SESSION["companyname"] = $datas['companyname'];
  $_SESSION["customer_name"] = $datas['customer_name'];
  $_SESSION["entities_id"] = $datas['entities_id'];
  $entities_id=$datas['entities_id'];
  $_SESSION["customers_id"] = $datas['customers_id'];	
  $companyname = $_SESSION["companyname"];
  $customer_name = $_SESSION["customer_name"];
  $username = $_SESSION["username"];
//		$entities_id = $_SESSION["entities_id"];
//		header("Location: customer_list.php?entities_id=$entities_id"); 
//	echo "username=$username <br>";
//  echo "YYYY entities_id=$entities_id <br>";
	
  Database::disconnect();

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row" align="center">
                        <h3>Suppression d'un Site/Client</h3>
                    </div>
                     
                    <form class="form-horizontal" align="center" action="delete_customers.php?customers_id=<?php echo $customers_id; ?>" method="post">
                      <input type="hidden" name="id" value="<?php echo $customers_id;?>"/>
					  <div class="form-actions" align="center">
                      <p class="alert alert-error">Confirmer la suppression du Site/Client ?</p>
					  </div>
                        <div class="form-actions" align="center">
                      <input name="submit" type="submit" class="btn btn-danger"  onClick='ValidateON()' value="Suppression" >
                          <a class="btn" href="customer_list.php?entities_id=<?php echo $entities_id; ?>">Non</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
 <script language="javascript">	
function ValidateON()
{
 var m="mon texte"; 
 var confirmation=confirm("Confirmez-vous la Suppression?"); 
 // alert ("validateOn");
	
 if (confirmation){ 
  //action à faire pour la valeur true 
 alert ("Enregistrement supprimé");

}
	   
}
</script>
  </body>
</html>