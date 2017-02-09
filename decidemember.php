<?php require_once('Connections/clandata.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
mysql_select_db($database_clandata, $clandata);
if($_GET['decide']=="yes"){
	$updateclancode = mysql_query ( "update clanmember set ClanCode='".$_SESSION['MM_Clan']."' where Code='".strtoupper($_GET['Code'])."'",$clandata);

	$sqlnum=mysql_query("select count(*) as total from clanmember where ClanCode='".$_SESSION['MM_Clan']."'",$clandata);
	$infonum=mysql_fetch_array($sqlnum);
	$updateclanmembernum = mysql_query ( "update clan set MemberNum='".$infonum['total']."' where ClanCode='".$_SESSION['MM_Clan']."'",$clandata);

	$deletejoin = mysql_query ( "delete from joinclan where Code='".strtoupper($_GET['Code'])."'",$clandata);
	 echo "<script>alert('已批准加入！');window.history.back();</script>";
}
elseif ($_GET['decide']=="no") {
	$deletejoin = mysql_query ( "delete from joinclan where Code='".$_GET['Code']."' and ClanCode='".$_SESSION['MM_Clan']."'",$clandata);
	echo "<script>alert('已拒绝加入！');window.history.back();</script>";
}

?>
