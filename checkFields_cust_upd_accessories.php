<?php
//    echo "check_fields_cust_upd_accessories .php <br> ";

        $licencesoftError = null;	
       
        $mod_dateError = null;		
		$nameError = null;
        $locationError = null;
        $is_deletedError = null;	
        $commentError = null;
        $authorError = null;
		
        // keep track post values
	  $location = $_POST['location'];
		$name = $_POST['name'];   
		$serial = $_POST['serial'];   		
		$accessorymodels_id = $_POST['accessorymodels_id'];
	    $accessorytypes_id = $_POST['accessorytypes_id'];
		$customers_id = $_POST['customers_id'];
		$entities_id = $_POST['entities_id'];
        $is_deleted = 0;
        $comment = $_POST['comment'];
        $author = $_POST['author'];
		$date_mod = $_POST['date_mod'];
		$is_deleted = 0;
		//$_POST['is_deleted'];
		$v=0;
	    $valid = true;  

/*
		if (empty($name)) {
            $nameError = "Entrez le Nom de l'accessoire";
            $valid = false;
			$v=111;
        }
*/
 
//  echo "valid = $v <br> ";   
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM vtictan_customers_accessories where id=?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);		
		$entities_id = $data['entities_id'];
		$customers_id = $data['customers_id'];
// echo "customers_id=$customers_id <br> ";
		$name = $data['name'];
		$customer_name = $data['customer_name'];	
		$companynament = $data['companynament'];		
		$namemodel = $data['namemodel'];
		$nametype = $data['nametype'];
		$serial = $data['serial'];		
		$accessorymodels_id = $data['accessorymodels_id'];
		$accessorytypes_id = $data['accessorytypes_id'];
		$comment=$data['comment'];
		$author=$data['author'];
		$date_mod=$data['date_mod'];
		$is_deleted=$data['is_deleted'];

        $accessorytmodels_id0 = $_POST['accessorymodels_id0'];
	    $accessorymodels_id = $_POST['accessorymodels_id'];

?>