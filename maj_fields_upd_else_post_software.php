<?php

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM vtictan_cust_comp_soft where id=?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);		
		$entities_id = $data['entities_id'];
		$customers_id = $data['customers_id'];
// echo "customers_id=$customers_id <br> ";
		$name = $data['namesoft'];
//		echo "name=$name <br>";
	
		$customer_name = $data['customer_name'];
		$companynament = $data['companynament'];		
        $_SESSION["companynament"] = $data['companynament'];
		$_SESSION["customer_name"] = $data['customer_name'];
		$_SESSION["entities_id"] = $data['entities_id'];
		$_SESSION["customers_id"] = $data['customers_id'];	
		$_SESSION["computers_id"] = $data['computers_id'];			
		$pcname = $data['pcname'];		
		$comment=$data['comment'];
		$author=$data['author'];
		$date_mod=$data['date_mod'];
		$is_deleted=$data['is_deleted'];
	    $softmodels_id = $data['softmodels_id'];
		$softypes_id = $data['softypes_id'];		

		$namemodel = $data['namemodel'];
		$nametype = $data['nametype'];
		$licence = $data['licence'];
		$supplier = $data['supplier'];
		$editor = $data['editor'];		
		$author=$data['author'];
		$start_date = $data['start_date'];
		$end_date = $data['end_date'];
		
        Database::disconnect();	


?>