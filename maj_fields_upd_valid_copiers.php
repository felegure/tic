 <?php      
 	   $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM vtictan_customers_copiers where id=?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);		
		$entities_id = $data['entities_id'];
		$customers_id = $data['customers_id'];
        $_SESSION["companynament"] = $data['companynament'];
		$_SESSION["customer_name"] = $data['customer_name'];
		$_SESSION["entities_id"] = $data['entities_id'];
		$_SESSION["customers_id"] = $data['customers_id'];	
		
		$sql = "UPDATE tictan_customers_copiers set name=?, serial=?,location=?, author =?, 
		comment=?,date_mod=?, is_deleted=? ";
		$sw=1;
        $copiersmodels_id0 = $_POST['copiersmodels_id0'];
	    $copiersmodels_id = $_POST['copiersmodels_id'];
//		echo "copiersmodels_id0= $copiersmodels_id0<br>";
//		echo "copiersmodels_id= $copiersmodels_id   sw=$sw<br>";		
		
	if ($copiersmodels_id != '0') 
  	if ($copiersmodels_id != $copiersmodels_id0) {
    $varcopiersmodels_id = $copiersmodels_id;
    if ($sw==0) {
	    $sql = $sql." copiersmodels_id = $varcopiersmodels_id ";
//		echo "varcopiersmodels_id=$varcopiersmodels_id <br>";
	}
	else {
	   $sql = $sql.",copiersmodels_id = $varcopiersmodels_id ";
	}
	 $sw=1;
	 }

 // echo "varcopiersmodels_id=$varcopiersmodels_id<br>";

    $copierstypes_id0 = $_POST['copierstypes_id0'];
	$copierstypes_id = $_POST['copierstypes_id'];
//		echo "copierstypes_id0= $copierstypes_id0<br>";
//		echo "copierstypes_id= $copierstypes_id<br>";		
		
	if ($copierstypes_id != '0') 
  	if ($copierstypes_id != $copierstypes_id0) {
    $varcopierstypes_id = $copierstypes_id;
    if ($sw==0) {
		$sql= $sql." copierstypes_id = $varcopierstypes_id ";
//		echo "varcopierstypes_id=$varcopierstypesid <br>";
	}
	else {
	   $sql = $sql.",copierstypes_id = $varcopierstypes_id ";
	}
	 $sw=1;
	 }
	 
//	 echo " avant varcopierstypes sw = $sw <br>";
// echo "varcopierstypes_id=$varcopierstypes_id<br>";

  
	$sql = $sql."where id = ".$id;


//		echo "sql=$sql <br>";		
            $q = $pdo->prepare($sql);


	        $q->execute(array( $name, $serial,$location,$author,$comment,$date_mod, $is_deleted));	
       	
        //echo "serial=$serial <br> ";
        Database::disconnect();	
        header("Location: copier_list.php");
?>