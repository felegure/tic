<?php
echo "checkFields_cust_virtuels.php <br> ";
        $customers_idError = null;
        $entities_idError = null;
        $serialError = null;		
        $date_modError = null;		
		$drivenameError = null;
        $customers_idError = null;
        $is_deletedError = null;	  
        $commentError = null;
        $authorError = null;
        // keep track post values
		$entities_id = $_POST['entities_id'];
//echo "entities=$entities_id <br>";
        $drivename=$_POST['drivename'];
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
		if (empty($drivename)) {
            $drivenameError = "Entrez le nom du lecteur reseau ";
            $valid = false;
			$v=111;
        }
	
*/
//  echo "valid = $v <br> ";
        
?>