 <?php   
echo "maj_fields_upd_valid_softs.php <br>"; 
 	$pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM vtictan_cust_comp_soft where id=?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);		
	$entities_id = $data['entities_id'];
	$customers_id = $data['customers_id'];
	$computers_id = $data['computers_id'];
	$_SESSION["companyname"] = $data['companyname'];
	$_SESSION["customer_name"] = $data['customer_name'];
	$_SESSION["pcname"] = $data['pcname'];	
	$_SESSION["entities_id"] = $data['entities_id'];
	$_SESSION["customers_id"] = $data['customers_id'];	
	$_SESSION["computers_id"] = $data['computers_id'];	

	$sql = "UPDATE tictan_cust_comp_soft set name=?, editor=?,supplier=?, licence=?,start_date=?, end_date=?,
	comment=?,author=?, date_mod=?,is_deleted=? ";
		
	$sw=1;
    
	 $softmodels_id0 = $_POST['softmodels_id0'];
	    $softmodels_id = $_POST['softmodels_id'];
		echo "XXXXXXXXXX softmodels_id0= $softmodels_id0<br>";
		echo "XXXXXXXXXX softmodels_id= $softmodels_id   sw=$sw<br>";		
		
	if ($softmodels_id != '0') 
  	if ($softmodels_id != $softmodels_id0) {
    $varsoftmodels_id = $softmodels_id;
    if ($sw==0) {
	    $sql = $sql." softmodels_id = $varsoftmodels_id ";
		echo "varsoftmodels_id=$varsoftmodels_id <br>";
	}
	else {
	   $sql = $sql.",softmodels_id = $varsoftmodels_id ";
	}
	 $sw=1;
	}

 // echo "varsoftmodels_id=$varsoftmodels_id<br>";

    $softypes_id0 = $_POST['softypes_id0'];
	$softypes_id = $_POST['softypes_id'];
		echo "softypes_id0= $softypes_id0<br>";
	echo "softypes_id= $softypes_id<br>";		
		
	if ($softypes_id != '0') 
  	if ($softypes_id != $softypes_id0) {
    $varsoftypes_id = $softypes_id;
    if ($sw==0) {
		$sql= $sql." softypes_id = $varsoftypes_id ";
//		echo "varsoftypes_id=$varsoftypesid <br>";
	}
	else {
	   $sql = $sql.",softypes_id = $varsoftypes_id ";
	}
	 $sw=1;
	 }
	 
//	 echo " avant varsoftypes sw = $sw <br>";
// echo "varsoftypes_id=$varsoftypes_id<br>";
echo "id vzut quoi meme=$id <br>";
	$sql = $sql."where id = ".$id;

		echo "sql=$sql <br>";		
        $q = $pdo->prepare($sql);

 // echo "1. $name,2. $serial,3. $supplier , 4.0 $softmodels_id, 4. $softypes_id, 5. $partition1, 6. $partition2, 7. $partition3, comment=$comment , date_mod=$date_mod  , author=$author <br>";

	$q->execute(array( $name, $editor,$supplier,$licence, $start_date, $end_date, $comment, $author, $date_mod, $is_deleted));	
  //echo "serial=$serial <br> ";
        Database::disconnect();	
  //      header("Location: softs_list.php");
		header ("Location: index_cust_comp_softs.php?entities_id=$entities_id&companyname=$companyname 1&computers_id=$computers_id&type=softs");
?>