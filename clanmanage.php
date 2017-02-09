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
document.getElementById("clanmanage").classList.add('active');
}
</script>


</head>

<body onLoad="ready()"><?php
include("navbar.php");
?>


<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h1 class="text-center">欢迎你，部落管理者。</h1>
    </div>
  </div>
  <hr>
</div>

<?php
     $sqljoin=mysql_query("select * from joinclan where ClanCode='".$_SESSION['MM_Clan']."' order by Code ",$clandata);
        while($infojoin=mysql_fetch_array($sqljoin))
         {
            $sqljoinmember=mysql_query("select * from clanmember where Code='".$infojoin['Code']."'",$clandata);
$infojoinmember=mysql_fetch_array($sqljoinmember);
      ?>
<div class="container-fluid">
  <div class="row">
      <h3 class="text-center">待处理的加入请求</h3>
  </div>
  <hr>
</div>

 <div class="container">

  <div class="row yunyouback">
    <div class="text-center col-md-12" >
    
    <table width align="center" cellpadding="0" cellspacing="0" class="col-md-12" border="1px" >
           <tr style="font-size:large;font-family:'幼圆', '隶书', '华文隶书';font-weight:bold;" height="40">
          <th ><div align="center">个人标签</div></th>
          <th ><div align="center">村庄名称</div></th>
          <th ><div align="center">个人等级</div></th>
          <th ><div align="center">大本营等级</div></th>
          <th ><div align="center">战星</div></th>
          <th ><div align="center">捐兵数</div></th>
          <th ><div align="center">电子邮箱</div></th>
          <th ><div align="center">QQ/微信</div></th>
          <th ><div align="center">操作</div></th>
          </tr>

        <tr style="font-family:'Supercell-Magic_5';FONT-WEIGHT:bold;">

          <td ><div align="center"><?php echo $infojoinmember['Code'];?></div></td>
          <td ><div align="center" ><a href="technologydefense.php?Code=<?php echo $infojoinmember['Code'];?>" style="font-weight:bold;"><?php echo $infojoinmember['VillageName'];?></a></div></td>
          <td ><div align="center"><?php echo $infojoinmember['Level'];?></div></td>
          <td ><div align="center"><?php echo $infojoinmember['TownHallLevel'];?></div></td>
          <td ><div align="center"><?php echo $infojoinmember['Star'];?></div></td>
          <td ><div align="center"><?php echo $infojoinmember['Donation'];?></div></td>
          <td ><div align="center"><?php echo $infojoinmember['Email'];?></div></td>
          <td ><div align="center"><?php echo $infojoinmember['QQorWechat'];?></div></td>       
 <td>         
          <div class="dropdown">
  <button class="btn btn-link dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-cog" style="color:rgba(255,255,255,1.00);"></span></button>
  <ul class="dropdown-menu">
      <li><a href="technologydefense.php?Code=<?php echo $infojoinmember['Code'];?>"><i class="glyphicon glyphicon-th-list"></i> 科技防御</a></li>    
    <li><a href="decidemember.php?Code=<?php echo $infojoinmember['Code'];?>&amp;decide=yes" onclick="return confirm('确定要批准这位成员加入吗？')"><i class="glyphicon glyphicon-ok"></i> 批准</a></li>
    <li><a href="decidemember.php?Code=<?php echo $infojoinmember['Code'];?>&amp;decide=no" onclick="return confirm('确定要拒绝这位成员加入吗？')"><i class="glyphicon glyphicon-remove"></i> 拒绝</a></li>
  </ul>
</div>       
</td>  
          </tr>

          
   </table>
   
    </div>
  </div>
  <hr>
</div>
<?php
}
?>

<div class="container-fluid">

  <div class="row">
      <h3 class="text-center">部落成员</h3>
  </div>
  <hr>
</div>
<div class="container">

  <div class="row yunyouback">
    <div class="text-center col-md-12" >
    
    <table width align="center" cellpadding="0" cellspacing="0" class="col-md-12" border="1px" >
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
          <th ><div align="center">操作</div></th>
          </tr>
          <?php
            $sqlmember=mysql_query("select * from clanmember where ClanCode='".$_SESSION['MM_Clan']."' order by Code ",$clandata);
             while($infomember=mysql_fetch_array($sqlmember))
		     {
		  ?>
        <tr style="font-family:'Supercell-Magic_5';FONT-WEIGHT:bold;">

          <td ><div align="center"><?php echo $infomember['Code'];?></div></td>
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
<!--          <td height="20"><div align="center"><a href="modifyclanmember.php?Code=<?php echo $infomember['Code'];?>">修改</a></div></td>
          <td height="20"><div align="center"><a href="deleteclanmember.php?ClanCode=<?php echo $infomember['Code'];?>" onclick="return confirm('确定要删除这位成员吗？')">删除</a></div></td>-->
 <td>         
          <div class="dropdown">
  <button class="btn btn-link dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-cog" style="color:rgba(255,255,255,1.00);"></span></button>
  <ul class="dropdown-menu">
      <li><a href="technologydefense.php?Code=<?php echo $infomember['Code'];?>"><i class="glyphicon glyphicon-th-list"></i> 科技防御</a></li>    
  <?php
		if($infomember["Position"]<3){
		?>       
    <li><a href="deleteclanmember.php?Code=<?php echo $infomember['Code'];?>" onclick="return confirm('确定要踢出这位成员吗？')"><i class="glyphicon glyphicon-trash"></i> 踢出</a></li>
    <?php
		}?>
    <li><a href="modifyclanmember.php?Code=<?php echo $infomember['Code'];?>"><i class="glyphicon glyphicon-pencil"></i> 编辑</a></li>
  </ul>
</div>       
</td>  
          </tr>
          <?php
			 }
			 ?>
          
   </table>
   
    </div>
  </div>


</div>


<?php
include("foot.php");
?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery-1.11.3.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.js"></script>

</body>
</html>
