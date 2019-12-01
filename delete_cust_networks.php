<?php
  session_start();   
  include 'database.php';
  $profil = $_SESSION['profilAccess'];
  
  $id = 0;
  	if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
		$idsave=$id;
	} 

	if(isset($_POST['submit'])){
		$id = $_REQUEST['id'];
		$pdo = Database::connect();		
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE tictan_customer_network  SET is_deleted=1 WHERE id =".$id;
        $q = $pdo->prepare($sql);
        $q->execute(array($id));	
		Database::disconnect();
		header("Location: index_cust_choose.php?entities_id=$entities_id&type=networks");
		$id=0;
		
    } 
	else { 
	$idsave = $id;
    }
	$pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sqls = "SELECT * FROM vtictan_customers_network where id_network = ?";
		$qs = $pdo->prepare($sqls);
		$qs->execute(array($id));
        $datas = $qs->fetch(PDO::FETCH_ASSOC);
		$_SESSION["companynament"] = $datas['companynament'];
		$_SESSION["customer_name"] = $datas['customer_name'];
		$_SESSION["entities_id"] = $datas['entities_id'];
		$_SESSION["customers_id"] = $datas['customers_id'];	
		$companynament = $_SESSION["companynament"];
		$customer_name = $_SESSION["customer_name"];
		$username = $_SESSION["username"];
		$entities_id = $_SESSION["entities_id"];
//	echo "username=$username <br>";
//		echo "entities_id=$entities_id <br>";
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
                        <h3>Suppression d'un equipement reseau</h3>
                    </div>
                     
                    <form class="form-horizontal" action="delete_cust_networks.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $id;?>"/>
                      <p class="alert alert-error"  align="center">Confirmer la suppression de l'equipement ?</p>
                      <div class="form-actions"  align="center">
                          <input name="submit" type="submit" class="btn btn-danger"  onClick='ValidateON()' value="Suppression" >
		               <a class="btn" href="network_list.php?entities_id=<?php echo $entities_id; ?> &type=networks">Non</a>				  

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