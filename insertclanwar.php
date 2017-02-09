<?php require_once('Connections/clandata.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
mysql_select_db($database_clandata, $clandata);
if($_POST['MyStar']>=$_POST['EnemyStar']){
	$WinClan=$_SESSION['MM_Clan'];
}else{
	$WinClan=$_POST['EnemyCode'];
}

$insertclanwar = mysql_query ( "insert into clanwar (WarTime,WarMemberNum,WinClan) VALUES ('".$_POST['WarTime']."','".$_POST['WarMemberNum']."','".strtoupper($WinClan)."')", $clandata);

$autoid=mysql_insert_id();

$myclanstar= mysql_query( "insert into clanvsclan (ClanCode,ClanWarID,ClanWarStar) VALUES ('".strtoupper($_SESSION['MM_Clan'])."','".$autoid."','".$_POST['MyStar']."')",$clandata);
$enemyclanstar= mysql_query( "insert into clanvsclan (ClanCode,ClanWarID,ClanWarStar) VALUES ('".strtoupper($_POST['EnemyCode'])."','".$autoid."','".$_POST['EnemyStar']."')",$clandata);

	echo "<script>alert('插入完成！');window.history.back();</script>";

?>
