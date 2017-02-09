<?php require_once('Connections/clandata.php'); ?>

<?php
session_start();
 
 
mysql_select_db($database_clandata, $clandata);


  $deleteclanwar = mysql_query ( "delete from clanword where CID='".$_GET['CID']."'",$clandata);

 echo "<script>alert('已删除这条部落留言！');window.history.back();</script>";
?>