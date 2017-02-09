<?php require_once('Connections/clandata.php'); ?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}


?>

<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$fromurl="index.php";
if(!isset($_SESSION['MM_Username']))
 {
   echo "<script>alert('请先登录个人账号！');window.history.back();</script>";
// header("Location:".$fromurl);
 } 
 
mysql_select_db($database_clandata, $clandata);
     $sqlmemberclan=mysql_query("select * from clanmember where Code='".$_SESSION['MM_Username']."'",$clandata);
     $infomemberclan=mysql_fetch_array($sqlmemberclan);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>部落冲突BOX</title>

<?php
include("headlink.php");
?>

<style>

body
{
	font-family: "微软雅黑","幼圆", "楷体", "隶书", "华文隶书", "黑体",  "华文行楷";	
     font-family: "Microsoft YaHei",Arial,Helvetica,sans-serif;	
	background-image: url(images/loginback.jpg);
	background-attachment:scroll;
	background-size:cover;
	background-repeat: no-repeat;
	background-position:center;
  color: #fff;
}
</style>
<script>
function ready(){
document.getElementById("clanword").classList.add('active');

}
</script>


</head>

<body onLoad="ready()"><?php
include("navbar.php");
?>


<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h1 class="text-center">部落留言</h1>
    </div>
  </div>
  <hr style="opacity:0.3">
  <?php 
   if($infomemberclan['ClanCode']==""){
        echo "<script>window.location.href='clanmember.php';</script>";
   }
   ?>
</div>

 <div class="container">

  <div class="row yunyouback">
    <div class="text-center col-md-12" >
    
    <table width align="center" cellpadding="0" cellspacing="0" class="col-md-12" border="1px">
           <tr style="font-size:large;font-family:'幼圆', '隶书', '华文隶书';font-weight:bold;" height="40">
          <th ><div align="center">留言ID</div></th>
          <th ><div align="center">留言者ID</div></th>
          <th ><div align="center">留言者</div></th>
          <th ><div align="center">留言时间</div></th>
          <th width="666"><div align="center">留言内容</div></th>
          </tr>

<?php
     $sqlclanwordnum=mysql_query("select count(*) as total from clanword where ClanCode='".$infomemberclan['ClanCode']."'",$clandata);
        $infoclanwordnum=mysql_fetch_array($sqlclanwordnum);

     $sqlclanword=mysql_query("select * from clanword where ClanCode='".$infomemberclan['ClanCode']."'",$clandata);
        while($infoclanword=mysql_fetch_array($sqlclanword))
         {
      ?>
        <tr height="35" style="font-family:'Supercell-Magic_5';FONT-WEIGHT:bold;">

          <td ><div align="center"><?php echo $infoclanword['CID'];?></div></td>
          <td ><div align="center" style="text-transform:uppercase;"><?php echo $infoclanword['Code'];?></div></td>
          <?php   $sqlclanname=mysql_query("select * from clanmember where Code='".$infoclanword['Code']."'",$clandata);
$infoclanname=mysql_fetch_array($sqlclanname);?>
          <td ><div align="center"><?php echo $infoclanname['VillageName'];?></div></td>
          <td ><div align="center"><?php echo $infoclanword['CTIME'];?></div></td>
          <td ><div align="left" style="padding-left: 5px;"><?php echo $infoclanword['Cword'];?></div></td>
          </tr>
<?php }
?>
          
   </table>
   
    </div>
  </div>
  <hr>
</div>
<?php

if($infoclanwordnum['total']==0){
  echo "<h3 class='text-center'>暂无留言</h3><hr>";
}
?>

<div class="container yunyouback" style="padding:20px;">
  <div class="col-md-12">
  <h3 class='text-center'>发表您的留言</h3>
                  <form method="POST" action="insertword.php" name="yourword" role="form" id="clanword">
                                <br>
                  <div class="form-group has-feedback">
                    <textarea class="form-control" rows="5" id="message" placeholder="您的留言内容" name="Cword" required></textarea>
                    <i class="glyphicon glyphicon-comment form-control-feedback"></i>
                  </div>

                  <div class="form-group">
                  <button type="submit" value="发&nbsp;&nbsp;&nbsp;表" class="btn btn-lg btn-block btn-inverse" >发&nbsp;&nbsp;&nbsp;表</button>
                                    </div>
                </form>
  </div>
</div>

<?php
include("foot.php");
?>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery-1.11.3.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.js"></script>

</body>
</html>

