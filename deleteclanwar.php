<?php require_once('Connections/clandata.php'); ?>

<?php
session_start();
 
 
mysql_select_db($database_clandata, $clandata);


  $deleteclanwar = mysql_query ( "delete from clanwar where ClanWarID='".$_GET['ClanWarID']."'",$clandata);

 $deleteclanwar = mysql_query ( "delete from clanvsclan where ClanWarID='".$_GET['ClanWarID']."'",$clandata);

 echo "<script>alert('已删除这条部落战记录！');window.history.back();</script>";
?>