<?php

//echo "checkFields_contact  <br>";

        $customers_idError = null;
        $entities_idError = null;
        $nameError = null;		
        $firstNameError = null;		
        $phoneError = null;		
        $mobileError = null;
        $faxError = null;
        $emailError = null;
        $contacttypes_idError = null;
        $addressError = null;
        $postcodeError = null;

        $commentError = null;
        $authorError = null;
        $date_modError = null;
        $is_deletedError	 = null;
	
        // keep track post values
//		$customers_id = $_POST['customers_id'];
//		$entities_id = $_POST['entities_id'];
// echo "entities=$entities_id <br>";
		$name = $_POST['name'];		
		$firstName = $_POST['firstName'];
        $phone = $_POST['phone'];		
        $mobile = $_POST['mobile'];
        $fax = $_POST['fax'];
        $email = $_POST['email'];
        $contacttypes_id = $_POST['contacttypes_id'];
        $address = $_POST['address'];
        $postcode = $_POST['postcode'];
        $town = $_POST['town'];
        $comment = $_POST['comment'];
        $author = $_POST['author'];
        $date_mod = $_POST['date_mod'];
		$is_deleted = 0;
		
//		echo "is_deleted=$is_deleted <br>";
//		$is_deleted = 0;
		//$_POST['is_deleted'];
	   $valid = true;  
/*
	   if (empty($entities_id)) {
            $entities_idError = 'Entrez le Client général';
            $valid = false;
        }	   
        if (empty($customers_id)) {
            $customers_idError = 'Entrez le Nom du site Client';
            $valid = false;
        }	
//		echo "contacttypes_id=$contacttypes_id<br>)";

	  if (empty($contacttypes_id )) {
            $contacttypes_idError = 'Entrez le type de contact';
            $valid = false;
        }		
*/
        if (empty($name)) {
            $nameError = 'Entrez le nom de famille du contact';
            $valid = false;
        }
/* 
 if (empty($firstName)) {
            $firstNameError = 'Entrez le prénom de famille du contact';
            $valid = false;
        }
    	if (empty($address)) {
            $addressError = "Entrez l'adresse" ;
            $valid = false;
        }
		
		if (empty($town)) {
            $townError = 'Entrez la localite' ;
            $valid = false;
        }
		if (empty($postcode)) {
            $postcodeError = 'Entrez le code postal' ;
            $valid = false;
        }	
		if (empty($country)) {
            $countryError = 'Entrez le pays' ;
            $valid = false;
        }			
	    if (empty($phone)) {
            $phoneError = 'Entrez le numero de telephone fixe';
            $valid = false;
        }
*/
		//    echo "valid = $valid <br>";  
?>