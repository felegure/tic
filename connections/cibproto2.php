<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_cibproto2 = "localhost";
$database_cibproto2 = "cibproto";
$username_cibproto2 = "root";
$password_cibproto2 = "";
$cibproto2 = mysql_pconnect($hostname_cibproto2, $username_cibproto2, $password_cibproto2) or trigger_error(mysql_error(),E_USER_ERROR); 
?>