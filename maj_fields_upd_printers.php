 <?php      
 	   $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM vtictan_customers_coprinters where id_coprinters=?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);		
		$entities_id = $data['entities_id'];
		$customers_id = $data['customers_id'];
// echo "customers_id=$customers_id <br> ";

		$name = $data['namecoprinters'];
//		echo "name=$name <br>";
		$serial = $data['serial'];
		$customer_name = $data['customer_name'];
		$companynament = $data['companynament'];	
	   	$_SESSION["companynament"] = $data['companynament'];
	   	$_SESSION["customer_name"] = $data['customer_name'];
	   	$_SESSION["entities_id"] = $data['entities_id'];
	   	$_SESSION["customer_id"] = $data['customers_id'];			
		$processor = $data['processor'];
		$coprintersmodels_id = $data['coprintersmodels_id'];
		$coprinterstypes_id = $data['coprinterstypes_id'];
		$modelname= $data['modelname'];
		$typename= $data['typename'];
		$adresseip=$data['adresseip'];
		$typeadressage=$data['typeadressage'];
		$connexionvia=$data['connexionvia'];
		$location=$data['location'];
		$comment=$data['comment'];
		$users_id=$data['users_id'];
		$groups_id=$data['groups_id'];
		$author=$data['author'];
		$mod_date=$data['mod_date'];
		$is_deleted=$data['isdeleted'];
        //echo "serial=$serial <br> ";
        Database::disconnect();	

?>