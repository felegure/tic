<?php

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			// pas de mise a jour de entities_id et customers_id

	$sql = "UPDATE tictan_customers_accessories set name=?, serial=?,location=?,
			author=?, comment=?, date_mod=?, is_deleted=? ";

	$sw=1;
    $accessorymodels_id0 = $_POST['accessorymodels_id0'];
	$accessorymodels_id = $_POST['accessorymodels_id'];

	if ($accessorymodels_id != '0') 
  	if ($accessorymodels_id != $accessorytmodels_id0) {
    $varaccessorymodels_id = $accessorymodels_id;
    if ($sw==0) {
		$sql = $sql." accessorymodels_id = $varaccessorymodels_id ";
//		echo "varaccessorymodels_id=$varaccessorymodels_id <br>";
	}
	else {
	   $sql = $sql.",accessorymodels_id = $varaccessorymodels_id ";
	}
	 $sw=1;
	 }

 // echo "varaccessorymodels_id=$varaccessorymodels_id<br>";

    $accessorytypes_id0 = $_POST['accessorytypes_id0'];
	$accessorytypes_id = $_POST['accessorytypes_id'];
//		echo "accessorytypes_id0= $accessorytypes_id0<br>";
//		echo "accessorytypes_id= $accessorytypes_id<br>";		
		
	if ($accessorytypes_id != '0') 
  	if ($accessorytypes_id != $accessorytypes_id0) {
    $varaccessorytypes_id = $accessorytypes_id;
    if ($sw==0) {
		$sql= $sql." accessorytypes_id = $varaccessorytypes_id ";
//		echo "varaccessorytypes_id=$varaccessorytypes_id <br>";
	}
	else {
	   $sql = $sql.",accessorytypes_id = $varaccessorytypes_id ";
	}
	 $sw=1;
	 }
	 
//	 echo " avant varaccessorytypes sw = $sw <br>";
// echo "varaccessorytypes_id=$varaccessorytypes_id<br>";



			$sql = $sql."where id = ".$id;


//			echo "sql=$sql <br>";		
            $q = $pdo->prepare($sql);


	        $q->execute(array( $name, $serial,$location,$author,$comment,$date_mod, $is_deleted));
	
            Database::disconnect();
            header("Location: accessories_list.php");
} 
} 

else {

//		echo "Else  <br>";
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM vtictan_customers_accessories where id=?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);		
		$entities_id = $data['entities_idt'];
		$customers_id = $data['customers_id'];
// echo "customers_id=$customers_id <br> ";		
		$name = $data['name'];
		$customer_name = $data['customer_name'];
		$companynament = $data['companynament'];		
		$customer_name = $data['customer_name'];
		$entities_id = $data['entities_id'];
		$customers_id = $data['customers_id'];
		$namemodel = $data['namemodel'];
		$nametype = $data['nametype'];
		$serial = $data['serial'];
		$accessorymodels_id = $data['accessorymodels_id'];
		$accessorytypes_id = $data['accessorytypes_id'];
		$comment=$data['comment'];
		$author=$data['author'];
		$date_mod=$data['date_mod'];
		$is_deleted=$data['is_deleted'];
        Database::disconnect();	

    }
?>