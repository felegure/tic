<?php
        $customers_idError = null;
        $entities_idError = null;
        $licenceError = null;	
        $editorError = null;			
        $nameError = null;		
        $date_modeError = null;		        
		$start_dateError = null;	        
		$end_dateError = null;	
        $softmodel_idError = null;        
		$softype_idError = null;
		$nameError = null;
        $is_deletedError = null;	
	    $users_idError = null;
	    $is_dynamicError = null;	
        $groups_idError = null;

        $ticket_tcoError = null;	
        $uuidError = null;

        $commentError = null;
        $authorError = null;

        // keep track post values
	
	    $licence = $_POST['licence'];
        $editor = $_POST['editor'];   
		$name = $_POST['name'];   
		$supplier = $_POST['supplier'];
		$softmodels_id = $_POST['softmodels_id'];
	    $softypes_id = $_POST['softypes_id'];
		$customers_id = $_POST['customers_id'];
		$entities_id = $_POST['entities_id'];
//echo "entities=$entities_id <br>";
		$start_date = $_POST['start_date'];		
		$end_date = $_POST['end_date'];	


 //       $is_dynamic = $_POST['is_dynamic'];

 //       $ticket_tco = $_POST['ticket_tco'];
 //       $uuid= $_POST['uuid'];
        $comment = $_POST['comment'];
        $author = $_POST['author'];
		$date_mod = $_POST['date_mod'];
		$is_deleted = 0;
		
		//$_POST['is_deleted'];
		$v=0;
		$erreur="";
	   $valid = true;  
 /*
 if (empty($entities_id)) {
            $entities_idError = 'Entrez le nom du Client/Entite';
            $valid = false;
			$v=1;
        }	   
        if (empty($customers_id)) {
            $customers_idError = 'Entrez le Nom du site Client';
            $valid = false;
			$v=2;
        }	
		
		if (empty($name)) {
            $nameError = "Entrez le nom du logiciel";
            $valid = false;
			$v=3;
        }

		  if (empty($licence)) {
            $serialError = 'Entrez le numéro de licence';
            $valid = false;
			$v=4;
  
        }		
*/
		  if (empty($softmodels_id)) {
            $softmodels_idError = 'Entrez le nom du logiciel';
            $valid = false;
			$v=5;
		    
			$erreur = $erreur.'Le modele de logiciel est obligatoire !  ';	
						
        }		

		if (empty($softypes_id)) {
            $softypes_idError = 'Entrez le type de logiciel';
            $valid = false;
			$v=6;
            $erreur = $erreur.'Le type de logiciel est obligatoire !';			
				
        }	
  
        if ($valid==false) 
		echo "$erreur <br>";
        
?>