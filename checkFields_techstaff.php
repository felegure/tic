<?php

// echo "checkFields_techstaff <br> ";

        $nameError = null;		
        $firstNameError = null;				
        $mobileError = null;
        $emailError = null;
        $contacttypes_idError = null;
        $addressError = null;
        $postcodeError = null;
        $townError = null;
        $stateError = null;
        $countryError = null;
        $commentError = null;
        $authorError = null;
        $mod_dateError = null;
        $is_deletedError	 = null;

		$name = $_POST['name'];		
		$firstName = $_POST['firstName'];	
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $postcode = $_POST['postcode'];
        $town = $_POST['town'];
        $state = $_POST['state'];
        $country = $_POST['country'];
        $comment = $_POST['comment'];
        $author = $_POST['author'];
        $mod_date = $_POST['mod_date'];
		$is_deleted = 0;

	   $valid = true;  

        if (empty($name)) {
            $nameError = 'Entrez le nom de famille';
            $valid = false;
        }
        if (empty($firstName)) {
            $firstNameError = 'Entrez le prénom ';
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

  //    echo "valid = $valid <br>";  
?>