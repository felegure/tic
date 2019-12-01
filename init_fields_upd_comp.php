<?php
// echo "init_fields_upd_comp.php <br>";
        $serial = $_POST['serial'];
      	
        $pcname = $_POST['pcname'];
		$processor = $_POST['processor'];
        $ram = $_POST['ram'];
    //    $domain_name = $_POST['domain_name'];   	
        $session_admin_name = $_POST['session_admin_name'];
        $session_admin_pwd = $_POST['session_admin_pwd'];         
		$session_user_name = $_POST['session_user_name'];
		$session_user_pwd = $_POST['session_user_pwd'];
		$teamv_logname = $_POST['teamv_logname'];
		$teamv_pwd = $_POST['teamv_pwd'];	
		$domain_name=$_POST['domain_name'];
        $mask=$_POST['mask'];
        $bridge=$_POST['bridge'];
        $adressrange=$_POST['adressrange'];		
		$adresseip = $_POST['adresseip'];
		$typeconnexion=$_POST['typeconnexion'];
         $id = $_POST['id'];
        $comment=$_POST['comment'];
//echo "entities=$entities_id <br>";
		$location = $_POST['location'];		
        $computermodels_id = $_POST['computermodels_id'];
	     $computertypes_id = $_POST['computertypes_id'];
        $is_deleted = 0;
        $comment = $_POST['comment'];
        $author = $_POST['author'];

		$date_mod = $_POST['date_mod'];		
		$is_deleted = 0;
?>