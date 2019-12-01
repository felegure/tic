<?php
// modification : 25/03/2015
// enlever le state (rejion) et inverser code postal avec ville
echo "maj_fields_upd_post_cust.php <br>";
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			// pas de mise a jour de entities_id et customers_id

	     if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE tictan_customers set customtype_id=?, customer_name = ?, phone = ?, mobile =? ,fax = ?,email = ?, website = ?,
			address = ? ,postcode = ? ,	town = ?, country = ?,comment = ?,
			author = ?, mod_date = ?, is_deleted = ? WHERE id = ?";		
	

	$sw=1;
    $customtype_id0 = $_POST['customtype_id0'];
	$customtype_id = $_POST['customtype_id'];
//	echo "customtype_id_id0= $customtype_id_id0<br>";
//		echo "customtype_id= $customtype_id   sw=$sw<br>";		
		
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

			$sql = $sql."where id = ".$id;
			
			$q = $pdo->prepare($sql);
            $q->execute(array($customtype_id,  $customer_name, $phone, $mobile, $fax, $email, $website,
			$address, $postcode, $town, $country, $comment, $author, $mod_date, $is_deleted, $id));
            Database::disconnect();
			      
            header("Location: index_cust.php");
} 

else {

//		echo "Else  <br>";
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM vtictan_customers where idencust=".$id;
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);		
//		$entities_id = $data['entities_id'];
		$customers_id = $data['customers_id'];
		$_SESSION["companynament"] = $data['companynament'];
		$_SESSION["customer_name"] = $data['customer_name'];
//		$_SESSION["entities_id"] = $data['entities_id'];
		$_SESSION["customer_id"] = $data['customers_id'];	

		$phone = $data['phone'];
        $mobile = $data['mobile'];
        $fax = $data['fax'];
        $email = $data['email'];
        $website = $data['website'];
        $address = $data['address'];
        $postcode = $data['postcode'];
        $town = $_$data['town'];
 //       $state = $data['state'];
        $country = $data['country'];
        $comment = $data['comment'];
        $author = $data['author'];
        $mod_date = $data['mod_date'];
		$is_deleted = $data['is_deleted'];
		$customtype_id = $data['customtype_id'];
		$namecustomtype = $data['namecustomtype'];
		
        Database::disconnect();	

    }
?>