<?php
session_start();

require ("connectpdo.php");

$user_name = $_POST['login'];
$password = $_POST['password']; 
$pAccess = "";
$pUser=@$_POST['login'];
$pPasswd=@$_POST['password'];
echo "Validatetest.php <br>";
echo "pUser=$pUser pPasswd=$pPasswd<br>";

$query='select * from tictan_users where userid="';
$query=$query.$pUser.'"'. ' and password="'. $pPasswd. '"'. ' and profil =0';
$connection = new PDO('mysql:host=localhost;dbname=tictan', 'root', '');
echo "query=$query <br>";
$cpt=0;
foreach($connection->query($query) as $row){
	print_r($row);
	$cpt++;
	}
if ($cpt!=1) {
require_once ("index_w.php");
}
else {
$pAccess='A';
$_SESSION['username'] = $pUser; 
$_SESSION['Access'] = $pAccess;
echo "on continue le traitement A <br>";
require_once("indexcrud.php");
exit;
}
$query='select * from tictan_users where userid="';
$query=$query.$pUser.'"'. ' and password="'. $pPasswd. '"'. ' and profil ="B"';
$connection = new PDO('mysql:host=localhost;dbname=tictan', 'root', '');
echo "$query=$query <br>";
$cpt=0;
foreach($connection->query($query) as $row){
	print_r($row);
	$cpt++;
	}
if ($cpt!=1) {
require_once ("index_w.php");
}
else {
$pAccess='B';
$_SESSION['username'] = $pUser; 
$_SESSION['Access'] = $pAccess;
echo "on continue le traitement B <br>";
}

$query='select * from tictan_users where userid="';
$query=$query.$pUser.'"'. ' and password="'. $pPasswd. '"'. ' and profil ="C"';
$connection = new PDO('mysql:host=localhost;dbname=tictan', 'root', '');
echo "$query=$query <br>";
$cpt=0;
foreach($connection->query($query) as $row){
	print_r($row);
	$cpt++;
	}
if ($cpt!=1) {
require_once ("index_w.php");
}
else {
$pAccess='';
$_SESSION['username'] = $pUser; 
$_SESSION['Access'] = $pAccess;
echo "on continue le traitement C <br>";

}
//echo "username=$pPuser profil=$pAccess  <br>";
//require_once ("affiche_maincib_1.php"); 


?>