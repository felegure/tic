<?php
  //   echo "maj_fields_upd_valid_comp.php";

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			// pas de mise a jour de entities_id et customers_id

	$sql = "UPDATE tictan_customers_computers set pcname=?, serial=?,processor=?, ram=?,domain_name=?,session_admin_name=?, 
	session_admin_pwd=?, session_user_name=?, session_user_pwd=?,teamv_logname=?,teamv_pwd=?, adresseip=?,adressrange=?,
	mask=?,bridge=?,location=?,comment=?, author=?, date_mod=?, is_deleted=?";
			
	$sw=1;
    $computermodels_id0 = $_POST['computermodels_id0'];
	$computermodels_id = $_POST['computermodels_id'];
		echo "computermodels_id0= $computermodels_id0<br>";
		echo "computermodels_id= $computermodels_id   sw=$sw<br>";		
	$id = 	$_POST['id'];
//	echo "id ====$id <br>";
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

//  echo "varcomputermodels_id=$varcomputermodels_id<br>";

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
	
// echo " avant varcomputertypes sw = $sw <br>";
// echo "varcomputertypes_id=$varcomputertypes_id<br>";
	$computertypes_id = $_POST['computertypes_id'];
//  echo "varosvp_id=$varosvp_id<br>";
// echo "id=$id <br>";
			$sql = $sql."where id = ".$id;
//			echo "sql=$sql <br>";		
            $q = $pdo->prepare($sql);
 
/* 
	$sql = "UPDATE tictan_customers_computers set pcname=?, serial=?,processor=?, ram=?,domain_name=?,session_admin_name=?, 
	session_admin_pwd=?, session_user_name=?, session_user_pwd=?,teamv_logname=?,teamv_pwd=?, adresseip=?,
			location=?,comment=?, author=?, date_mod=?, is_deleted=?";
 */
	        $q->execute(array( $pcname, $serial, $processor, $ram,$domain_name,
			$session_admin_name, $session_admin_pwd, $session_user_name, $session_user_pwd,$teamv_logname,
			$teamv_pwd, $adresseip,$adressrange,$mask,$bridge,$location,$comment, $author, $date_mod, $is_deleted));
			
	    	$_SESSION["companyname"] = $data['companyname'];
	    	$_SESSION["customer_name"] = $data['customer_name'];
	    	$_SESSION["entities_id"] = $data['entities_id'];
	    	$_SESSION["customers_id"] = $data['customers_id'];	
			$entities_id =  $_SESSION["entities_id"] ;
			$customers_id =  $_SESSION["customers_id"]  ;
			$companyname = $_SESSION["companyname"];
            Database::disconnect();
           header("Location: computer_comp_list.php?entities_id=$entities_id&customers_id=$customers_id&companyname=$companyname&type=computers_comp");

?>