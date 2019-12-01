<?php
// 	echo "checkFields_cust_computers <br>";
        $customers_idError = null;
        $entities_idError = null;
        $serialError = null;		
        $mod_dateError = null;	
        $date_modError = null;			
     //   $operatingsystemversions_idError = null;		
		$processorError = null;
        $ramError = null;
        $domain_nameError = null;
        $session_admin_nameError = null;
        $session_admin_pwdError = null;		
        $session_user_nameError = null;
        $session_user_pwdError = null;		
        $domain_nameError = null;	
		$teamv_lognameError = null;	
		$teamv_pwdError = null;	
		$typeconnexionError = null;	
 		$pcnameError = null;

        $customers_idError = null;
        $is_deletedError = null;
	    $locationError	 = null;		
        $networks_idError = null;
	    $is_dynamicError = null;	
        $ticket_tcoError = null;	
        $commentError = null;
        $authorError = null;
		$computermodels_idError = null;
		$computertypes_idError = null;
		
        // keep track post values
		$serial = $_POST['serial'];
        $pcname = $_POST['pcname'];
		$processor = $_POST['processor'];
        $ram = $_POST['ram'];
    //    $domain_name = $_POST['domain_name'];   	
        $session_admin_name = $_POST['session_admin_name'];
        $session_admin_pwd = $_POST['session_admin_pwd'];         
		$session_user_name = $_POST['session_user_name'];
		$session_user_pwd = $_POST['session_user_pwd'];
		$teamv_logname = $_POST['teamv_logname'];
		$teamv_pwd = $_POST['teamv_pwd'];		
		$adresseip = $_POST['adresseip'];

        $comment=$_POST['comment'];
//echo "entities=$entities_id <br>";
		$location = $_POST['location'];		
        $computermodels_id = $_POST['computermodels_id'];
	     $computertypes_id = $_POST['computertypes_id'];
        $is_deleted = 0;
        $comment = $_POST['comment'];
        $author = $_POST['author'];

		$date_mod = $_POST['date_mod'];		
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
/*		
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