<?php

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			// pas de mise a jour de entities_id et customers_id

	$sql = "UPDATE tictan_customer_copiers set name=?, serial=?,adresseip=?,
			typeadressage=?,location=?,users_id=?, groups_id=?,
			author=?, comment=?, date_mod=?, is_deleted=? ";

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

    $os_id0 = $_POST['os_id0'];
   $osvp_id0 = $_POST['osvp_id0'];	


			$sql = $sql."where id = ".$id;


//			echo "sql=$sql <br>";		
            $q = $pdo->prepare($sql);


	        $q->execute(array( $name, $serial,$adresseip,
			$typeadressage,$location,$users_id,$groups_id,
			$author,$comment,$date_mod, $is_deleted));
	
            Database::disconnect();
            header("Location: copier_list.php");
} 
} 

else {

//		echo "Else  <br>";
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM vtictan_customers_copiers where id=?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);		
		$entities_id = $data['entities_idt'];
		$customers_id = $data['customers_id'];
// echo "customers_id=$customers_id <br> ";
		$name = $data['name'];
		echo "name=$name <br>";
		$serial = $data['serial'];
		$customer_name = $data['customer_name'];
		$companynament = $data['companynament'];	
		$_SESSION["companynament"] = $data['companynament'];
		$_SESSION["customer_name"] = $data['customer_name'];
		$_SESSION["entities_id"] = $data['entities_id'];
		$_SESSION["customer_id"] = $data['customers_id'];
		
		$copiersmodels_id = $data['copiersmodels_id'];
		$copierstypes_id = $data['copierstypes_i'];
		$namemlodel = $data['modelname'];
		$nametype = $data['nametype'];
		$adresseip=$data['adresseip'];
		$typeadressage=$data['typeadressage'];
		$location=$data['location'];
		$comment=$data['comment'];
		$users_id=$data['users_id'];
		$groups_id=$data['groups_id'];
		$author=$data['author'];
		$date_mod=$data['date_mod'];
		$is_deleted=$data['is_deleted'];
/*
echo "serial=$serial <br> ";
echo "osvp_id=$osvp_id <br> ";
echo "os_id=$os_id <br> ";
echo "copiersmodels_id=$copiersmodels_id <br> ";
echo "copierstypes_id=$copierstypes_id <br> ";
 */    Database::disconnect();	

    }
?>