<?php
echo "checkFields_cust_upd_disks.php <br>";
        $customers_idError = null;
        $computers_idError = null;		
        $entities_idError = null;
		
        $serialError = null;		
        $date_modError = null;		
		$nameError = null;
        $is_deletedError = null;
	    $partition1Error	 = null;		
	    $partition2Error = null;	
        $partition3Error = null;	
        $uuidError = null;
        $commentError = null;
        $authorError = null;
		$diskmodels_id = null;
		$disktypes_id = null;
        // keep track post values
		$serial = $_POST['serial'];
		$entities_id = $_POST['entities_id'];
		$customers_id = $_POST['customers_id'];		
//		$computers_id = $_POST['computers_id'];		
//echo "entities=$entities_id <br>";

        $name=$_POST['name'];
        $partition1=$_POST['partition1'];
		$partition2=$_POST['partition2'];
		$partition3=$_POST['partition3'];
echo "assignation POST name=$name, 		partition1=$partition1, partition2=$partition2 <br>";
        $diskmodels_id = $_POST['diskmodels_id'];
		$disktypes_id = $_POST['disktypes_id'];		
 
        $comment = $_POST['comment'];
        $author = $_POST['author'];
		$date_mod = $_POST['date_mod'];
		$is_deleted = 0;
		
		//$_POST['is_deleted'];
		$v=0;
	    $valid = true;  
/* 
 if (empty($entities_id)) {
            $entities_idError = 'Entrez le nom du Client/Entite';
            $valid = false;
			$v=1;
        }	   

        if (empty($diskmodels_id)) {
            $diskmodels_idError = "Choisissez le modele de disque";
            $valid = false;
			$v=1111111;
        }
 		echo "disktypes_id=$disktypes_id<br>)";		
    	if (empty($disktypes_id)) {
            $disktypes_idError = "Choisissez le type" ;
            $valid = false;
			$v=10;
        }
*/
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM vtictan_cust_comp_disk where id=?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);		
		$entities_id = $data['entities_id'];
		$customers_id = $data['customers_id'];
		$computers_id = $data['computers_id'];				
// echo "customers_id=$customers_id <br> ";
		$customer_name = $data['customer_name'];
		$companyname = $data['companyname'];		
		$pcname = $data['pcname'];
//		$name = $data['name'];
		$serial = $data['serial'];
		$namemodel = $data['namemodel'];
		$nametype = $data['nametype'];
		$supplier = $data['supplier'];
	 echo "checkFields_cust_upd_disks.php customers_id=$customers_id,  supplier=$supplier <br> ";	
  //      $partition1 = $data['partition1'];
//		$partition2= $data['partition2'];
//		$partition3 = $data['partition3'];
//		$comment = $data['comment'];
		$author = $data['author'];
		$is_deleted = $data['is_deleted'];
?>