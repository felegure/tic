<?php

    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
    $sql = "UPDATE tictan_tecskills set  staff_id = ?, skill_id = ?, 
		    comment = ?, author = ?, mod_date = ?, is_deleted = ? WHERE id = ?";		
	$sw=1;
    $skill_id0 = $_POST['skill_id0'];
	$skill_id = $_POST['skill_id'];
/*
	echo "skill_id0= $skill_id0<br>";
		echo "skill_id= $skill_id   sw=$sw<br>";		
*/		
	if ($skill_id != '0') 
  	if ($skill_id != $skill_id0) {
    $varskill_id = $skill_id;
    if ($sw==0) {
		$sql = $sql." skill_id = $varskill_id ";
//		echo "varskill_id=$varskill_id <br>";
	}
	else {
	   $sql = $sql.",skill_id = $varskill_id ";
	}
	$sw=1;


	$sql = $sql."where id = ".$id;

//	echo "sql=$sql <br>";		
    $q = $pdo->prepare($sql);


	$q->execute(array( $name, $serial,$adresseip,
	$typeadressage,$connexionvia,$location,$users_id,$groups_id,
			$author,$comment,$date_mod, $is_deleted));
	Database::disconnect();
    header("Location: index_skills.php");
} 
} 


?>