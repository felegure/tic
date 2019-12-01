<?php
 if(!isset($_SESSION['flag'])) {
 session_start();
 $_SESSION['flag'] = true;
// echo "session_started";
 $profil =$_SESSION['profilAccess'];
//echo "profil dans index_accessories.php = $profil <br>";

}
// recuperation des variables de select session pour le passage de parametres d'une forme a une autre
   
	$username=$_SESSION["username"] ;
	if ($type!='general'){
	$entities_id = $_SESSION["entities_id"];
	$companyname = $_SESSION["companyname"];
	$customers_id = $_SESSION["customers_id"];												
	$customer_name = $_SESSION["customer_name"] ;
	if ($type != 'networks' && $type != 'printers') {
	$computers_id = $_SESSION["computers_id"];												
	$computer_name = $_SESSION["computer_name"] ;
	$pcname=$_SESSION["pcname"] ;
	}
	}
// 	echo "create_cust_comp_virtuels.php , entities_id = $entities_id , companynament = $companynament <br>";
// 	echo "create_cust_comp_virtuels.php customers_id = $customers_id , customer_name = $customer_name <br>";
// 	echo "create_cust_comp_virtuels.php computers_id = $computers_id , pcname = $pcname <br>";
?>
