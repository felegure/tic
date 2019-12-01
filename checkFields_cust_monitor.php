<?php

        $customers_idError = null;
        $entities_idError = null;
        $serialError = null;		
        $nameError = null;		
        $date_modeError = null;		
		$nameError = null;
        $typeadressageError = null;
        $customers_idError = null;
        $is_deletedError = null;
        $commentError = null;
        $authorError = null;

		$monitormodelds_idError = null;
		$monitortypes_idError = null;

        // keep track post values
	
	    $serial = $_POST['serial'];
        $name = $_POST['name'];
		$monitormodels_id = $_POST['monitormodels_id'];
		$monitortypes_id = $_POST['monitortypes_id'];
		$customers_id = $_POST['customers_id'];
		$entities_id = $_POST['entities_id'];
//echo "entities=$entities_id <br>";
		$location = $_POST['location'];		

        $is_deleted = 0;

 //       $ticket_tco = $_POST['ticket_tco'];
 //       $uuid= $_POST['uuid'];
        $comment = $_POST['comment'];
        $author = $_POST['author'];
		$date_mod = $_POST['date_mod'];
		$is_deleted = 0;
		
		//$_POST['is_deleted'];
		$v=0;
	   $valid = true;  
/* 
 if (empty($entities_id)) {
            $entities_idError = 'Entrez le nom du Client/Entite';
            $valid = false;
			$v=1;
        }	   
        if (empty($customer_id)) {
            $customer_idError = 'Entrez le Nom du site Client';
            $valid = false;
			$v=11;
        }	
		
		if (empty($name)) {
            $nameError = "Entrez le nom de l'ecran";
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
        
?>