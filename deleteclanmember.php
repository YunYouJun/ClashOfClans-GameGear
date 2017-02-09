<?php require_once('Connections/clandata.php'); ?>

<?php
session_start();
 
 
mysql_select_db($database_clandata, $clandata);

if ((isset($_GET['Code'])) && ($_GET['Code'] != "")) {
  $updateSQL = sprintf("update clanmember SET Position=0,ClanCode =null WHERE Code='".$_GET['Code']."'");

  $sqlnum=mysql_query("select MemberNum from clan where ClanCode='".$_SESSION['MM_Clan']."'",$clandata);
$infonum=mysql_fetch_array($sqlnum);
$nownum=$infonum['MemberNum']-1;
  $updateclanmembernum = mysql_query ( "update clan set MemberNum='".$nownum."' where ClanCode='".$_SESSION['MM_Clan']."'",$clandata);

  $kickrs = mysql_query($updateSQL, $clandata) or die(mysql_error());
  
  $mark=mysql_affected_rows();//返回影响行数
if($mark>0){
 echo "<script>alert('已踢出！');window.history.back();</script>";
}else{
 echo  "<script>alert('踢出失败！');window.history.back;</script>";
}
}?>