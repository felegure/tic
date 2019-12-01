<?php
 // echo "checkFields_cust_upd_computers <br>";
 
        $serialError = null;		
        $mod_dateError = null;		
        $os_idError = null;
 
		$processorError = null;
        $ramError = null;
        $hddError = null;
        $cartegraphError = null;
        $domainameError = null;
        $sessionameError = null;
        $spasswordError = null;
        $teamv_lognameError = null;
        $adresseipError = null;
		$pcnameError = null;
        $typeadressageError = null;
        $connexionviaError = null;
        $customers_idError = null;
        $is_deletedError = null;
	    $locationError	 = null;		
//      $os_licenseidError	= null;
//        $autoupdatesystems_idError	= null;
//        $domains_idError = null;
//         $networks_idError = null;
	    $users_idError = null;
	    $is_dynamicError = null;	
        $groups_idError = null;
        $ticket_tcoError = null;	
        $uuidError = null;
        $commentError = null;
        $authorError = null;
//		$computermodels_idError = null;
//		$computertypes_idError = null;
			
        // keep track post values
		
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
		$adresseip = $_POST['adresseip'];

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

		$v=0;
	   $valid = true;  

//  echo "valid = $v <br> ";
   $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM vtictan_customers_computers where id=?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);		
		$entities_id = $data['entities_idcust'];
		$customers_id = $data['customers_idcust'];
// echo "customers_id=$customers_id <br> ";
	$pcname = $data['pcname'];
//		echo "pcname=$pcname <br>";
		$serial = $data['serial'];
		$customer_name = $data['customer_name'];
		$companynament = $data['companynament'];		
		$processor = $data['processor'];
		$ram = $data['ram'];
		$computermodels_id = $data['computermodels_id'];
		$computertypes_id = $data['computertypes_id'];
		$namemodel= $data['namemodel'];
		$nametype= $data['nametype'];
		$session_admin_name=$data['session_admin_name'];
		$session_admin_pwd=$data['session_admin_pwd'];
        $session_user_name=$data['session_user_name' ];
		$session_user_pwd=$data['session_user_pwd'];
		$teamv_logname=$data['teamv_logname'];
        $teamv_pwd=$data['teamv_pwd'];
		$domain_name=$data['domain_name'];
		$adresseip=$data['adresseip'];
		$location=$data['location'];
		$comment=$data['comment'];
		$author=$data['author'];
		$date_mod=$data['date_mod'];
		$is_deleted=$data['is_deleted']; 

?>