<?php
echo "maj_fields_upd_else_post_softs.php <br>";
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM vtictan_cust_comp_soft where id=?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);		
		$entities_id = $data['entities_id'];
		$customers_id = $data['customers_id'];
	    $computers_id = $data['computers_id'];			
// echo "customers_id=$customers_id <br> ";
		$name = $data['name'];
		$pcname = $data['pcname'];	
		$namemodel = $data['namemodel'];
		$nametype = $data['nametype'];			
		echo "name=$name <br>";
echo "namemodel=$namemodel <br>";
echo "nametype=$nametype <br>";
		$editor = $data['editor'];
        $supplier = $data['supplier'];
        $licence = $data['licence'];		
		$customer_name = $data['customer_name'];
		$companyname = $data['companyname'];
		$_SESSION["companyname"] = $data['companyname'];
		$_SESSION["customer_name"] = $data['customer_name'];
		$_SESSION["entities_id"] = $data['entities_id'];
		$_SESSION["customers_id"] = $data['customers_id'];		
		$softmodels_id = $data['softmodels_id'];
		$softypes_id = $data['softypes_id'];
		$namemodel= $data['namemodel'];
		$nametype= $data['nametype'];
		$start_date=$data['start_date'];
		$end_date=$data['end_date'];	
		$comment=$data['comment'];
     	$author=$data['author'];
		$date_mod=$data['date_mod'];
		$is_deleted=$data['is_deleted'];
        Database::disconnect();	
?>