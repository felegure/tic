²<?php
// modification : 25/03/2015

  //     require 'maj_fields_upd_cust.php';
  
 //   echo "maj_fields_upd_valid_users.php <br>";
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    $sql = "SELECT * FROM vtictan_users where id =".$id;
 // echo "2eme sql=$sql <br>";				
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);		
	 
	$sql = "UPDATE tictan_users set userid = ?, password = ?, comment = ?, author = ?, date_mod = ? ";		

	$sw=1;
    $staff_id0 = $_POST['staff_id0'];
	$staff_id = $_POST['staff_id'];  	
	if ($staff_id != '0') 
  	if ($staff_id != $staff_id0) {
    $varstaff_id = $staff_id;
    if ($sw==0) {
		$sql = $sql." staff_id = $varstaff_id ";
//		echo "varstaff_id_id=$varstaff_id <br>";
	}
	else {
	   $sql = $sql.",staff_id = $varstaff_id ";
	}
	 $sw=1;
	 }	
//	 echo " SSSSSSSSS sql=$sql <br>";
	 
//	 echo "staff_id=$staff_id,  staff_id0=$staff_id0 <br>"; 
	$sw=1;
    $profil_id0 = $_POST['profil_id0'];
	
	$profil = $_POST['profil'];  	
	if ($profil != '0') 
  	if ($profil != $profil_id0) {
    $varprofil= $profil;
    if ($sw==0) {
		$sql = $sql." profil ="."'".$varprofil."' ";
//		echo "varprofil=$varprofil <br>";
	}
	else {
	   $sql = $sql.",profil ="."'".$varprofil."' ";
	}
	 $sw=1;
	 }	
//		 echo "profit=$profil,  profil_id0=$profil_id0 <br>"; 
	 
		$sql = $sql."where id = ".$id;
//		echo "XXXXXXXXXX sql=$sql <br>";
// 		echo "staff_id = $staff_id <br>";
//		echo "0.$staff_id  0.0$profil 1$userid 2$password 3$profil  3.3$staff_id  4$comment 5$author 6$date_mod <br>";
	$q = $pdo->prepare($sql);	
    $q->execute(array($userid, $password, $comment,$author, $date_mod ));
	Database::disconnect();
   header("Location: index_users.php");
?>