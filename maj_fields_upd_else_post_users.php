<?php
// modification : 25/03/2015
// enlever le state (region) et inverser code postal avec ville

//  echo "maj_fields_upd_else_post_users.php <br>";

// echo "id ===== $id  <br> ";
        $pdo = Database::connect();
	    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$sql = "SELECT * FROM tictan_users where id =?";		
//		echo "sql=$sql <br>";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
		
        $data = $q->fetch(PDO::FETCH_ASSOC);
		$staff_id = $data['staff_id'];
		$profil = $data['profil'];
	    $sqlview = "SELECT * FROM vtictan_users where id =".$data['id'];
//		echo "sqlview=$sqlview ===== <br>";		
    
        $qview = $pdo->prepare($sqlview);
        $qview->execute(array($data['id']));
		
        $dataview = $qview->fetch(PDO::FETCH_ASSOC);		

		$staff_id = $dataview['staff_id'];
		$profil = $dataview['profil'];
		$description = $dataview['description'];
		$userid = $dataview['userid'];
		$password = $dataview['password'];		
		$name = $dataview['name'];
		$firstName = $dataview['firstName'];	
//		$customtype_id = $data['customtype_id'];		
//		$_SESSION["companyname"] = $dataview['companyname'];
//		$_SESSION["customer_name"] = $dataview['customer_name'];
//		$_SESSION["customers_id"] = $dataview['customers_id'];	
//		$_SESSION["contactypename"] = $dataview['contactypename'];

        $mobile = $dataview['mobile'];
        $email = $dataview['email'];
  //      $state = $data['state'];
        $comment = $dataview['comment'];
        $author = $dataview['author'];
        $date_mod = $dataview['date_mod'];
		$is_deleted = $data['is_deleted'];
//		$customtype_id = $data['customtype_id'];
        Database::disconnect();	
?>