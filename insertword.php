<?php require_once('Connections/clandata.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
mysql_select_db($database_clandata, $clandata);

$sqlclan = mysql_query("select ClanCode from clanmember Where Code='".$_SESSION['MM_Username']."'",$clandata);
$infoclan =mysql_fetch_array($sqlclan);
$insertclanword = mysql_query ( "insert into clanword (ClanCode,Code,Cword) VALUES ('".$infoclan['ClanCode']."','".$_SESSION['MM_Username']."','".$_POST['Cword']."')", $clandata);

	echo "<script>alert('发表成功！');window.history.back();</script>";

?>
