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
 header("Location:".$fromurl); exit;
 }
 
mysql_select_db($database_clandata, $clandata);
$VillageName = mysql_query ( "select VillageName from clanmember where Code='".$_SESSION['MM_Username']."'",$clandata);
$infomember = mysql_fetch_array($VillageName);

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
<style type="text/css">
  body {

  padding-top: 60px;
  font-family:"微软雅黑","幼圆", "楷体", "隶书", "华文隶书", "黑体",  "华文行楷";   
  background-image: url(images/loginback.jpg);
  background-attachment:fixed;
  background-size:auto;
  position: relative;
  background-repeat: no-repeat;
  background-position:center;
}
</style>
<script>
function ready(){
document.getElementById("clanmember").classList.add('active');
}
</script>


</head>

<body onLoad="ready()"><?php
include("navbar.php");
?>

    <?php
    		  $sqlclancode=mysql_query("select ClanCode from clanmember where Code='".$_SESSION['MM_Username']."'",$clandata);
		  $infoclancode=mysql_fetch_array($sqlclancode);
		  
		  if($infoclancode['ClanCode']!=null){
		  ?>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h1 class="text-center">部落成员</h1>
    </div>
  </div>
  <hr style="opacity:0.3">
</div>
<div class="container-fluid">

  <div class="row ">
    <div class="text-center " >
    <table align="center" cellpadding="0" cellspacing="0" class="col-md-12 yunyouback" border="1px" >
           <tr style="font-size:large;font-family:'幼圆', '隶书', '华文隶书';font-weight:bold;" height="40">
          <th ><div align="center">个人标签</div></th>
          <th ><div align="center">村庄名称</div></th>
          <th><div align="center">职位</div></th> 
          <th ><div align="center">个人等级</div></th>
          <th ><div align="center">大本营等级</div></th>
          <th ><div align="center">战星</div></th>
          <th ><div align="center">捐兵数</div></th>
          <th ><div align="center">电子邮箱</div></th>
          <th ><div align="center">QQ/微信</div></th>
          <th ><div align="center">匹配值</div></th>
          <th ><div align="center">科技防御</div></th>
          </tr>
          <?php  
            $sqlmember=mysql_query("select * from clanmember where ClanCode='".$infoclancode['ClanCode']."' order by Code ",$clandata);
             while($infomember=mysql_fetch_array($sqlmember))
		     {
		  ?>
        <tr style="font-family:'Supercell-Magic_5';FONT-WEIGHT:bold;">

          <td height="30"><div align="center"><?php echo $infomember['Code'];?></div></td>
          <td ><div align="center" ><a href="technologydefense.php?Code=<?php echo $infomember['Code'];?>" style="font-weight:bold;"><?php echo $infomember['VillageName'];?></a></div></td>
          <td ><div align="center"><?php if($infomember["Position"]==3) echo "首领";
	  else if($infomember["Position"]==2) echo "副首领";
	  else if($infomember["Position"]==1) echo "长老";
	  else if($infomember["Position"]==0) echo "成员";
	  ?></div></td>
          <td ><div align="center"><?php echo $infomember['Level'];?></div></td>
          <td ><div align="center"><?php echo $infomember['TownHallLevel'];?></div></td>
          <td ><div align="center"><?php echo $infomember['Star'];?></div></td>
          <td ><div align="center"><?php echo $infomember['Donation'];?></div></td>
          <td ><div align="center"><?php echo $infomember['Email'];?></div></td>
          <td ><div align="center"><?php echo $infomember['QQorWechat'];?></div></td>    
          <td ><div align="center"><?php echo $infomember['PKMatch'];?></div></td>      
          <td >
          <div><a href="technologydefense.php?Code=<?php echo $infomember['Code'];?>"><i class="glyphicon glyphicon-th-list"></i></a></div></td>       
          </tr>
          <?php
			 }
			 ?>
          
   </table>
  </div>
    </div>
  </div>
    <?php
			 }else{ 
			 ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h1 class="text-center">您暂时还没有部落哦！</h1>
    </div>
  </div>
  <hr style="opacity:0.3">
</div>

<div class="container">

  <div class="row yunyouback" style="background-image:url(images/77.0.png); background-repeat:no-repeat; background-size:contain; background-position:center;">
    <div class="text-center col-md-12" >
    
    <div id="banner">
      <form class="form-horizontal" method="GET" action="joinclan.php">
      <div class="col-md-6 col-md-offset-3" data-animation-effect="fadeIn">
            <div class="form-group">
                <h2 class="text-center">快申请加入部落吧！</h2>
            </div>
      <div class="form-group">
                <div class="input-group input-group-lg">
      <span class="input-group-addon" style="font-family:'Supercell-Magic_5';background-color:rgba(255,255,255,0.9);">
        #
      </span>
      <input name="ClanCode" type="text" required="required" class="form-control" 
      style="background-color:rgba(255,255,255,0.8);"  maxlength="10">
      </div>
      </div>

      <div class="form-group">
      <button type="submit" class="btn btn-default btn-lg btn-block">申请加入</button>
      </div>
            </div>
    </form>
		</div>
    
    </div>
    </div>
</div>


<?php     $sqlmyjoin=mysql_query("select * from joinclan where Code='".$_SESSION['MM_Username']."'",$clandata);
        if($infomyjoin=mysql_fetch_array($sqlmyjoin)){
          ?>
<div class="container-fluid">
  <div class="row">
      <h3 class="text-center">已发送的加入请求</h3>
  </div>
  <hr>
</div>

 <div class="container">

  <div class="yunyouback">
    <div class="text-center col-md-12" >
    
    <table align="center" cellpadding="0" cellspacing="0" border="1px" class="col-md-12">
           <tr style="font-size:large;font-family:'幼圆', '隶书', '华文隶书';font-weight:bold;" height="40">
          <th ><div align="center">部落标签</div></th>
          <th ><div align="center">部落名称</div></th>
          <th ><div align="center">部落等级</div></th>
          <th ><div align="center">部落人数</div></th>
          <th ><div align="center">部落群号</div></th>
          <th ><div align="center">首领标签</div></th>
          <th ><div align="center" >取消</div></th>
          </tr>

<?php
     $sqlmyjoin=mysql_query("select * from joinclan where Code='".$_SESSION['MM_Username']."'",$clandata);
        while($infomyjoin=mysql_fetch_array($sqlmyjoin))
         {
            $sqljoinclan=mysql_query("select * from clan where ClanCode='".$infomyjoin['ClanCode']."'",$clandata);
$infojoinclan=mysql_fetch_array($sqljoinclan);
      ?>


        <tr style="font-family:'Supercell-Magic_5';FONT-WEIGHT:bold;height: 35px;">

          <td ><div align="center"><?php echo $infojoinclan['ClanCode'];?></div></td>
          <td ><div align="center"><?php echo $infojoinclan['ClanName'];?></div></td>
          <td ><div align="center"><?php echo $infojoinclan['ClanLevel'];?></div></td>
          <td ><div align="center"><?php echo $infojoinclan['MemberNum'];?></div></td>
          <td ><div align="center"><?php echo $infojoinclan['ClanGroup'];?></div></td>
          <td ><div align="center"><?php echo $infojoinclan['ClanLeader'];?></div></td>
 <td>         
      <div><a href="deletemyjoin.php?ClanCode=<?php echo $infojoinclan['ClanCode'];?>" onclick="return confirm('确定要取消申请吗？')"><i class="glyphicon glyphicon-remove"  style="color: #ff0000;"></i></a></div>    
</td>  
          </tr>
<?php
}
?>
          
   </table>
   
    </div>
  </div>
  <hr>
</div>

<?php
}
			 }
			 ?>
 
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
