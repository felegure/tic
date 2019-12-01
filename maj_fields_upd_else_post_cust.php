<?php
// modification : 25/03/2015
// enlever le state (region) et inverser code postal avec ville

// echo "maj_fields_upd_else_post_cust.php <br>";

// echo "id ===== $id  <br> ";
        $pdo = Database::connect();
	    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//		$sqlview = "SELECT * FROM tictan_customers where id =".$id;
		$sqlview = "SELECT * FROM tictan_customers where id =".$customers_id;		
//		echo "sqlview=$sqlview <br>";
        $qview = $pdo->prepare($sqlview);
        $qview->execute(array($customers_id));
//        $qview->execute(array($id));		
        $dataview = $qview->fetch(PDO::FETCH_ASSOC);
		$id_entities = $dataview['entities_id'];
		$customtype_id = $dataview['customtype_id'];	
//		echo "id_entities=$id_entities ,,,  customtype_id=$customtype_id <br>";
//	    $sql = "SELECT * FROM vtictan_customers where entities_id = $id_entities and customers_id=$id";
	    $sql = "SELECT * FROM vtictan_customers where entities_id = $id_entities and customers_id=$customers_id";
//		echo "sql=$sql ===== <br>";		
    
    $q = $pdo->prepare($sql);
        $q->execute(array($customers_id));
		
        $data = $q->fetch(PDO::FETCH_ASSOC);		
		$entities_id = $data['entities_id'];
		$customers_id = $data['customers_id'];
		$customer_name = $data['customer_name'];
		$companyname = $data['companyname'];
//		$customtype_id = $data['customtype_id'];		
		$_SESSION["companyname"] = $data['companyname'];
		$_SESSION["customer_name"] = $data['customer_name'];
		$_SESSION["customers_id"] = $data['customers_id'];		
    
		$phone = $data['phone'];
        $mobile = $data['mobile'];
        $fax = $data['fax'];
        $email = $data['email'];
        $website = $data['website'];
        $address = $data['address'];
        $postcode = $data['postcode'];
        $town = $data['town'];
  //      $state = $data['state'];
        $country = $data['country'];
        $comment = $data['comment'];
        $author = $data['author'];
        $date_mod = $data['date_mod'];
		$is_deleted = $data['is_deleted'];
//		$customtype_id = $data['customtype_id'];
		$customtype_name = $data['customtype_name'];
        Database::disconnect();	
?>