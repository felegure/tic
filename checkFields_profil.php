<?php

//echo "checkFields_contact  <br>";
		$profilError = null;
        $descriptionError = null;
        $commentError = null;
        $authorError = null;
        $mod_dateError = null;
        $is_deletedError = null;
	
        // keep track post values

		$profil = $_POST['profil'];		
		$description = $_POST['description'];
        $comment = $_POST['comment'];
        $author = $_POST['author'];
        $mod_date = $_POST['mod_date'];
		$is_deleted = 0;

	   $valid = true;  
	   
       if (empty($profil)) {
            $profilError = 'Entrez un profil';
            $valid = false;
		}
        if (strlen($profil)>1) {
		    $profilError = 'Entrez 1 Caractère maximum pour le profil';  
            $valid = false; 			
		}
        if (empty($description)) {
            $descriptionError = 'Entrez une description';
            $valid = false;
			
        }
   
 //    echo "valid = $valid <br>";  
?>