 <?php      
 	$pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM vtictan_cust_comp_disk where id=?";
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

	$sql = "UPDATE tictan_cust_comp_disk set name=?, serial=?,supplier=?, partition1=?, partition2=?,partition3=?,
	comment=?,author=?, date_mod=?,is_deleted=? ";
		
	$sw=1;
    
	 $diskmodels_id0 = $_POST['diskmodels_id0'];
	    $diskmodels_id = $_POST['diskmodels_id'];
		echo "diskmodels_id0= $diskmodels_id0<br>";
		echo "diskmodels_id= $diskmodels_id   sw=$sw<br>";		
		
	if ($diskmodels_id != '0') 
  	if ($diskmodels_id != $diskmodels_id0) {
    $vardiskmodels_id = $diskmodels_id;
    if ($sw==0) {
	    $sql = $sql." diskmodels_id = $vardiskmodels_id ";
//		echo "vardiskmodels_id=$vardiskmodels_id <br>";
	}
	else {
	   $sql = $sql.",diskmodels_id = $vardiskmodels_id ";
	}
	 $sw=1;
	}

 // echo "vardiskmodels_id=$vardiskmodels_id<br>";

    $disktypes_id0 = $_POST['disktypes_id0'];
	$disktypes_id = $_POST['disktypes_id'];
		echo "disktypes_id0= $disktypes_id0<br>";
	echo "disktypes_id= $disktypes_id<br>";		
		
	if ($disktypes_id != '0') 
  	if ($disktypes_id != $disktypes_id0) {
    $vardisktypes_id = $disktypes_id;
    if ($sw==0) {
		$sql= $sql." disktypes_id = $vardisktypes_id ";
//		echo "vardisktypes_id=$vardisktypesid <br>";
	}
	else {
	   $sql = $sql.",disktypes_id = $vardisktypes_id ";
	}
	 $sw=1;
	 }
	 
//	 echo " avant vardisktypes sw = $sw <br>";
// echo "vardisktypes_id=$vardisktypes_id<br>";
echo "id vzut quoi meme=$id <br>";
	$sql = $sql."where id = ".$id;

		echo "sql=$sql <br>";		
        $q = $pdo->prepare($sql);

 echo "1. $name,2. $serial,3. $supplier , 4.0 $diskmodels_id, 4. $disktypes_id, 5. $partition1, 6. $partition2, 7. $partition3, comment=$comment , date_mod=$date_mod  , author=$author <br>";
	
	$q->execute(array( $name, $serial,$supplier,$partition1, $partition2, $partition3, $comment, $author, $date_mod, $is_deleted));	
  //echo "serial=$serial <br> ";
        Database::disconnect();	
  //      header("Location: disk_list.php");
		header ("Location: index_cust_comp_disks.php?entities_id=$entities_id&companyname=$companyname 1&computers_id=$computers_id&type=disks");
?>