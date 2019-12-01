<?php
       
        $companynameError = null;
        $vatcodeError = null;
		$account1Error = null;
//		$account2Error = null;
//        $customtypeError = null;
        $phoneError = null;
//        $phone2Error = null;
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
		
        // keep track post values
  
		$companyname = $_POST['companyname'];
        $vatcode = $_POST['vatcode'];
        $account1 = $_POST['account1'];
        $account2 = $_POST['account2'];		
//        $customtype = $_POST['customtype'];
        $phone = $_POST['phone'];
//        $phone2 = $_POST['phone2'];
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
		//$_POST['is_deleted'];
	   $valid = true;
        if (empty($companyname)) {
            $companynameError = 'Entrez le nom/raison sociale';
            $valid = false;
        }
/*
        if (empty($vatcode)) {
		    $vatcodeError = 'Entrez le code tva';
            $valid = false;
        }

		if (empty($account1)) {
            $account1Error = 'Entrez le numero de compte=$account1';
            $valid = false;
        }

		if (empty($account2)) {
            $account2Error = 'Entrez le 2ème numéro de compte=$account2';
            $valid = false;
        }

		if (empty($address)) {
            $addressError = 'Entrez l"adresse' ;
            $valid = false;
        }
		
		if (empty($town)) {
            $townError = 'Entrez la localité' ;
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
	
?>