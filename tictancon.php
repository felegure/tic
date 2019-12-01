<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_tictan = "localhost";
$database_tictan = "tictan";
$username_tictan = "root";
$password_tictan = """;
$tictan = mysql_pconnect($hostname_tictan, $username_tictan, $password_tictan) or die(mysql_error());

?>