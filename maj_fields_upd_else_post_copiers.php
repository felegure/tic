<?php

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM vtictan_customers_copiers where id=?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);		
		$entities_id = $data['entities_id'];
		$customers_id = $data['customers_id'];
// echo "customers_id=$customers_id <br> ";
		$name = $data['name'];
//		echo "name=$name <br>";
		$serial = $data['serial'];
		$customer_name = $data['customer_name'];
		$companynament = $data['companynament'];	
        $_SESSION["companynament"] = $data['companynament'];
		$_SESSION["customer_name"] = $data['customer_name'];
		$_SESSION["entities_id"] = $data['entities_id'];
		$_SESSION["customers_id"] = $data['customers_id'];				
		$copiersmodels_id = $data['copiersmodels_id'];
		$copierstypes_id = $data['copierstypes_id'];
		$namemodel= $data['namemodel'];
		$nametype= $data['nametype'];
		$adresseip=$data['adresseip'];
		$typeadressage=$data['typeadressage'];
		$location=$data['location'];
		$comment=$data['comment'];
		$author=$data['author'];
		$mod_date=$data['date_mod'];
		$is_deleted=$data['is_deleted'];
 
 //       Database::disconnect();	


?>