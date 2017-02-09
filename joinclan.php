<?php require_once('Connections/clandata.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
mysql_select_db($database_clandata, $clandata);
$searchmyclan = mysql_query ( "select ClanCode FROM clanmember where Code='".$_SESSION['MM_Username']."'",$clandata);
$infomyclan=mysql_fetch_array($searchmyclan);
if($infomyclan['ClanCode']==""){

	$searchclan = mysql_query ( "select ClanCode FROM clan where ClanCode='".$_GET['ClanCode']."'",$clandata);
	if(mysql_fetch_array($searchclan)){
	$joinclan = mysql_query ( "insert INTO joinclan VALUES ('".$_SESSION['MM_Username']."','".$_GET['ClanCode']."')",$clandata);

	 echo "<script>alert('已申请，请等待首领批准！');window.history.back();</script>";
	}
	else{
			 echo "<script>alert('该部落尚未注册！');window.history.back();</script>";
	}
}
else{
		 echo "<script>alert('您已经有部落了！');window.history.back();</script>";
		}
?>
