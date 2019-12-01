<?php

// $db_user = 'root';
// $db_pass = '';
// define ('USER',"root");  changement de user ce 22 juin 2011
// define ('PASSWORD',"");
/*
$hostname_tictan = "localhost";
$database_tictan = "tictan";
$username_tictan = "root";
$password_tictan = "";
define ('USER',"root");
define ('PASSWORD',"");
define ('SERVER',"localhost");
define ('BASE',"tictan");
	$connection = mysql_connect(SERVER, USER, PASSWORD) or die(mysql_error());
	mysql_select_db(BASE, $connection) or die(mysql_error());

	
$dns = 'mysql:host=localhost;dbname=tictan';

$username_tictan= 'root';
$password_tictan = '';
$connection = new PDO( $dns, $username_tictan, $password_tictan);
	
*/
try
{
    $conn = new PDO('mysql:host=localhost;dbname=tictan', "root", "");
}
catch(Exception $e)
{
     echo 'Erreur : '.$e->getMessage().'<br />';
    echo 'N° : '.$e->getCode();
	
   echo 'Echec de la connexion à la base de données';
    exit();
}
?>
