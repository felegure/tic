<?php

 
        $serialError = null;		
        $nameError = null;		
        $date_modeError = null;		
        $adresseipError = null;
		$nameError = null;
        $typeadressageError = null;
        $connexionviaError = null;
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
//		$coprintersmodels_idError = null;
//		$coprinterstypes_idError = null;
        // keep track post values
	
	$serial = $_POST['serial'];
        $name = $_POST['name'];
		$adresseip = $_POST['adresseip'];
		$typeadressage = $_POST['typeadressage'];
		$connexionvia= $_POST['connexionvia'];
//		$customer_id = $_POST['customer_id'];
//		$entities_id = $_POST['entities_id'];
//echo "entities=$entities_id <br>";
		$location = $_POST['location'];		
        $coprintersmodels_id = $_POST['coprintersmodels_id'];
		$coprinterstypes_id = $_POST['coprinterstypes_id'];		
		echo "coprinterstypes_id=$coprinterstypes_id <br>";
        $is_deleted = 0;
        $users_id = $_POST['users_id'];
 //       $is_dynamic = $_POST['is_dynamic'];
        $groups_id = $_POST['groups_id'];
 //       $ticket_tco = $_POST['ticket_tco'];
 //       $uuid= $_POST['uuid'];
/       $comment = $_POST['comment'];
       $author = $_POST['author'];
		$mod_date = $_POST['mod_date'];
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
	*/	
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

/*
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
  */
 // echo "valid = $v <br> ";
        
?>