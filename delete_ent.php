<?php
    session_start();
    include 'database.php';
	$profil = $_SESSION['profilAccess'];
    $id = 0;
     
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
		$idsave=$id;
    }
    echo "                 id=$id <br>"; 
//	if(isset($_POST['submit'])){
	if(isset($_POST)){	
	echo "              dans POST <br>";
        $id = $_REQUEST['id'];       // keep track post values     
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE tictan_entities  SET is_deleted=1 WHERE id =".$id;
		echo "sql=$sql <br>";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
 //       header("Location: index_ent.php");
        $id=0;       
    }
	else { 
	
	$idsave = $id;
	echo " idsave  = $idsave <br>";
    }
	$pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sqls = "SELECT * FROM tictan_entities where id =".$id;
		echo "sqls=$sqls <br>";
		$qs = $pdo->prepare($sqls);
		$qs->execute(array($id));
        $datas = $qs->fetch(PDO::FETCH_ASSOC);
		$_SESSION["companyname"] = $datas['companyname'];
//		$_SESSION["customer_name"] = $datas['customer_name'];
//		$_SESSION["entities_id"] = $datas['entities_id'];
//		$_SESSION["customers_id"] = $datas['customers_id'];	
//		$companyname = $_SESSION["companyname"];
//		$customer_name = $_SESSION["customer_name"];
		$username = $_SESSION["username"];
//		$entities_id = $_SESSION["entities_id"];
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
                    <div class="row">
                        <h3>Suppression d'une Entité/Client</h3>
                    </div>
                     
                    <form class="form-horizontal" action="delete_ent.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $id;?>"/>
                      <p class="alert alert-error">Confirmer la suppression de l'Entité/Client ?</p>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-danger">Oui</button>
                          <a class="btn" href="index_ent.php">Non</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>