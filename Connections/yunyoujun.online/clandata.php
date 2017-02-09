<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_clandata = "localhost";
$database_clandata = "clashofclans";
$username_clandata = "root";
$password_clandata = "yang19970730";
$clandata = mysql_pconnect($hostname_clandata, $username_clandata, $password_clandata) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_query("set names 'utf8'");   
$WebName="部落冲突-GameGear";
?>