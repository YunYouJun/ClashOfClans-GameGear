<?php require_once('Connections/clandata.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
mysql_select_db($database_clandata, $clandata);

$deletejoin= mysql_query ( "delete FROM joinclan where ClanCode='".$_GET['ClanCode']."' and Code='".$_SESSION['MM_Username']."'",$clandata);

 echo "<script>alert('已取消申请请求！');window.history.back();</script>";

?>
