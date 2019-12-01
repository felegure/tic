 <?php      
 	$pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //  $sql = "SELECT * FROM vtictan_cust_comp_virtuels where id=?";
  //  $q = $pdo->prepare($sql);
  //  $q->execute(array($id));
  //  $data = $q->fetch(PDO::FETCH_ASSOC);		
//	$entities_id = $data['entities_id'];
//	$customers_id = $data['customers_id'];
//	$computers_id = $data['computers_id'];
//	$_SESSION["companyname"] = $data['companyname'];
//	$_SESSION["customer_name"] = $data['customer_name'];
//	$_SESSION["pcname"] = $data['pcname'];	
//	$_SESSION["entities_id"] = $data['entities_id'];
//	$_SESSION["customers_id"] = $data['customers_id'];	
//	$_SESSION["computers_id"] = $data['computers_id'];	
	echo "MMM customers_id = $customers_id, entities_id=$entities_id, computers_id=$computers_id <br> ";
	$sql = "UPDATE tictan_cust_comp_virdrive set drivename=?, password=?, comment=?,author=?, date_mod=?,is_deleted=? ";	
	$sql = $sql."where id = ".$id.";";
	echo "XXXXXXXXXXXXXXXX sql=$sql <br>";		
       $q = $pdo->prepare($sql);
 echo "1 drivename=$drivename , 2. password=$password, 3. comment=$comment , 5.date_mod=$date_mod  , 4.author=$author , sql=$sql <br>";

	    $q->execute(array( $drivename, $password, $comment, $author, $date_mod, $is_deleted));	

        Database::disconnect();	
 //       header("Location: virtuel_list.php");
 	header ("Location: index_cust_comp_virtuels.php?entities_id=$entities_id&companyname=$companyname 1&computers_id=$computers_id&type=virtuels");
?>