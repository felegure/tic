<?php

        $serialError = null;		
        $mod_dateError = null;		
        $adresseipError = null;
		$nameError = null;
        $typeadressageError = null;
        $customers_idError = null;
        $is_deletedError = null;
	    $locationError	 = null;		
//        $ticket_tcoError = null;	
//        $uuidError = null;
        $commentError = null;
        $authorError = null;
//		$coprintersmodels_id = null;
//		$coprinterstypes_id = null;

        // keep track post values
	    $serial=$_POST['serial'];
		$name = $_POST['name'];
		$adresseip = $_POST['adresseip'];
		$typeadressage = $_POST['typeadressage'];
//		$customers_id = $_POST['customers_id'];
//		$entities_id = $_POST['entities_id'];
//echo "entities=$entities_id <br>";
		$location = $_POST['location'];	
        $coprintersmodels_id = $_POST['coprintersmodels_id'];
		$coprinterstypes_id = $_POST['coprinterstypes_id'];
        $is_deleted = 0;

		
 //     $is_dynamic = $_POST['is_dynamic'];
 //     $ticket_tco = $_POST['ticket_tco'];
 //     $uuid= $_POST['uuid'];
        $comment = $_POST['comment'];
        $author = $_POST['author'];
		$date_mod = $_POST['date_mod'];
//        echo "apres <br> ";		
		//$_POST['is_deleted'];
		$v=0;
	    $valid = true;  
/*
		if (empty($name)) {
            $nameError = 'Entrez le Nom du photocopieur';
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
        $sql = "SELECT * FROM vtictan_customers_coprinters where id=?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);		
		$entities_id = $data['entities_id'];
		$customers_id = $data['customers_id'];
// echo "customers_id=$customers_id <br> ";
		$name = $data['name'];

		$serial = $data['serial'];
		$customer_name = $data['customer_name'];
		$companynament = $data['companynament'];		
		$entities_id = $data['entities_id'];
		$customers_id = $data['customers_id'];
		$namemodel = $data['namemodel'];
		$nametype = $data['nametype'];
		$adresseip = $data['adresseip'];		
		$author = $data['author'];
		$is_deleted = $data['is_deleted'];

        $coprintersmodels_id0 = $_POST['coprintersmodels_id0'];
	    $coprintersmodels_id = $_POST['coprintersmodels_id'];
		
//	    echo "coprintersrmodels_id0= $coprintersmodels_id0<br>";
//		echo "coprintersmodels_id= $coprintersmodels_id<br>";	
		
//		echo "os_id0= $os_id0   os_id=$os_id<br>";
//		echo "osvp_id0= $osvp_id0   osvp_id=$osvp_id<br>";	
?>