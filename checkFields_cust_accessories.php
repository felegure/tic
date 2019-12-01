<?php
// echo "checkFields_cust_accessories.php <br>";
        $customers_idError = null;
        $entities_idError = null;
        $nameError = null;		
        $date_modeError = null;		        
        $accessorymodeld_idError = null;        
		$accessorytype_idError = null;
		$location_idError = null;
        $is_deletedError = null;	

        $commentError = null;
        $authorError = null;

        // keep track post values
	
	    $location = $_POST['location'];
		$name = $_POST['name'];   
		$serial = $_POST['serial'];   		
		$accessorymodels_id = $_POST['accessorymodels_id'];
	    $accessorytypes_id = $_POST['accessorytypes_id'];
		$customers_id = $_POST['customers_id'];
		$entities_id = $_POST['entities_id'];
        $is_deleted = 0;
        $comment = $_POST['comment'];
        $author = $_POST['author'];
		$date_mod = $_POST['date_mod'];
		$is_deleted = 0;
		
		//$_POST['is_deleted'];
		$v=0;
	   $valid = true;  
 /*
        if (empty($entities_id)) {
            $entities_idError = 'Entrez le nom du Client/Entite';
            $valid = false;
			$v=1;
        }	   
        if (empty($customer_id)) {
            $customer_idError = 'Entrez le Nom du site Client';
            $valid = false;
			$v=11;
        }	
		
		if (empty($name)) {
            $nameError = "Entrez le nom de l'accessoire";
            $valid = false;
			$v=111;
        }

		  if (empty($accessorymodels_id)) {
            $accessorymodels_idError = 'Selectionnez un accessoire logiciel';
            $valid = false;
			$v=1111;
        }		
		  
  
  echo "valid = $v <br> ";
  */      
?>