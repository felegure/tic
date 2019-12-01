<?php

        $customers_idError = null;
        $entities_idError = null;
        $serialError = null;		
        $date_modError = null;		
		$nameError = null;
        $customers_idError = null;
        $is_deletedError = null;
	    $supplierError	 = null;		
	    $licenceError = null;	
        $editorError = null;	
        $start_dateError = null;
        $end_dateError = null;		
        $commentError = null;
        $authorError = null;
		$softmodels_id = null;
		$softypes_id = null;
        // keep track post values
//		$serial = $_POST['serial'];
		$entities_id = $_POST['entities_id'];
//echo "entities=$entities_id <br>";

        $name=$_POST['name'];
        $supplier=$_POST['supplier'];
		$editor=$_POST['editor'];
		$licence=$_POST['licence'];
		
        $softmodels_id = $_POST['softmodels_id'];
		$softypes_id = $_POST['softypes_id'];		
 
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
// Trouvez le moyen de réimprimer les message d'erreur   

          if (empty($softmodels_id)) {
            $softmodels_idError = "Choisissez le modele de logiciel";
            $valid = false;
			$v=1111111;
						$v= "modele de logiciel est obligatoire";
        }
  //		echo "softmodels_id=$softypes_id<br>)";		
    	if (empty($softypes_id)) {
            $softypes_idError = "Choisissez le type" ;
            $valid = false;
			$v=10;
			$v= "Type de logiciel est obligatoire";
        }
  


//  echo "valid = $v <br> ";
        
?>