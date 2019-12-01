<?php

        $customers_idError = null;
        $entities_idError = null;
        $serialError = null;		
        $date_modError = null;		
		$nameError = null;
		$licenceError = null;
		$supplierError = null;			
		$editorError = null;		
        $customers_idError = null;
        $is_deletedError = null;	
        $ticket_tcoError = null;	
        $uuidError = null;
        $commentError = null;
        $authorError = null;
		$softmodels_id = null;
		$softypes_id = null;
        // keep track post values
	
	
	   $serial = $_POST['serial'];
       $name = $_POST['name'];
       $adresseip = $_POST['adresseip'];
       $typeadressage = $_POST['typeadressage'];
       $adressrange=$_POST['adressrange'];
       $mask=$_POST['mask'];
       $bridge=$_POST['bridge'];
//		$adressrange=$_POST['adressrange'];		
       $connexionvia = "";
		//$_POST['connexionvia'];
       $fax = $_POST['fax'];
       $login = $_POST['login'];
       $password = $_POST['password'];
       $location = $_POST['location'];
       $comment = $_POST['comment'];
       $date_mod=$_POST['date_mod'];
       $author=$_POST['author'];
       $is_deleted = 0;


		$customers_id = $_POST['customers_id'];
		$entities_id = $_POST['entities_id'];
//echo "entities=$entities_id <br>";
 
        $networkmodels_id = $_POST['networkmodels_id'];
		$networktypes_id = $_POST['networktypes_id'];

		//$_POST['is_deleted'];
		$v=0;
	   $valid = true;  
        if (empty($entities_id)) {
            $entities_idError = 'Entrez le nom du Client/Entite';
            $valid = false;
			$v=1;
        }	   

/*		
		if (empty($name)) {
            $nameError = "Entrez le nom de l'equipement ";
            $valid = false;
			$v=111;
        }

		  if (empty($serial)) {
            $serialError = 'Entrez le numero de serie';
            $valid = false;
			$v=1111;
        }		
*/

          if (empty($networkmodels_id)) {
            $networkmodels_idError = "Choisissez l'equipement reseau";
            $valid = false;
			$v=1111111;
        }
  //		echo "networkmodels_id=$networktypes_id<br>)";		
    	if (empty($networktypes_id)) {
            $networktypes_idError = "Choisissez le type" ;
            $valid = false;
			$v=10;
        }
  


//  echo "valid = $v <br> ";
        
?>