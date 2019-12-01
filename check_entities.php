<?php
//***************************************
// This is downloaded from www.plus2net.com //
/// You can distribute this code with the link to www.plus2net.com ///
//  Please don't  remove the link to www.plus2net.com ///
// This is for your learning only not for commercial use. ///////
//The author is not responsible for any type of loss or problem or damage on using this script.//
/// You can use it at your own risk. /////
//*****************************************
if(!isset($_SESSION['flag'])) {
session_start();
$_SESSION['flag'] = true;
}

echo "check_entities   <br>";
?>

<!doctype html public "-//w3c//dtd html 3.2//en">

<html>

<head>
<title>Check_entities</title>
</head>

<body>
<?php

echo "check_entities   <br>";
  if ( !empty($_GET['entities_id']) && (is_numeric(intval($_GET['entities_id'])))) {
                $entities_id  = $_REQUEST['entities_id'];			
	
}
else {
  $entities_id=$_POST['entities_id'];
 }	
$nomprog = $_SESSION['type'] ;
 if ( !empty($_GET['nomprog'])) {
				echo "YYYY nomprog=$nomprog <br>";
 }
else 
  $nomprog=$_POST['nomprog'];
echo "Value of \$entities_id = $entities_id <br>";
 echo " XXX Value of \$nomprog = $nomprog <br>";
 $nomprog = $_SESSION['type'] ;
switch($nomprog){
  case 'accessories':
	{
	 header("Location: index_cust_choose.php?entities_id=$entities_id&type=$nomprog");
	 break;
	}
 case 'customers':
	{
	echo "nomprog=$nomprog <br>";
	 header("Location: index_cust_choose.php?entities_id=$entities_id&type=$nomprog");
	 break;
	}	
  case 'computers':
  {
	 header("Location: index_cust_choose.php?entities_id=$entities_id&type=$nomprog");
  break;
  }
    case 'computers_comp':
  {
	 header("Location: index_cust_choose.php?entities_id=$entities_id&type=$nomprog");
  break;
  }
  case 'printers':
  {
    header("Location: index_cust_choose.php?entities_id=$entities_id&type=$nomprog");
  break;
  }
  case 'copiers':
  {
	header("Location: index_cust_choose.php?entities_id=$entities_id&type=$nomprog");
  break;
  }
  case 'softwares':
  {
	header("Location: index_cust_choose.php?entities_id=$entities_id&type=$nomprog");
  break;
  }
  case 'networks':
  {
	header("Location: index_cust_choose.php?entities_id=$entities_id&type=$nomprog");
  break;
  }
 case 'monitors':
 {
	header("Location: index_cust_choose.php?entities_id=$entities_id&type=$nomprog");
    break;
 }
 case 'disks':
 {
	header("Location: index_cust_choose.php?entities_id=$entities_id&type=$nomprog");
    break;
 }
  case 'virtuels':
 {
	header("Location: index_cust_choose.php?entities_id=$entities_id&type=$nomprog");
    break;
 }
 default: 
 {
 echo "nomprog=$nomprog <br> ";
  header("Location: index_cust.php&entities_id=$entities_id");
  break;
 }
}
?>

</body>

</html>
