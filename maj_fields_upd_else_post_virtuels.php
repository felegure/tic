<?php
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM vtictan_cust_comp_virtuels where id=?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);		
		$entities_id = $data['entities_id'];
		$customers_id = $data['customers_id'];
	    $computers_id = $data['computers_id'];			
// echo "customers_id=$customers_id <br> ";
		$drivename = $data['drivename'];
		$pcname = $data['pcname'];		
		$customer_name = $data['customer_name'];
		$companyname = $data['companyname'];
		$_SESSION["companyname"] = $data['companyname'];
		$_SESSION["customer_name"] = $data['customer_name'];
		$_SESSION["entities_id"] = $data['entities_id'];
		$_SESSION["customers_id"] = $data['customers_id'];		
		$password= $data['password'];	
		$comment=$data['comment'];
     	$author=$data['author'];
		$date_mod=$data['date_mod'];
		$is_deleted=$data['is_deleted'];
		echo "maj_fields_upd_else_post_virtuels    comment=$comment <br>";
        Database::disconnect();	
?>