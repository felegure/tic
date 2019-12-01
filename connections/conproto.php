<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_conproto = "localhost";
$database_conproto = "cibase";
$username_conproto = "root";
$password_conproto = "";
$conproto = mysql_pconnect($hostname_conproto, $username_conproto, $password_conproto) or die(mysql_error());
?>