<?php
// echo "maj_fields_upd_else_post_accessories.php <br>";
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM vtictan_customers_accessories where id=?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);		
		$entities_id = $data['entities_id'];
		$customers_id = $data['customers_id'];
		//
		$_SESSION["companynament"] = $data['companynament'];
		$_SESSION["customer_name"] = $data['customer_name'];
		$_SESSION["entities_id"] = $data['entities_id'];
		$_SESSION["customers_id"] = $data['customers_id'];		
//		
// echo "customers_id=$customers_id <br> ";
		$name = $data['name'];
//	echo "name=$name <br>";
	
		$customer_name = $data['customer_name'];
		$companynament = $data['companynament'];		
		$serial = $data['serial'];	
		$accessorymodels_id = $data['accessorymodels_id'];
		$accessorytypes_id = $data['accessorytypes_id'];
		$namemodel= $data['namemodel'];
		$nametype= $data['nametype'];
		$comment=$data['comment'];
		$author=$data['author'];
		$date_mod=$data['date_mod'];
		$is_deleted=$data['is_deleted'];
		$location = $data['location'];

        Database::disconnect();	


?>