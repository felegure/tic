<?php

// $db_user = 'root';
// $db_pass = '';
// define ('USER',"root");  changement de user ce 22 juin 2011
// define ('PASSWORD',"");
$hostname_tictan = "localhost";
$database_tictan = "tictan";
$username_tictan = "root";
$password_tictan = "";
define ('USER',"root");
define ('PASSWORD',"");
define ('SERVER',"localhost");
define ('BASE',"tictan");

$connection = mysqli_connect(SERVER, USER, PASSWORD, BASE) or die(mysql_error());

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?> 
	
