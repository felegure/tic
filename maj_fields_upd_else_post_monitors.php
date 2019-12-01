<?php
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM vtictan_customers_monitors where id_monitor=?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);		
		$entities_id = $data['entities_id'];
		$customers_id = $data['customers_id'];
// echo "customers_id=$customers_id <br> ";
		$name = $data['namemonitor'];
//		echo "pcname=$pcname <br>";
		$serial = $data['serial'];
		$customer_name = $data['customer_name'];
		$companynament = $data['companynament'];
		$_SESSION["companynament"] = $data['companynament'];
		$_SESSION["customer_name"] = $data['customer_name'];
		$_SESSION["entities_id"] = $data['entities_id'];
		$_SESSION["customer_id"] = $data['customers_id'];		
		$monitormodels_id = $data['monitormodels_id'];
		$monitortypes_id = $data['monitortypes_id'];
		$namemodel= $data['namemodel'];
		$nametype= $data['nametype'];
		$location=$data['location'];
		$comment=$data['comment'];
		$users_id=$data['users_id'];
		$groups_id=$data['groups_id'];
		$author=$data['author'];
		$date_mod=$data['date_mod'];
		$is_deleted=$data['is_deleted'];
		$comment=$data['comment'];
 
        Database::disconnect();	


?>