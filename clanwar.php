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
$sqlclan = mysql_query ( "select * from clan where ClanCode='".$_SESSION['MM_Clan']."'",$clandata);
$infoclan = mysql_fetch_array($sqlclan);

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
}
</style>
<script>
function ready(){
  document.getElementById("myclan").classList.add('active');
document.getElementById("clanwar").classList.add('active');

}
</script>


</head>

<body onLoad="ready()"><?php
include("navbar.php");
?>


<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h1 class="text-center">部落战</h1>
    </div>
  </div>
  <hr style="opacity:0.3">
</div>


 <div class="container">

  <div class="row yunyouback">
    <div class="text-center col-md-12" >
    
    <table width align="center" cellpadding="0" cellspacing="0" class="col-md-12" border="1px" >
           <tr style="font-size:large;font-family:'幼圆', '隶书', '华文隶书';font-weight:bold;" height="40">
          <th ><div align="center">部落战ID</div></th>
          <th ><div align="center">部落战时间</div></th>
          <th ><div align="center">部落战人数</div></th>
          <th ><div align="center">敌方部落标签</div></th>
          <th ><div align="center">敌方部落名称</div></th>
          <th ><div align="center">我方|星数|敌方</div></th>
          <th ><div align="center">删除</div></th>
          </tr>
<?php
     $sqlclanvsclan=mysql_query("select * from clanvsclan where ClanCode='".$_SESSION['MM_Clan']."'",$clandata);
        while($infoclanvsclan=mysql_fetch_array($sqlclanvsclan))
         {
            $sqlclanwar=mysql_query("select * from clanwar where ClanWarID='".$infoclanvsclan['ClanWarID']."'",$clandata);
$infoclanwar=mysql_fetch_array($sqlclanwar);
      ?>
        <tr height="35" style="font-family:'Supercell-Magic_5';FONT-WEIGHT:bold;<?php if(strtoupper($infoclanwar['WinClan'])==strtoupper($_SESSION['MM_Clan']))echo "color:#00ff00";else echo "color:#ff0000";?>">

          <td ><div align="center"><?php echo $infoclanwar['ClanWarID'];?></div></td>
          <td ><div align="center"><?php echo $infoclanwar['WarTime'];?></div></td>
          <td ><div align="center"><?php echo $infoclanwar['WarMemberNum'];?></div></td>
<?php   $sqlenemyclan=mysql_query("select * from clanvsclan where ClanWarID='".$infoclanvsclan['ClanWarID']."' and ClanCode!='".$_SESSION['MM_Clan']."'",$clandata);
$infoenemyclan=mysql_fetch_array($sqlenemyclan);?>
          <td ><div align="center"><?php echo $infoenemyclan['ClanCode'];?></div></td>
<?php   $sqlenemyname=mysql_query("select * from clan where ClanCode='".$infoenemyclan['ClanCode']."'",$clandata);
$infoenemyname=mysql_fetch_array($sqlenemyname);?>
          <td ><div align="center"><?php echo $infoenemyname['ClanName'];?></div></td>
<?php   $sqlstar=mysql_query("select * from clanvsclan where ClanCode='".$_SESSION['MM_Clan']."' and ClanWarID='".$infoclanvsclan['ClanWarID']."'",$clandata);
$infostar=mysql_fetch_array($sqlstar);?>
          <td ><div align="center"><?php echo $infostar['ClanWarStar'];?> <span style="color: #fff;" class="glyphicon glyphicon-transfer"></span> <?php echo $infoenemyclan["ClanWarStar"];?></div></td>
          <td><div align="center"><a href="deleteclanwar.php?ClanWarID=<?php echo $infoclanwar['ClanWarID'];?>"><span style="color: #f00;" class="glyphicon glyphicon-remove" onclick="return confirm('确定要删除这条部落战记录吗？')"></span></a></div></td>
          </tr>

        <?php
}
?>  
   </table>
   
    </div>
  </div>
  <hr>
</div>

<hr>
 <div class="container  yunyouback">
 <form class="form-horizontal col-md-12" method="post" action="insertclanwar.php" id="clanwarform">
    <div class="row text-center">
    <h3>登记部落战信息</h3>
   
    <table width align="center" cellpadding="0" cellspacing="0" class="col-md-12" border="1px" >
           <tr style="font-size:large;font-family:'幼圆', '隶书', '华文隶书';font-weight:bold;" height="40">
          <th ><div align="center">部落战时间</div></th>
          <th ><div align="center">部落战人数</div></th>
          <th ><div align="center">敌方部落标签</div></th>
          <th ><div align="center">我方|星数|敌方</div></th>
          </tr>

        <tr height="35" style="font-family:'Supercell-Magic_5';FONT-WEIGHT:bold;">

          <td ><div align="center"><input type="datetime-local" name="WarTime" class="form-control" required="required"></div></td>
          <td ><div align="center"><input type="number" name="WarMemberNum" class="form-control" min="10" max="50" required="required"></div></td>
          <td ><div align="center"><input type="text" name="EnemyCode" class="form-control" style="text-transform: uppercase;" required="required"></div></td>
          <td ><div align="center" class="form-inline"><input type="number" name="MyStar" class="form-control" min="0" max="150" required="required"><span style="color: #fff;" class="glyphicon glyphicon-transfer"></span><input type="number" name="EnemyStar" class="form-control" min="0" max="150" required="required"></div></td>
          </tr>

   </table>

    </div>
  <br>
         <div class="row">
       <div class="col-md-6 col-md-offset-3">
       <button type="submit" class="btn btn-inverse btn-lg btn-block" form="clanwarform" value="Submit">插入</button>
       </div>

<br>
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

