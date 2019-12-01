<?php
// modification : 25/03/2015
// enlever le state (rejion) et inverser code postal avec ville
  //     require 'maj_fields_upd_cust.php';
  
 echo "maj_fields_upd_valid_cust.php <br>";
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM tictan_customers where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($customers_id));
        $datar = $q->fetch(PDO::FETCH_ASSOC);
		$entities_id = $datar['entities_id'];
		
		$customtype_id = $datar['customtype_id'];	
//		echo "customtype_id=$customtype_id <br>";
	    $sql = "SELECT * FROM vtictan_customers where entities_id = $entities_id
		and customers_id=".$customers_id;
// echo "2eme sql=$sql <br>";				
        $q = $pdo->prepare($sql);
        $q->execute(array($customers_id));
        $data = $q->fetch(PDO::FETCH_ASSOC);		
		$entities_id = $data['entities_id'];
		$customers_id = $data['customers_id'];
		$customer_name = $_POST['customer_name'];
		$companyname = $data['companyname'];
//		$customtype_id = $data['customtype_id'];		
		$_SESSION["companyname"] = $data['companyname'];
		$_SESSION["customer_name"] = $data['customer_name'];
		$_SESSION["customers_id"] = $data['customers_id'];		
    
		$phone = $_POST['phone'];
        $mobile = $_POST['mobile'];
        $fax = $_POST['fax'];
        $email = $_POST['email'];
        $website = $_POST['website'];
        $address = $_POST['address'];
        $postcode = $_POST['postcode'];
        $town = $_POST['town'];
  //      $state = $_POST['state'];
        $country = $_POST['country'];
        $comment = $_POST['comment'];
        $author = $_POST['author'];
        $date_mod = $_POST['date_mod'];
//		$is_deleted = $_POST['is_deleted'];
//		$customtype_id = $_POST['customtype_id'];
		$customtype_name = $data['customtype_name'];
			
	
	
	
//	$customtype_name=$dataview['customtype_name'];
//	echo "customtype_name=$customtype_name <br>";
//	echo "entities_id=$entities_id <br>";	
 	
	
	$sql = "UPDATE tictan_customers set  customer_name = ?, phone = ?, mobile =? ,fax = ?,email = ?, website = ?,
			address = ? ,postcode = ? ,	town = ?, country = ?,comment = ?,
			author = ?, date_mod = ? ";		

	$sw=1;
    $customtype_id0 = $_POST['customtype_id0'];
	$customtype_id = $_POST['customtype_id'];  	
	if ($customtype_id != '0') 
  	if ($customtype_id != $customtype_id0) {
    $varcustomtype_id = $customtype_id;
    if ($sw==0) {
		$sql = $sql." customtype_id = $varcustomtype_id ";
//		echo "varcustomtype_id_id=$varcustomtype_id <br>";
	}
	else {
	   $sql = $sql.",customtype_id = $varcustomtype_id ";
	}
	 $sw=1;
	 }	
		$sql = $sql."where id = ".$customers_id;

		echo "sql=$sql <br>";		
// 		echo "customtype_id = $customtype_id <br>";
			$q = $pdo->prepare($sql);
//			echo "1$customer_name 2$phone 3$mobile 4$fax 5$email 6$website 7$address 
	//		8$postcode 9$town 10$country 11$comment 12$author 13$date_mod <br>";
            $q->execute(array( $customer_name, $phone, $mobile, $fax, $email, $website,
			$address, $postcode, $town, $country, $comment, $author, $date_mod));
		
            Database::disconnect();
           header("Location: customer_list.php?entities_id=$entities_id	");
?>