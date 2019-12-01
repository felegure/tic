<?php      
 	   $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM vtictan_customers_coprinters where id=?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);		
		$entities_id = $data['entities_id'];
		$customers_id = $data['customers_id'];
     	$_SESSION["companynament"] = $data['companynament'];
	   	$_SESSION["customer_name"] = $data['customer_name'];
	   	$_SESSION["entities_id"] = $data['entities_id'];
	   	$_SESSION["customer_id"] = $data['customers_id'];		
		$sql = "UPDATE tictan_customers_coprinters set name=?, serial=?,adresseip=?, typeadressage =?, 
		location=?, author =?, comment=?,date_mod=?, is_deleted=? ";
		$sw=1;
        $coprintersmodels_id0 = $_POST['coprintersmodels_id0'];
	    $coprintersmodels_id = $_POST['coprintersmodels_id'];
//		echo "coprintersmodels_id0= $coprintersmodels_id0<br>";
//		echo "coprintersmodels_id= $coprintersmodels_id   sw=$sw<br>";		
		
	if ($coprintersmodels_id != '0') 
  	if ($coprintersmodels_id != $coprintersmodels_id0) {
    $varcoprintersmodels_id = $coprintersmodels_id;
    if ($sw==0) {
	    $sql = $sql." coprintersmodels_id = $varcoprintersmodels_id ";
//		echo "varcoprintersmodels_id=$varcoprintersmodels_id <br>";
	}
	else {
	   $sql = $sql.",coprintersmodels_id = $varcoprintersmodels_id ";
	}
	 $sw=1;
	 }

 // echo "varcoprintersmodels_id=$varcoprintersmodels_id<br>";

    $coprinterstypes_id0 = $_POST['coprinterstypes_id0'];
	$coprinterstypes_id = $_POST['coprinterstypes_id'];
//		echo "coprinterstypes_id0= $coprinterstypes_id0<br>";
//		echo "coprinterstypes_id= $coprinterstypes_id<br>";		
		
	if ($coprinterstypes_id != '0') 
  	if ($coprinterstypes_id != $coprinterstypes_id0) {
    $varcoprinterstypes_id = $coprinterstypes_id;
    if ($sw==0) {
		$sql= $sql." coprinterstypes_id = $varcoprinterstypes_id ";
//		echo "varcoprinterstypes_id=$varcoprinterstypesid <br>";
	}
	else {
	   $sql = $sql.",coprinterstypes_id = $varcoprinterstypes_id ";
	}
	 $sw=1;
	 }
	 
//	 echo " avant varcoprinterstypes sw = $sw <br>";
// echo "varcoprinterstypes_id=$varcoprinterstypes_id<br>";

  
	$sql = $sql."where id = ".$id;


//		echo "sql=$sql <br>";		
            $q = $pdo->prepare($sql);

	        $q->execute(array( $name, $serial,$adresseip,$typeadressage,$location,
			$author,$comment,$date_mod, $is_deleted));	
       	
        //echo "serial=$serial <br> ";
        Database::disconnect();	
        header("Location: printer_list.php");
?>