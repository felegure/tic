<?php

        $serialError = null;		
        $date_modError = null;		
		$nameError = null;
        $customers_idError = null;
        $is_deletedError = null;
	    $locationError	 = null;		
        $commentError = null;
        $authorError = null;
//		$monitorsmodels_id = null;
//		$monitorstypes_id = null;

        // keep track post values
	    $serial=$_POST['serial'];
		$name = $_POST['name'];
//		$customer_id = $_POST['customers_id'];
//		$entities_id = $_POST['entities_id'];
//echo "entities=$entities_id <br>";
		$location = $_POST['location'];	
        $monitormodels_id = $_POST['monitormodels_id'];
		$monitortypes_id = $_POST['monitortypes_id'];
        $is_deleted = 0;
        $comment = $_POST['comment'];
        $author = $_POST['author'];
		$date_mod = $_POST['date_mod'];
//        echo "apres <br> ";		
		//$_POST['is_deleted'];
		$v=0;
	    $valid = true;  
/*
		if (empty($name)) {
            $nameError = "Entrez le Nom de l'ecran";
            $valid = false;
			$v=111;
        }

		  if (empty($serial)) {
            $serialError = 'Entrez le numero de serie';
            $valid = false;
			$v=1111;
        }		
*/
 // echo "valid = $v <br> ";   
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

		$serial = $data['serial'];
		$customer_name = $data['customer_name'];
		$companynament = $data['companynament'];		
		$customer_name = $data['customer_name'];
		$entities_id = $data['entities_id'];
		$customers_id = $data['customers_id'];
		$namemodel = $data['namemodel'];
		$nametype = $data['nametype'];	
		$groups_id = $data['groups_id'];
		$users_id = $data['users_id'];
		$author = $data['author'];
		$is_deleted = $data['is_deleted'];

        $monitormodels_id0 = $_POST['monitormodels_id0'];
	    $monitormodels_id = $_POST['monitormodels_id'];
	
?>