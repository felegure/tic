<?php

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			// pas de mise a jour de entities_id et customers_id

	$sql = "UPDATE tictan_customer_computers set pcname=?, serial=?,processor=?,ram=?,hdd=?,
			cartegraph=?,domainame=?,sessioname=?,spassword=?,teamv_logname=?,adresseip=?,
			typeadressage=?,connexionvia=?,location=?, comment=?, users_id=?, groups_id=?,
			author=?, comment=?, mod_date=?, is_deleted=? ";

	$sw=1;
    $computermodels_id0 = $_POST['computermodels_id0'];
	$computermodels_id = $_POST['computermodels_id'];
//		echo "computermodels_id0= $computermodels_id0<br>";
//		echo "computermodels_id= $computermodels_id   sw=$sw<br>";		
		
	if ($computermodels_id != '0') 
  	if ($computermodels_id != $computermodels_id0) {
    $varcomputermodels_id = $computermodels_id;
    if ($sw==0) {
		$sql = $sql." computermodels_id = $varcomputermodels_id ";
//		echo "varcomputermodels_id=$varcomputermodels_id <br>";
	}
	else {
	   $sql = $sql.",computermodels_id = $varcomputermodels_id ";
	}
	 $sw=1;
	 }

 // echo "varcomputermodels_id=$varcomputermodels_id<br>";

    $computertypes_id0 = $_POST['computertypes_id0'];
	$computertypes_id = $_POST['computertypes_id'];
//		echo "computertypes_id0= $computertypes_id0<br>";
//		echo "computertypes_id= $computertypes_id<br>";		
		
	if ($computertypes_id != '0') 
  	if ($computertypes_id != $computertypes_id0) {
    $varcomputertypes_id = $computertypes_id;
    if ($sw==0) {
		$sql= $sql." computertypes_id = $varcomputertypes_id ";
//		echo "varcomputertypes_id=$varcomputertypesid <br>";
	}
	else {
	   $sql = $sql.",computertypes_id = $varcomputertypes_id ";
	}
	 $sw=1;
	 }
	 
//	 echo " avant varcomputertypes sw = $sw <br>";
// echo "varcomputertypes_id=$varcomputertypes_id<br>";

    $os_id0 = $_POST['os_id0'];
   $osvp_id0 = $_POST['osvp_id0'];	
	$computertypes_id = $_POST['computertypes_id'];
/*
		echo "computertypes_id0= $os_id0<br>";
		echo "os_id= $os_id<br>";		
		echo "osvp_id= $osvp_id<br>";	
*/	
	if ($os_id != '0') 
  	if ($os_id != $os_id0) {
    $varos_id = $os_id;
    if ($sw==0) {
		$sql = $sql." os_id = $varos_id ";
//		echo "varos_id=$varos_id <br>";
	}
	else {
	   $sql = $sql.",os_id = $varos_id ";
	}
	 $sw=1;
	 }


// echo "varos_id=$varos_id<br>";


    $osvp_id0 = $_POST['osvp_id0'];
	$osvp_id = $_POST['osvp_id'];
//		echo "osvp_id0= $osvp_id0<br>";
//		echo "osvp_id= $osvp_id<br>";		
		
	if ($osvp_id != '0') 
  	if ($osvp_id != $osvp_id0) {
    $varosvp_id = $osvp_id;
    if ($sw==0) {
		$sql = $sql." osvp_id = $varosvp_id ";
//		echo "varosvp_id=$varosvp_id <br>";
	}
	else {
	   $sql = $sql.",osvp_id = $varosvp_id ";
	}
	 $sw=1;
	 }
//  echo "varosvp_id=$varosvp_id<br>";
			$sql = $sql."where id = ".$id;


			echo "sql=$sql <br>";		
            $q = $pdo->prepare($sql);
	        $q->execute(array( $pcname, $serial,$processor,$ram,$hdd,
			$cartegraph,$domainame,$sessioname,$spassword,$teamv_logname,$adresseip,
			$typeadressage,$connexionvia,$location,$comment,$users_id,$groups_id,
			$author,$comment,$mod_date, $is_deleted));
	
            Database::disconnect();
            header("Location: index_cust_choose.php?type=computers");
} 
} 

else {

//		echo "Else  <br>";
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM vtictan_customers_computers where idcust=?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);		
		$entities_id = $data['entities_idcust'];
		$customers_id = $data['customers_idcust'];
		$_SESSION["companynament"] = $data['companynament'];
		$_SESSION["customer_name"] = $data['customer_name'];
		$_SESSION["entities_id"] = $data['entities_idcust'];
		$_SESSION["customer_id"] = $data['customers_idcust'];	
// echo "customers_id=$customers_id <br> ";
		$pcname = $data['pcnamecust'];
//		echo "pcname=$pcname <br>";
		$serial = $data['serialcust'];
		$customer_name = $data['customer_name'];
		$companynament = $data['companynament'];		
		$processor = $data['processorcust'];
		$ram = $data['ramcust'];
		$hdd = $data['hddcust'];
		$cartegraph = $data['cartegraphcust'];
		$computermodels_id = $data['computermodels_idcust'];
		$computertypes_id = $data['computertypes_idcust'];
		$namemodel= $data['modelnamecust'];
		$nametype= $data['typenamecust'];
        $osname=$data['osname'];
		$osvpname=$data['osvpname'];
        $os_id=$data['os_idcust'];
		$osvp_id=$data['osvp_idcust'];		
		$domainame=$data['domainamecust'];
		$sessioname=$data['sessionamecust'];
		$spassword=$data['spasswordcust'];
		$teamv_logname=$data['tlognamecust'];
		$adresseip=$data['adresseipcust'];
		$typeadressage=$data['typeadressagecust'];
		$connexionvia=$data['connexionviacust'];
		$location=$data['locationcust'];
		$comment=$data['commentcust'];
		$users_id=$data['users_id'];
		$groups_id=$data['groups_id'];
		$author=$data['authorcust'];
		$mod_date=$data['mod_datecust'];
		$is_deleted=$data['isdeletedcust'];   
        Database::disconnect();	

    }
?>