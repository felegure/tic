<?php
 echo "WWWWWWWWWWWWWWWWWW init_fields_upd_disks.php <br>";
        $serial = $_POST['serial'];
      	
 //       $pcname = $_POST['pcname'];

    //    $domain_name = $_POST['domain_name'];   	
  	    $entities_id = $_POST['entities_id'];
		$customers_id = $_POST['customers_id'];
	    $computers_id = $_POST['computers_id'];			
 echo "WWWWWWWWWWWWWWWWWW init_fields_upd_disks.php customers_id=$customers_id <br> ";
		$name = $_POST['name'];	
		echo "name=$name <br>";
		$serial = $_POST['serial'];
        $supplier = $_POST['supplier']

		$customer_name = $_POST['customer_name'];
		$companyname = $_POST['companyname'];
		$diskmodels_id = $_POST['diskmodels_id'];
		$disktypes_id = $_POST['disktypes_id'];
		$namemodel= $_POST['namemodel'];
		$nametype= $_POST['nametype'];

		$partition1=$_POST['partition1'];
		$partition2=$_POST['partition2'];	
		$partition3=$_POST['partition3'];		
	
    	$comment=$_POST['comment'];
     	$author=$_POST['author'];
		$date_mod=$_POST['date_mod'];
		$is_deleted=$_POST['is_deleted'];
  
  $id = $_POST['id'];
 //echo "entities=$entities_id <br>";
        $is_deleted = 0;
	
?>