<?php

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			// pas de mise a jour de entities_id et customers_id

	$sql = "UPDATE tictan_customer_coprinters set name=?, serial=?,adresseip=?,
			typeadressage=?,connexionvia=?,location=?,users_id=?, groups_id=?,
			author=?, comment=?, date_mod=?, is_deleted=? ";

	$sw=1;
    $coprintersmodels_id0 = $_POST['coprintersmodels_id0'];
	$coprintersmodels_id = $_POST['coprintersmodels_id'];
//		echo "coprintersmodels_id0= $coprintersmodels_id0<br>";
//		echo "coprintersmodels_id= $coprintersmodels_id   sw=$sw<br>";		
		
	if ($coprintermodels_id != '0') 
  	if ($coprintermodels_id != $coprintermodels_id0) {
    $varcoprintermodels_id = $coprintermodels_id;
    if ($sw==0) {
		$sql = $sql." coprintermodels_id = $varcoprintermodels_id ";
//		echo "varcoprintermodels_id=$varcoprintermodels_id <br>";
	}
	else {
	   $sql = $sql.",coprintermodels_id = $varcoprintermodels_id ";
	}
	 $sw=1;
	 }

 // echo "varcoprintermodels_id=$varcoprintermodels_id<br>";

    $coprintertypes_id0 = $_POST['coprintertypes_id0'];
	$coprintertypes_id = $_POST['coprintertypes_id'];
//		echo "coprintertypes_id0= $coprintertypes_id0<br>";
//		echo "coprintertypes_id= $coprintertypes_id<br>";		
		
	if ($coprintertypes_id != '0') 
  	if ($coprintertypes_id != $coprintertypes_id0) {
    $varcoprintertypes_id = $coprintertypes_id;
    if ($sw==0) {
		$sql= $sql." coprintertypes_id = $varcoprintertypes_id ";
//		echo "varcoprintertypes_id=$varcoprintertypesid <br>";
	}
	else {
	   $sql = $sql.",coprintertypes_id = $varcoprintertypes_id ";
	}
	 $sw=1;
	 }
	 
//	 echo " avant varcoprintertypes sw = $sw <br>";
// echo "varcoprintertypes_id=$varcoprintertypes_id<br>";

    $os_id0 = $_POST['os_id0'];
   $osvp_id0 = $_POST['osvp_id0'];	


			$sql = $sql."where id = ".$id;


//			echo "sql=$sql <br>";		
            $q = $pdo->prepare($sql);


	        $q->execute(array( $name, $serial,$adresseip,
			$typeadressage,$connexionvia,$location,$users_id,$groups_id,
			$author,$comment,$date_mod, $is_deleted));
	
            Database::disconnect();
            header("Location: index_cust_coprinters.php");
} 
} 

else {

//		echo "Else  <br>";
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM vtictan_customers_coprinters where id_coprinters=?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);		
		$entities_id = $data['entities_idt'];
		$customers_id = $data['customers_id'];
// echo "customers_id=$customers_id <br> ";
		$name = $data['nameprinters'];
		echo "name=$name <br>";
		$serial = $data['serial_coprinters'];
		$customer_name = $data['customer_name'];
		$companynament = $data['companynament'];	
	   	$_SESSION["companynament"] = $data['companynament'];
	   	$_SESSION["customer_name"] = $data['customer_name'];
	   	$_SESSION["entities_id"] = $data['entities_id'];
	   	$_SESSION["customer_id"] = $data['customers_id'];			
		$coprintermodels_id = $data['coprintermodels_idcust'];
		$coprintertypes_id = $data['coprintertypes_idcust'];
		$nametype = $data['modelname'];
		$namename = $data['nametype'];
		$adresseip=$data['adresseip'];
		$typeadressage=$data['typeadressage'];
		$connexionvia=$data['connexionvia'];
		$location=$data['location'];
		$comment=$data['comment'];
		$users_id=$data['users_id'];
		$groups_id=$data['groups_id'];
		$author=$data['author'];
		$date_mod=$data['mod_date'];
		$is_deleted=$data['is_deleted'];

        Database::disconnect();	

    }
?>