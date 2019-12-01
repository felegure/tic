<?php
        $serial = $_POST['serial'];
        $name = $_POST['name'];
		$customers_id = $_POST['customers_id'];
		$entities_id = $_POST['entities_id'];
		$comment=$_POST['comment'];
//echo "entities=$entities_id <br>";
		$location = $_POST['location'];		
//		$os_licenseid = $_POST['os_licenseid'];
//       $autoupdatesystems_id = $_POST['autoupdatesystems_id'];
//        $domains_id = $_POST['domains_id'];		
//        $networks_id = $_POST['networks_id'];

        $monitormodels_id = $_POST['monitormodels_id'];
		$monitortypes_id = $_POST['monitortypes_id'];
		
        $is_deleted = 0;
 
        $comment = $_POST['comment'];
        $author = $_POST['author'];

		$date_mod = $_POST['date_mod'];
		$is_deleted = 0;
?>