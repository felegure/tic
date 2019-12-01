<?php
echo "checkFields_cust_upd_virtuels.php <br>";
        $customers_idError = null;
        $computers_idError = null;		
        $entities_idError = null;
		
        $serialError = null;		
        $date_modError = null;		

        $is_deletedError = null;
        $commentError = null;
        $authorError = null;
		$entities_id = $_POST['entities_id'];
		$customers_id = $_POST['customers_id'];		
		$computers_id = $_POST['computers_id'];		
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
       echo "checkFields_cust_upd_virtuels.php computers_id=$computers_id <br>";
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM vtictan_cust_comp_virtuels where id=".$computers_id;
		echo "  XXXXXXXX sql = $sql <br>";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);		
		$entities_id = $data['entities_id'];
		$customers_id = $data['customers_id'];
		$computers_id = $data['computers_id'];				
// echo "customers_id=$customers_id <br> ";
	//	$customer_name = $data['customer_name'];
		$companyname = $data['companyname'];		
		$pcname = $data['pcname'];
		$drivename = $data['drivename'];
		$password = $data['password'];		
//		$comment = $data['comment'];
		$author = $data['author'];
		$is_deleted = $data['is_deleted'];
?>