<?php
// echo "checkFields_cust_upd.php <br>";
        $customer_nameError = null;
   //     $entities_idError = null;
        $phoneError = null;
        $mobileError = null;
        $faxError = null;
        $emailError = null;
        $websiteError = null;
        $addressError = null;
        $postcodeError = null;
        $townError = null;
//        $stateError = null;
        $countryError = null;
        $commentError = null;
        $authorError = null;
        $date_modError = null;
        $is_deletedError	 = null;
		$customtype_id = null;
		
        // keep track post values
        $entities_id = $_POST['entities_id'];
		$customer_name = $_POST['customer_name'];
        $phone = $_POST['phone'];
        $mobile = $_POST['mobile'];
        $fax = $_POST['fax'];
        $email = $_POST['email'];
        $website = $_POST['website'];
        $address = $_POST['address'];
        $postcode = $_POST['postcode'];
        $town = $_POST['town'];
//        $state = $_POST['state'];
        $country = $_POST['country'];
        $comment = $_POST['comment'];
        $author = $_POST['author'];
        $date_mod = $_POST['date_mod'];
		$is_deleted = 0;
		$customtype_id = $_POST['customtype_id'];
//		$namecustomtype = $_POST['namecustomtype'];
		
		//$_POST['is_deleted'];;
	   $valid = true;
	
        if (empty($customer_name)) {
            $customer_nameError = 'Entrez le Site/Client';
            $valid = false;
        }

		
// mettre en commentaire
/* 
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
		// mettre en commentaire
?>