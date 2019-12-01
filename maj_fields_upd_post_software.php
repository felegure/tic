<?php

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			// pas de mise a jour de entities_id et customers_id

	$sql = "UPDATE tictan_customer_software set name=?, serial=?,location=?,users_id=?, groups_id=?,
			author=?, comment=?, date_mod=?, is_deleted=? ";

	$sw=1;
    $softmodels_id0 = $_POST['softmodels_id0'];
	$softmodel_id = $_POST['softmodel_id'];
//		echo "softmodels_id0= $softmodels_id0<br>";
//		echo "softmodels_id= $softmodel_id   sw=$sw<br>";		
		
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
	   $sql = $sql.",softypes_id = $varsoftypes_id ";
	}
	 $sw=1;
	 }
	 
//	 echo " avant varsoftypes sw = $sw <br>";
// echo "varsoftypes_id=$varsoftypes_id<br>";

    $os_id0 = $_POST['os_id0'];
   $osvp_id0 = $_POST['osvp_id0'];	


			$sql = $sql."where id = ".$id;


//			echo "sql=$sql <br>";		
            $q = $pdo->prepare($sql);


	        $q->execute(array( $name, $serial,$adresseip,
			$typeadressage,$connexionvia,$location,$users_id,$groups_id,
			$author,$comment,$date_mod, $is_deleted));
	
            Database::disconnect();
            header("Location: software_list.php");
} 
} 

else {

		echo "Else  <br>";
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM vtictan_customers_software where id_software=?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);		
		$entities_id = $data['entities_idt'];
		$customers_id = $data['customers_id'];
// echo "customers_id=$customers_id <br> ";		
		$name = $data['namesoft'];
		$customer_name = $data['customer_name'];
		$companynament = $data['companynament'];	
        $_SESSION["companynament"] = $data['companynament'];
		$_SESSION["customer_name"] = $data['customer_name'];
		$_SESSION["entities_id"] = $data['entities_id'];
		$_SESSION["customer_id"] = $data['customers_id'];			
		$customer_name = $data['customer_name'];
		$entities_id = $data['entities_id'];
		$customers_id = $data['customers_id'];
		$namemodel = $data['namemodel'];
		$nametype = $data['nametype'];
		$softmodel_id = $data['softmodel_id'];
		$softype_id = $data['softype_id'];
		$namemodel = $data['namemodel'];
		$licencesoft = $data['licencesoft'];
		$suppliersoft = $data['suppliersoft'];
		$editorsoft = $data['editorsoft'];		
		$comment=$data['comment'];
		$users_id=$data['users_id'];
		$groups_id=$data['groups_id'];
		$author=$data['author'];
		$mod_date=$data['date_mod'];
		$start_date = $data['start_date'];
		$end_date = $data['end_date'];
		$is_deleted=$data['is_deleted'];
        Database::disconnect();	

    }
?>