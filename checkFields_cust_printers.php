<?php

        $customers_idError = null;
        $entities_idError = null;
        $serialError = null;		
        $nameError = null;		
        $date_modeError = null;		
        $adresseipError = null;
        $typeadressageError = null;
        $customers_idError = null;
        $is_deletedError = null;
	    $locationError	 = null;		
	    $users_idError = null;
	    $is_dynamicError = null;	
        $groups_idError = null;
        $ticket_tcoError = null;	
        $uuidError = null;
        $commentError = null;
        $authorError = null;
		$coprintersmodels_idError = null;
		$coprinterstypes_idError = null;
        // keep track post values
	
	    $serial = $_POST['serial'];
        $name = $_POST['name'];
		$adresseip = $_POST['adresseip'];
		$typeadressage = $_POST['typeadressage'];
		$customers_id = $_POST['customers_id'];
		$entities_id = $_POST['entities_id'];
//echo "entities=$entities_id <br>";
		$location = $_POST['location'];		
        $coprintersmodels_id = $_POST['coprintersmodels_id'];
		$coprinterstypes_id = $_POST['coprinterstypes_id'];		
//		echo "coprinterstypes_id=$coprinterstypes_id <br>";
        $is_deleted = 0;

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
        if (empty($customers_id)) {
            $customer_idError = 'Entrez le Nom du site Client';
            $valid = false;
			$v=11;
        }	
		
		if (empty($name)) {
            $nameError = "Entrez le nom de l'imprimante";
            $valid = false;
			$v=111;
        }

		  if (empty($serial)) {
            $serialError = 'Entrez le numero de serie';
            $valid = false;
			$v=1111;
        }		

*/
          if (empty($coprintersmodels_id)) {
            $coprintersmodels_idError = "Selectionnez une imprimante";
            $valid = false;
			$v=1111111;
        }
  //		echo "coprintersmodels_id=$coprinterstypes_id<br>)";		
    	if (empty($coprinterstypes_id)) {
            $coprinterstypes_idError = "Choisissez le type" ;
            $valid = false;
			$v=10;
        }
 
 
 // echo "valid = $v <br> ";
        
?>