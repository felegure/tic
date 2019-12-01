<?php

        $customers_idError = null;
        $entities_idError = null;
        $serialError = null;		
        $date_modError = null;		
		$nameError = null;
        $customers_idError = null;
        $is_deletedError = null;
	    $partition1Error	 = null;		
	    $partition2Error = null;	
        $partition3Error = null;	
        $uuidError = null;
        $commentError = null;
        $authorError = null;
		$ndiskmodels_id = null;
		$disktypes_id = null;
        // keep track post values
		$serial = $_POST['serial'];
		$entities_id = $_POST['entities_id'];
//echo "entities=$entities_id <br>";

        $name=$_POST['name'];
        $partition1=$_POST['partition1'];
		$partition2=$_POST['partition2'];
		$partition3=$_POST['partition3'];
		
        $diskmodels_id = $_POST['diskmodels_id'];
		$disktypes_id = $_POST['disktypes_id'];		
 
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

          if (empty($diskmodels_id)) {
            $diskmodels_idError = "Choisissez le modele de disque";
            $valid = false;
			$v=1111111;
						$v= "modele de disque est obligatoire";
        }
  //		echo "diskmodels_id=$disktypes_id<br>)";		
    	if (empty($disktypes_id)) {
            $disktypes_idError = "Choisissez le type" ;
            $valid = false;
			$v=10;
			$v= "Type de disque est obligatoire";
        }
  


  echo "valid = $v <br> ";
        
?>