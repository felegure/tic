<?php
// echo "maj_fields_upd_else_post_comp.php <br>";
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
       $sql = "SELECT * FROM vtictan_customers_computers where id=?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);		
		$entities_id = $data['entities_id'];
		$customers_id = $data['customers_id'];
//		$companyname = $data['companyname'];	
//		echo "companyname=$companyname <br>";
//		echo "maj_fields_upd_else_post_comp.php entities_id=$entities_id <br>";
//		echo "maj_fields_upd_else_post_comp.php customers_id=$customers_id <br>";		
/*
		$_SESSION["companyname"] = $data['companyname'];
		$_SESSION["customer_name"] = $data['customer_name'];
		$_SESSION["entities_id"] = $data['entities_idcust'];
		$_SESSION["customers_id"] = $data['customers_idcust'];		
*/
//		 echo "customers_id=$customers_id <br> ";
		
//		include 'recuperation_variables.php';
		$pcname = $data['pcname'];
//		echo "pcname=$pcname <br>";
		$serial = $data['serial'];
		$customer_name = $data['customer_name'];
		$companyname = $data['companyname'];		
		$processor = $data['processor'];
		$ram = $data['ram'];
		$computermodels_id = $data['computermodels_id'];
		$computertypes_id = $data['computertypes_id'];
		$namemodel= $data['namemodel'];
		$nametype= $data['nametype'];
		$session_admin_name=$data['session_admin_name'];
		$session_admin_pwd=$data['session_admin_pwd'];
        $session_user_name=$data['session_user_name' ];
		$session_user_pwd=$data['session_user_pwd'];
		$teamv_logname=$data['teamv_logname'];
        $teamv_pwd=$data['teamv_pwd'];
		$domain_name=$data['domain_name'];
		$mask=$data['mask'];
        $bridge=$data['bridge'];
        $adressrange=$data['adressrange'];	
		$adresseip=$data['adresseip'];
		$typeconnexion=$data['typeconnexion'];
		$adresseip=$data['adresseip'];
		$location=$data['location'];
		$comment=$data['comment'];
		$author=$data['author'];
		$date_mod=$data['date_mod'];
		$is_deleted=$data['is_deleted']; 
        Database::disconnect();	
?>