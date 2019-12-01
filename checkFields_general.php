<?php

echo "checkFields_general  <br>";
//		$idError = null;
        $nameError = null;
        $commentError = null;
        $authorError = null;
        $date_modError = null;
        $is_deletedError = null;
	
        // keep track post values

//		$id = $_POST['id'];		
		$name = $_POST['name'];
        $comment = $_POST['comment'];
        $author = $_POST['author'];
        $date_mod = $_POST['date_mod'];
		$is_deleted = 0;

	   $valid = true;  
	   
       if (empty($name)) {
            $nameError = 'Entrez un nom';
            $valid = false;
		}
/*	
 //       if (strlen($id)>1) {
//		    $idError = 'Entrez 1 Caractère maximum pour le id';  
//            $valid = false; 			
//		}
        if (empty($name)) {
            $nameError = 'Entrez une description';
            $valid = false;
			
        }
 */ 
     echo "valid = $valid <br>";  
 
?>