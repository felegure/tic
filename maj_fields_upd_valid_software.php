 <?php      
 	   $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM vtictan_customers_software where id_soft=?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);		
		$entities_id = $data['entities_id'];
		$customers_id = $data['customers_id'];
        $_SESSION["companynament"] = $data['companynament'];
		$_SESSION["customer_name"] = $data['customer_name'];
		$_SESSION["entities_id"] = $data['entities_id'];
		$_SESSION["customer_id"] = $data['customers_id'];			
		$licence = $_POST['licence'];
		$supplier = $_POST['supplier'];
		$editor = $_POST['editor'];			
//		$softmodel_id = $data['softmodel_id'];
//		$softype_id = $data['softype_id'];
//		$namemodel= $data['namemodel'];
//		$nametype= $data['nametype'];
		$comment=$_POST['comment'];
		$users_id=$_POST['users_id'];
		$groups_id=$_POST['groups_id'];
		$author=$_POST['author'];
		$mod_date=$_POST['mod_date'];
		$start_date = $_POST['start_date'];
		$end_date = $_POST['end_date'];
		$is_deleted=$_POST['is_deleted'];

		$sql = "UPDATE tictan_customers_software set name=?, licence=?, editor=?, supplier=?,
		users_id=?, groups_id=?, author =?, comment=?,date_mod=?, start_date=?, end_date=?, is_deleted=? ";
		$sw=1;
        $softmodels_id0 = $_POST['softmodels_id0'];
	    $softmodel_id = $_POST['softmodel_id'];
		
		
	if ($softmodel_id != '0') 
  	if ($softmodel_id != $softmodels_id0) {
    $varsoftmodels_id = $softmodel_id;
    if ($sw==0) {
	    $sql = $sql." softmodel_id = $varsoftmodels_id ";
//		echo "varsoftmodels_id=$varsoftmodels_id <br>";
	}
	else {
	   $sql = $sql.",softmodel_id = $varsoftmodels_id ";
	}
	 $sw=1;
	 }

 // echo "varsoftmodels_id=$varsoftmodels_id<br>";

    $softypes_id0 = $_POST['softypes_id0'];
	$softype_id = $_POST['softype_id'];
//		echo "softypes_id0= $softypes_id0<br>";
//		echo "softypes_id= $softypes_id<br>";		
		
	if ($softype_id != '0') 
  	if ($softype_id != $softypes_id0) {
    $varsoftypes_id = $softype_id;
    if ($sw==0) {
		$sql= $sql." softype_id = $varsoftypes_id ";
//		echo "varsoftypes_id=$varsoftypesid <br>";
	}
	else {
	   $sql = $sql.",softype_id = $varsoftypes_id ";
	}
	 $sw=1;
	 }
	 
//	 echo " avant varsoftypes sw = $sw <br>";
// echo "varsoftypes_id=$varsoftypes_id<br>";

  
	$sql = $sql."where id = ".$id;


//		echo "sql=$sql <br>";		
        $q = $pdo->prepare($sql);

	    $q->execute(array( $name, $licence, $editor, $supplier,$users_id,$groups_id,
		$author,$comment,$mod_date, $start_date, $end_date, $is_deleted));	
        Database::disconnect();	
        header("Location: software_list.php");
?>