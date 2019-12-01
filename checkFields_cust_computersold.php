<?php
// 	echo "checkFields_cust_computers <br>";
        $customers_idError = null;
        $entities_idError = null;
        $serialError = null;		
        $mod_dateError = null;		
        $os_idError = null;
     //   $operatingsystemversions_idError = null;		
        $osvp_idError = null;
		$processorError = null;
        $ramError = null;
        $hddError = null;
        $cartegraphError = null;
        $domainameError = null;
        $sessionameError = null;
        $spasswordError = null;
        $teamv_lognameError = null;
        $adresseipError = null;
		$pcnameError = null;
        $typeadressageError = null;
        $connexionviaError = null;
        $customers_idError = null;
        $is_deletedError = null;
	    $locationError	 = null;		
		$os_licenseidError	= null;
        $autoupdatesystems_idError	= null;
        $domains_idError = null;
        $networks_idError = null;
	    $users_idError = null;
	    $is_dynamicError = null;	
        $groups_idError = null;
        $ticket_tcoError = null;	
        $uuidError = null;
        $commentError = null;
        $authorError = null;
		$computermodels_idError = null;
		$computertypes_idError = null;
        // keep track post values
		$serial = $_POST['serial'];
        $pcname = $_POST['pcname'];
		$os_id = $_POST['os_id'];
        $osvp_id = $_POST['osvp_id'];
		$processor = $_POST['processor'];
        $ram = $_POST['ram'];
        $hdd = $_POST['hdd'];
        $cartegraph = $_POST['cartegraph'];
        $domainame  = $_POST['domainame'];
		$sessioname = $_POST['sessioname'];
		$spassword = $_POST['spassword'];
		$teamv_logname = $_POST['teamv_logname'];
		$adresseip = $_POST['adresseip'];
		$typeadressage = $_POST['typeadressage'];
		$connexionvia= $_POST['connexionvia'];
        $comment=$_POST['comment'];
//echo "entities=$entities_id <br>";
		$location = $_POST['location'];		
//		$os_licenseid = $_POST['os_licenseid'];
//       $autoupdatesystems_id = $_POST['autoupdatesystems_id'];
//        $domains_id = $_POST['domains_id'];		
//        $networks_id = $_POST['networks_id'];

        $computermodels_id = $_POST['computermodels_id'];
	     $computertypes_id = $_POST['computertypes_id'];
		
        $is_deleted = 0;
        $users_id = $_POST['users_id'];
 //       $is_dynamic = $_POST['is_dynamic'];
        $groups_id = $_POST['groups_id'];
 //       $ticket_tco = $_POST['ticket_tco'];
 //       $uuid= $_POST['uuid'];
        $comment = $_POST['comment'];
        $author = $_POST['author'];
		$mod_date = $_POST['mod_date'];
		$is_deleted = 0;
		
		//$_POST['is_deleted'];
		$v=0;
	   $valid = true;  
        if (empty($entities_id)) {
            $entities_idError = 'Entrez le nom du Client/Entite';
            $valid = false;
			$v=1;
        }	   
        if (empty($customers_id)) {
            $customers_idError = 'Entrez le Nom du site Client';
            $valid = false;
			$v=11;
        }	
		
		if (empty($pcname)) {
            $pcnameError = 'Entrez le Nom du PC';
            $valid = false;
			$v=111;
        }
		
//		echo "contacttypes_id=$contacttypes_id<br>)";
		  if (empty($serial)) {
            $serialError = 'Entrez le numero de serie';
            $valid = false;
			$v=1111;
        }		

        if (empty($os_id)) {
            $os_idError = "Choisissez le systeme d'exploitation";
            $valid = false;
			$v=11111;
        }
		  
		  if (empty($osvp_id)) {
            $osvp_idError = 'Choisissez le service pack';
            $valid = false;

        }
/*		
        if (empty($operatingsystemversions_id)) {
            $operatingsystemversions_idError = "Entrez la version du système d'exploitation";
            $valid = false;
        }
    	if (empty($operatingsystemservicepacks_id)) {
            $operatingsystemservicepacks_idError = "Entrez le service pack" ;
            $valid = false;  
  }
  */
  //		echo "computermodels_id=$computermodels_id<br>)";
          if (empty($computermodels_id)) {
            $computermodels_idError = "Choisissez l'ordinateur";
            $valid = false;
			$v=1111111;
        }

 // 		echo "computertypes_id=$computertypes_id<br>)";		
    	if (empty($computertypes_id)) {
            $computertypes_idError = "Choisissez le type" ;
            $valid = false;
			$v=10;
        }
  
/*
	    if (empty($domainame)) {
            $domainamedError = "Entrez le nom de domaine" ;
            $valid = false;
        }
		/*
	    if (empty($sessioname)) {
          $sessionameError = "Entrez le nom de session" ;
            $valid = false;
        }
		/*
	    if (empty($spassword)) {
            $spasswordError = "Entrez le password" ;
            $valid = false;
        }
		if (empty($teamv_logname)) {
            $teamv_lognameError = "Entrez le code teamvier" ;
            $valid = false;
        }
		if (empty($adresseip)) {
           $adresseipError = "Entrez l'adresse ip" ;
            $valid = false;
        }
		if (empty($typeadressage)) {
           $typeadressageError = "Entrez le type d'adressage" ;
            $valid = false;
        }
		if (empty($connexionvia)) {
           $connexionviaError = "Connexion via" ;
            $valid = false;
        }
		
*/

 // echo "valid = $v <br> ";
        
?>