<?php
session_start();

$hostname_tictan = "localhost";
$database_tictan = "tictan";
$username_tictan = "root";
$password_tictan = "";
define ('USER',"root");
define ('PASSWORD',"");
define ('SERVER',"localhost");
define ('BASE',"tictan");
//	$connection = mysql_connect(SERVER, USER, PASSWORD) or die(mysql_error());
//	mysql_select_db(BASE, $connection) or die(mysql_error());

	
$dns = 'mysql:host=localhost;dbname=tictan';

$username_tictan= 'root';
$password_tictan = '';

$user_name = $_POST['login'];
$password = $_POST['password']; 
$pAccess = "";
$pUser=@$_POST['login'];
$pPasswd=@$_POST['password'];
//echo "Validatetest.php <br>";
// echo "pUser=$pUser pPasswd=$pPasswd<br>";

$query='select * from tictan_users where userid="';
$query=$query.$pUser.'"'. ' and password="'.$pPasswd . '"';
// $query=$query.$pUser.'"'. ' and password="'. $pPasswd. '"'. ' and profil =0';
$connection = new PDO('mysql:host=localhost;dbname=tictan', 'root', '');
// echo "                                query=$query <br>";
$cpt=0;
foreach($connection->query($query) as $row){
//	print_r($row);
	$cpt++;
	}
if ($cpt!=1) {
require_once ("index_w.php");
}
else {
$pAccess='0';
$_SESSION['username'] = $pUser; 
$_SESSION['Access'] = $pAccess;
$_SESSION['username'] = $user_name; 
$_SESSION['Access'] = $pAccess;

$_SESSION['profilAccess'] = $row['profil'];
$profil = $row['profil'];

require_once("index_cust_computerst.php");
exit;
}
?>