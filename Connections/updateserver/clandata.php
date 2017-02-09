<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_clandata = "sql303.idcnet.top";
$database_clandata = "dazh_19100823_clashofclans";
$username_clandata = "dazh_19100823";
$password_clandata = "yang19970730";
$clandata = mysql_pconnect($hostname_clandata, $username_clandata, $password_clandata) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_query("set names 'utf8'");   
?>