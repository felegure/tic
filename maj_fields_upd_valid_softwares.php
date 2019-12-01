 <?php      
 	$pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM vtictan_cust_comp_soft where id=?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);		
	$entities_id = $data['entities_id'];
	$customers_id = $data['customers_id'];
	$_SESSION["companynament"] = $data['companynament'];
	$_SESSION["customer_name"] = $data['customer_name'];
	$_SESSION["entities_id"] = $data['entities_id'];
	$_SESSION["customer_id"] = $data['customers_id'];	
	$_SESSION["computers_id"] = $data['computers_id'];		
	$_SESSION["pcname"] = $data['pcname'];			
	$sql = "UPDATE tictan_cust_comp_soft set name=?, licence=?,editor=?, supplier=?, softmodels_id, softypes_id=?,
	start_date=?, end_date=?, comment=?,author=?, date_mod=?,is_deleted=? ";
		
	$sw=1;
    
	 $softmodels_id0 = $_POST['softmodels_id0'];
	    $softmodels_id = $_POST['softmodels_id'];
//		echo "softmodels_id0= $softmodels_id0<br>";
//		echo "softmodels_id= $softmodels_id   sw=$sw<br>";		
		
	if ($softmodels_id != '0') 
  	if ($softmodels_id != $softmodels_id0) {
    $varsoftmodels_id = $softmodels_id;
    if ($sw==0) {
	    $sql = $sql." softmodels_id = $varsoftmodels_id ";
//		echo "varsoftmodels_id=$varsoftmodels_id <br>";
	}
	else {
	   $sql = $sql.",softmodels_id = $varsoftmodels_id ";
	}
	 $sw=1;
	}

 // echo "varsoftmodels_id=$varsoftmodels_id<br>";

    $softtypes_id0 = $_POST['softypes_id0'];
	$softypes_id = $_POST['softypes_id'];
//		echo "softypes_id0= $softypes_id0<br>";
//		echo "softypes_id= $softypes_id<br>";		
		
	if ($softypes_id != '0') 
  	if ($softypes_id != $softypes_id0) {
    $varsoftypes_id = $softypes_id;
    if ($sw==0) {
		$sql= $sql." softypes_id = $varsoftypes_id ";
//		echo "varsoftypes_id=$varsoftypesid <br>";
	}
	else {
	   $sql = $sql.",softtypes_id = $varsofttypes_id ";
	}
	 $sw=1;
	 }
	 
//	 echo " avant varsoftypes sw = $sw <br>";
// echo "varsoftypes_id=$varsofypes_id<br>";

	$sql = $sql."where id = ".$id;


//		echo "sql=$sql <br>";		
        $q = $pdo->prepare($sql);
// echo "comment=$comment , mod_date=$mod_date  , author=$author <br>";

	    $q->execute(array( $name, $licence,$editor,$supplier,$softmodels_id, $softypes_id,$start_date,$end_date,
		$comment, $author, $date_mod, $is_deleted));	

        Database::disconnect();	
        header("Location: soft_list.php");
?>