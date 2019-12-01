<?php
// modification : 25/03/2015
// enlever le state (rejion) et inverser code postal avec ville
  //     require 'maj_fields_upd_cust.php';
  
//     echo "maj_fields_upd_valid_contacts.php <br>";
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM tictan_customers_contacts where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($contacts_id));
        $datar = $q->fetch(PDO::FETCH_ASSOC);
		$entities_id = $datar['entities_id'];
		$customers_id = $datar['customers_id'];
		$contactttypes_id = $datar['contacttypes_id'];	
//		echo "contactttypes_id=$contactttypes_id <br>";
	    $sql = "SELECT * FROM vtictan_customers_contacts where entities_id = $entities_id 
		and customers_id=".$customers_id. " and id=".$contacts_id;
//  echo "2eme sql=$sql <br>";				
        $q = $pdo->prepare($sql);
        $q->execute(array($contacts_id));
        $data = $q->fetch(PDO::FETCH_ASSOC);		
		$entities_id = $data['entities_id'];
		$customers_id = $data['customers_id'];
//		$name = $data['name'];		
		$contactypename = $data['contactypename'];
		$customer_name = $_POST['customer_name'];
		$companyname = $data['companyname'];
//		$contacttypes_id = $data['contacttypes_id'];		
		$_SESSION["companyname"] = $data['companyname'];
		$_SESSION["customer_name"] = $data['customer_name'];
		$_SESSION["customers_id"] = $data['customers_id'];		
  		$_SESSION["contacttypes_id"] = $data['contacttypes_id'];	
		$name = $_POST['name'];
		$firstName = $_POST['firstName'];
		//		echo "name=$name,,,, firstName=$firstName <br>";
		$phone = $_POST['phone'];
        $mobile = $_POST['mobile'];
        $fax = $_POST['fax'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $postcode = $_POST['postcode'];
        $town = $_POST['town'];

        $comment = $_POST['comment'];
        $author = $_POST['author'];
        $date_mod = $_POST['date_mod'];

//	$contacttypes_name=$dataview['contacttypes_name'];
//	echo "contacttypes_name=$contacttypes_name <br>";
//	echo "entities_id=$entities_id <br>";	
 	
	
	$sql = "UPDATE tictan_customers_contacts set  name = ?, firstName = ?, phone = ?, mobile =? ,fax = ?,email = ?, address = ?,
	postcode = ? ,	town = ?,comment = ?, author = ?, date_mod = ? ";		

	$sw=1;
    $contacttypes_id0 = $_POST['contacttypes_id0'];
	$contacttypes_id = $_POST['contacttypes_id'];  	
	if ($contacttypes_id != '0') 
  	if ($contacttypes_id != $contacttypes_id0) {
    $varcontacttypes_id = $contacttypes_id;
    if ($sw==0) {
		$sql = $sql." contacttypes_id = $varcontacttypes_id ";
//		echo "varcontacttypes_id_id=$varcontacttypes_id <br>";
	}
	else {
	   $sql = $sql.",contacttypes_id = $varcontacttypes_id ";
	}
	 $sw=1;
	 }	
		$sql = $sql."where id = ".$contacts_id;

// 		echo "contacttypes_id = $contacttypes_id <br>";
			$q = $pdo->prepare($sql);
//			echo "1$customer_name 2$phone 3$mobile 4$fax 5$email 6$website 7$address 
	//		8$postcode 9$town 10$country 11$comment 12$author 13$date_mod <br>";
            $q->execute(array( $name, $firstName,  $phone, $mobile, $fax, $email, 
			$address, $postcode, $town,$comment, $author, $date_mod));
	
	
            Database::disconnect();
            header("Location: contact_all_list.php?entities_id=$entities_id&companyname=$companyname");
?>