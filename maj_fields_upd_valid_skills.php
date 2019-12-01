 <?php      
 	    $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM vtictan_tecskills where id=?";
		
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);		
		$name_tech = $data['name_tech'];
		$name = $data['name'];

	    $sql = "UPDATE tictan_tecskills set  staff_id = ?,  skill_id = ?,
			comment = ?, author = ?, date_mod = ?, is_deleted = ?";	
		$sw=1;
        $skill_id0 = $_POST['skill_id0'];
	    $skill_id = $_POST['skill_id'];
//		echo "skill_id0= $skill_id0<br>";		echo "skill_id= $skill_id   sw=$sw<br>";			
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
	 }
 //   echo "varskill_id=$varskill_id<br>";
	$sql = $sql."where skill_id = ".$id;
	echo "sql=$sql <br>";		
    $q = $pdo->prepare($sql);
    $q->execute(array( $staff_id, $skill_id, $comment, $author, $date_mod, $is_deleted));
    Database::disconnect();	
    header("Location: index_techskills.php");
?>