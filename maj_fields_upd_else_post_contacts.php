<?php
// modification : 25/03/2015
// enlever le state (region) et inverser code postal avec ville

//  echo "maj_fields_upd_else_post_contacts.php <br>";

// echo "id ===== $id  <br> ";
        $pdo = Database::connect();
	    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql = "SELECT * FROM tictan_customers_contacts where id =".$contacts_id;		
//		echo "sql=$sql <br>";
        $q = $pdo->prepare($sql);
        $q->execute(array($contacts_id));
		
        $data = $q->fetch(PDO::FETCH_ASSOC);
		$id_entities = $data['entities_id'];
		$customers_id = $data['customers_id'];
		$contacttypes_id = $data['contacttypes_id'];	
//		echo "apres select dans tictan_customers_contacts id_entities=$id_entities ,,,  customers_id=$customers_id,, contacttypes_id=$contacttypes_id  <br>";
//	    $sql = "SELECT * FROM vtictan_customers where entities_id = $id_entities and customers_id=$id";
	    $sqlview = "SELECT * FROM vtictan_customers_contacts where entities_id = $id_entities and customers_id=$customers_id
		and id=".$data['id'];
//		echo "sqlview=$sqlview ===== <br>";		
    
        $qview = $pdo->prepare($sqlview);
        $qview->execute(array($data['id']));
		
        $dataview = $qview->fetch(PDO::FETCH_ASSOC);		
		$entities_id = $dataview['entities_id'];
		$customers_id = $dataview['customers_id'];
		$contactypename = $dataview['contactypename'];
		$customer_name = $dataview['customer_name'];
		$companyname = $dataview['companyname'];
		$name = $dataview['name'];
		$firstName = $dataview['firstName'];	
//		$customtype_id = $data['customtype_id'];		
		$_SESSION["companyname"] = $dataview['companyname'];
		$_SESSION["customer_name"] = $dataview['customer_name'];
		$_SESSION["customers_id"] = $dataview['customers_id'];	
		$_SESSION["contactypename"] = $dataview['contactypename'];
    
		$phone = $dataview['phone'];
        $mobile = $dataview['mobile'];
        $fax = $data['fax'];
        $email = $dataview['email'];
        $address = $dataview['address'];
        $postcode = $dataview['postcode'];
        $town = $data['town'];
  //      $state = $data['state'];
        $comment = $dataview['comment'];
        $author = $dataview['author'];
        $date_mod = $dataview['date_mod'];
		$is_deleted = $data['is_deleted'];
//		$customtype_id = $data['customtype_id'];
		$contactypename = $dataview['contactypename'];
        Database::disconnect();	
?>