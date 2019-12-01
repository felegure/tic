 <?php
if(!isset($_SESSION['flag'])) {
session_start();
$_SESSION['flag'] = true;
}
 $profil = $_SESSION['profilAccess'];
 $inclure='./entete'.$profil.'.php';
//				echo "inclure = $inclure <br>";
 include_once $inclure ;

 if (isset($_GET["entities_id"])) {
 $entities_id=$_GET["entities_id"];
 $_SESSION["entities_id"] = $entities_id;
 }
 if (isset($_GET["companyname"])) {
 $companyname=$_GET["companyname"];
 $_SESSION["companyname"] = $companyname;
 }
 if (isset($_GET["customers_id"])) {
 $customers_id=$_GET["customers_id"];
 $_SESSION["customers_id"] = $customers_id;												
 }
 if (isset($_GET["customer_name"])) {
 $customer_name=$_GET["customer_name"];
 $_SESSION["customer_name"] = $customer_name;
 }
 if (isset($_GET["computers_id"])) {
 $computers_id=$_GET["computers_id"];
 
  //echo "computers_id XX=$computers_id <br>";
 $_SESSION["computers_id"] = $computers_id;
 }
 if (isset($_GET["computer_name"])) {
 $computer_name=$_GET["computer_name"];
 $pcname = $_GET["computer_name"];
// echo "pcnameXX=$pcname <br>";
 $_SESSION["computer_name"] = $computer_name;
 $_SESSION["pcname"] = $computer_name;
 }
 
 if (empty($companynament)) {
 $companyname = $_SESSION["companyname"] ;
 }
 
 if (empty($entities_id)) {
 $entities_id = $_SESSION["entities_id"] ;
 }				
//echo " entete_variables , entities_id=$entities_id <br>";
 if (empty($customers_id)) {
 $customers_id = $_SESSION["customers_id"] ;
 }				
 if (empty($customer_name)) {
 $customer_name = $_SESSION["customer_name"] ;
 }
 //echo "type=$type <br>";
 if (isset($type)) {

    if ($type != 'networks' && $type != 'computers_comp' && $type != 'printers' && 
	     $type =! 'accessories' && $type != 'copiers') {
		if (empty($pcname)) {
 echo "pcname=$pcname <br>";
		$pcname = $_SESSION["computer_name"] ;
		}
	}
    if ($type != 'networks' && $type != 'computers_comp' && $type != 'printers' && 
	     $type =! 'accessories' && $type != 'copiers') 
	{
       if (empty($computers_id)) {
       $computers_id = $_SESSION["computers_id"] ;
  echo "empty computers_id = $computers_id <br>";
      }
	  if (empty($computer_name)) {
      $computer_name = $_SESSION["computer_name"] ;
      }
   }
 }  
 ?>