<?php

	
        $date_modError = null;		
		$nameError = null;
        $is_deletedError = null;	
	    $useridError = null;
        $profilError = null;	
		$passwordError = null;
		$commentError = null;
        $authorError = null;
		$staff_idError = null;
	
        // keep track post values

        $staff_id = $_POST['staff_id'];
        $password= $_POST['password'];
        $userid= $_POST['userid'];		
	    $profil= $_POST['profil'];
		$date_mod = $_POST['date_mod'];
        $comment = $_POST['comment'];
		
        $author = $_POST['author'];

        $is_deleted = 0;
		
		//$_POST['is_deleted'];
		$v=0;
	   $valid = true;  
        if (empty($userid)) {
            $useridError = "Entrez le nom de l'utilisateur";
            $valid = false;
			$v=1;
        }	   
        if (empty($profil)) {
            $profilError = 'Entrez le type de profil';
            $valid = false;
			$v=11;
        }	
		
	


 // echo "valid = $v <br> ";
        
?>