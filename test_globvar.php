<?php 
 include "./entete.php";  
				if (isset($_GET["entities_id"])) {
				$entities_id=$_GET["entities_id"];
				$_SESSION["entities_id"] = $entities_id;
				echo "entities_id=$identities_id <br>";
				}
				if (isset($_GET["companynament"])) {
				$companynament=$_GET["companynament"];
				$_SESSION["companynament"] = $companynament;
				}
				if (isset($_GET["customer_id"])) {
				$customer_id=$_GET["customer_id"];
				$_SESSION["customer_id"] = $customer_id;	
	echo "customer_id=$customer_id <br>";				
				}
				if (isset($_GET["customer_name"])) {
				$customer_name=$_GET["customer_name"];
				$_SESSION["customer_name"] = $customer_name;
				}
?>			