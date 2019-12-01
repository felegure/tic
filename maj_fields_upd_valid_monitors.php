 <?php      
 	   $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM vtictan_customers_monitors where id_monitor=?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);		
		$entities_id = $data['entities_id'];
		$customers_id = $data['customers_id'];
		$_SESSION["companynament"] = $data['companynament'];
		$_SESSION["customer_name"] = $data['customer_name'];
		$_SESSION["entities_id"] = $data['entities_id'];
		$_SESSION["customers_id"] = $data['customers_id'];
		$sql = "UPDATE tictan_customers_monitor set name=?, serial=?,location=?, author =?, 
		comment=?,date_mod=?, is_deleted=? ";
		$sw=1;
        $monitormodels_id0 = $_POST['monitormodels_id0'];
	    $monitormodels_id = $_POST['monitormodels_id'];
//		echo "monitorsmodels_id0= $monitorsmodels_id0<br>";
//		echo "monitorsmodels_id= $monitorsmodels_id   sw=$sw<br>";		
		
	if ($monitormodels_id != '0') 
  	if ($monitormodels_id != $monitormodels_id0) {
    $varmonitormodels_id = $monitormodels_id;
    if ($sw==0) {
	    $sql = $sql." monitormodels_id = $varmonitorsmodels_id ";
//		echo "varmonitorsmodels_id=$varmonitorsmodels_id <br>";
	}
	else {
	   $sql = $sql.",monitormodels_id = $varmonitormodels_id ";
	}
	 $sw=1;
	 }

 // echo "varmonitorsmodels_id=$varmonitormodels_id<br>";

    $monitortypes_id0 = $_POST['monitortypes_id0'];
	$monitortypes_id = $_POST['monitortypes_id'];
//		echo "monitorstypes_id0= $monitorstypes_id0<br>";
//		echo "monitorstypes_id= $monitorstypes_id<br>";		
		
	if ($monitortypes_id != '0') 
  	if ($monitortypes_id != $monitortypes_id0) {
    $varmonitortypes_id = $monitortypes_id;
    if ($sw==0) {
		$sql= $sql." monitortypes_id = $varmonitortypes_id ";
//		echo "varmonitortypes_id=$varmonitortypesid <br>";
	}
	else {
	   $sql = $sql.",monitortypes_id = $varmonitortypes_id ";
	}
	 $sw=1;
	 }
	 
//	 echo " avant varmonitortypes sw = $sw <br>";
// echo "varmonitorstypes_id=$varmonitortypes_id<br>";

  
	$sql = $sql."where id = ".$id;


//	echo "sql=$sql <br>";		
            $q = $pdo->prepare($sql);


	         $q->execute(array( $name, $serial,$location,$author,$comment,$date_mod, $is_deleted));	
       	
        //echo "serial=$serial <br> ";
        Database::disconnect();	
                header("Location: monitor_list.php?type=monitors");
?>