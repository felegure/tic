<?php

	
        $mod_dateError = null;		
        $is_deletedError = null;	
	    $staff_idError = null;
        $skill_idError = null;	
		$commentError = null;
        $authorError = null;

	
        // keep track post values

        $staff_id = $_POST['staff_id'];
        $skill_id= $_POST['skill_id'];	
		$name_tech = $_POST['name_tech'];
		$name = $_POST['name'];		
		$date_mod = $_POST['date_mod'];
        $comment = $_POST['comment'];
        $author = $_POST['author'];
        $is_deleted = 0;
		
		//$_POST['is_deleted'];
		$v=0;
	   $valid = true;  	   
        if (empty($skill_id)) {
            $skill_idError = 'Selectionnez la compétence';
            $valid = false;
			$v=11;
        }	
		
	


 // echo "valid = $v <br> ";
        
?>