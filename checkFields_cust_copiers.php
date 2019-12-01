<?php

        $customers_idError = null;
        $entities_idError = null;
        $serialError = null;		
        $date_modError = null;		
		$nameError = null;
        $customers_idError = null;
        $is_deletedError = null;
	    $locationError	 = null;		
        $commentError = null;
        $authorError = null;
		$copiersmodels_id = null;
		$copierstypes_id = null;
        // keep track post values
		$serial = $_POST['serial'];
        $name = $_POST['name'];

		$adresseip = $_POST['adresseip'];
		$typeadressage = $_POST['typeadressage'];
		$customers_id = $_POST['customers_id'];
		$entities_id = $_POST['entities_id'];
//echo "entities=$entities_id <br>";
		$location = $_POST['location'];		

        $copiersmodels_id = $_POST['copiersmodels_id'];
		$copierstypes_id = $_POST['copierstypes_id'];
		
        $is_deleted = 0;

 //       $ticket_tco = $_POST['ticket_tco'];
 //       $uuid= $_POST['uuid'];
        $comment = $_POST['comment'];
        $author = $_POST['author'];
		$date_mod = $_POST['date_mod'];
		$is_deleted = 0;
		
		//$_POST['is_deleted'];
		$v=0;
	   $valid = true;  
/*
		if (empty($name)) {
            $nameError = 'Entrez le Nom de la photocopieuse';
            $valid = false;
			$v=111;
        }

		  if (empty($serial)) {
            $serialError = 'Entrez le numero de serie';
            $valid = false;
			$v=1111;
        }		


          if (empty($copiersmodels_id)) {
            $copiersmodels_idError = "Choisissez l'ordinateur";
            $valid = false;
			$v=1111111;
        }
  //		echo "copiersmodels_id=$copierstypes_id<br>)";		
    	if (empty($copierstypes_id)) {
            $copierstypes_idError = "Choisissez le type" ;
            $valid = false;
			$v=10;
        }
  
*/

 // echo "valid = $v <br> ";
        
?>