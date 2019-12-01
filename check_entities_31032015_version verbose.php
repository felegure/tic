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
?>

<!doctype html public "-//w3c//dtd html 3.2//en">

<html>

<head>
<title>Check_entities</title>
</head>

<body>
<?php

  if ( !empty($_GET['entities_id']) && (is_numeric(intval($_GET['entities_id'])))) {
                $entities_id  = $_REQUEST['entities_id'];			
	
}
else {
//$entities_id = $_SESSION["entities_id"];
  $entities_id=$_POST['entities_id'];
//	echo "EMPTY  entities_id=$entities_id + $entities_id <br>";	
	
 }	

 // $nomprog=$_POST['nomprog'];
// echo "Value of \$entities_id = $entities_id <br>";
// echo "Value of \$nomprog = $nomprog <br>";

// $nomprog=$_POST['nomprog'];
$nomprog = $_SESSION['type'] ;
echo " apres session XXX Value of \$nomprog = $nomprog <br>";
 if ( !empty($_GET['nomprog'])) {
   //             $nomprog  = $_REQUEST['nomprog'];		
				echo "YYYY nomprog=$nomprog <br>";
 }
else 
  $nomprog=$_POST['nomprog'];
//echo "Value of \$entities_id = $entities_id <br>";
 echo " XXX Value of \$nomprog = $nomprog <br>";
 $nomprog = $_SESSION['type'] ;
switch($nomprog){
  case 'accessories':
	{
	 header("Location: index_cust_choose.php?entities_id=$entities_id&type=$nomprog");
	 break;
	}
  case 'computers':
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
 default: 
 {
 echo "nomprog=$nomprog <br> ";
//  header("Location: index_cust.php&entities_id=$entities_id");
  break;
 }
}
?>

</body>

</html>
