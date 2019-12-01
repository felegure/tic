<?php

        $serialError = null;		
        $date_modError = null;		
        $adresseipError = null;
		$nameError = null;
        $typeadressageError = null;
        $connexionviaError = null;
        $customers_idError = null;
        $is_deletedError = null;
	    $locationError	 = null;		
	    $faxError = null;
		$locationError = null;
	    $is_dynamicError = null;	
        $bridgeError = null;
		$maskError = null;
		$smtpserverError = null;
		$loginError = null;
		$passwordError = null;
		$adressrangeError = null;
        $authorError = null;
//		$networkmodels_id = null;
//		$networktypes_id = null;

        // keep track post values
	    $serial=$_POST['serial'];
		$name = $_POST['name'];
		$adresseip = $_POST['adresseip'];
		$typeadressage = $_POST['typeadressage'];
//  	$connexionvia= $_POST['connexionvia'];
		$bridge = $_POST['bridge'];
		$mask = $_POST['mask'];
		$smtpserver= $_POST['smtpserver'];
		$login = $_POST['login'];
		$password = $_POST['password'];
		$adressrange = $_POST['adressrange'];
//		$customer_id = $_POST['customers_id'];
//		$entities_id = $_POST['entities_id'];
//echo "entities=$entities_id <br>";
		$location = $_POST['location'];	

        $name = $_POST['name'];
        $networkmodels_id = $_POST['networkmodels_id'];
		$networktypes_id = $_POST['networktypes_id'];
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
            $nameError = "Entrez le Nom de l'equipement";
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
        $sql = "SELECT * FROM vtictan_customers_network where id_network=?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);		
		$entities_id = $data['entities_id'];
		$customers_id = $data['customers_id'];
// echo "customers_id=$customers_id <br> ";

		$name = $data['namenetwork'];
		$serial = $data['serial'];
		$customer_name = $data['customer_name'];
		$companynament = $data['companynament'];		
		$customer_name = $data['customer_name'];
		$entities_id = $data['entities_id'];
		$customers_id = $data['customers_id'];
		$namemodel = $data['namemodel'];
		$nametype = $data['nametype'];
		$adresseip = $data['adresseip'];
        $typeadressage = $data['typeadressage'];
		$connexionvia= $data['connexionvia'];
		$bridge = $data['bridge'];
		$mask = $data['mask'];
		$smtpserver= $data['smtpserver'];
		$login = $data['login'];
		$password = $data['password'];
		$adressrange = $data['adressrange'];

		$author = $data['author'];
		$is_deleted = $data['is_deleted'];

 //      $networkmodels_id0 = $_POST['networkmodels_id0'];
	   $networkmodels_id = $_POST['networkmodels_id'];
		

?>