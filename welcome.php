<?php require_once('Connections/clandata.php'); ?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}
?>

<?php
mysql_select_db($database_clandata, $clandata);
/*$VillageName = mysql_query ( "select VillageName from clanmember where Code='".$_SESSION['MM_Username']."'",$clandata);
$infomember = mysql_fetch_array($VillageName);
$_SESSION['VillageName']=$infomember['VillageName'];*/


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $WebName;?></title>

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
document.getElementById("mainpage").classList.add('active');
}
</script>


</head>

<body onLoad="ready()">
<?php
include("navbar.php");
?>


<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h1 class="text-center">Clash Of Clans</h1>
    </div>
  </div>
  <hr style="opacity:0.3">
</div>
<div class="container">
  <div class="row text-center">
    <div class="col-md-6 col-md-offset-3 yunyouback"><strong>《部落冲突》</strong>（部落战争）是为芬兰游戏公司Supercell oy所推出的策略类的游戏，由4399手机游戏网（4399游戏盒）等平台运营，于2012年8月2日在苹果应用商店发布。</div>
  </div>
  <hr>
  <div class="row">
    <div class="text-justify col-sm-5 yunyouback">
  <table class="table">
  <tbody>
    <tr>
      <td style="color: #BBB"><strong>中文名</strong></td>
      <td>部落冲突</td>
    </tr>
    <tr>
      <td style="color: #BBB"><strong>原版名称</strong></td>
      <td>Clash of Clans</td>
    </tr>
    <tr>
      <td style="color: #BBB"><strong>其他名称</strong></td>
      <td>COC</td>
    </tr>
    <tr>
      <td style="color: #BBB"><strong>游戏类型</strong></td>
      <td>经营策略，战争 </td>
    </tr>
    <tr>
      <td style="color: #BBB"><strong>游戏平台</strong></td>
      <td>PC,Android,iOS</td>
      </tr>
    <tr>  
      <td style="color: #BBB"><strong>所属系列</strong></td>
      <td>战略游戏</td>
    </tr>
    <tr>  
      <td style="color: #BBB"><strong>开发商</strong></td>
      <td>Supercell (video game company)</td>
    </tr>
    <tr>  
      <td style="color: #BBB"><strong>发行商</strong></td>
      <td>Supercell Oy</td>
    </tr>
  </tbody>
  </table>
</div>
<div class="col-sm-2"><hr></div>
    <div class="col-sm-5 text-justify yunyouback">
    <table class="table">
  <tbody>
    <tr>
      <td style="color: #BBB"><strong>发行日期</strong></td>
      <td>Android：2013年10月07日</td>
    </tr>
    <tr>
      <td style="color: #BBB"><strong>音    乐</strong></td>
      <td>FMOD，MPEG Layer-3</td>
    </tr>
    <tr>
      <td style="color: #BBB"><strong>内容主题</strong></td>
      <td>战略</td>
    </tr>
    <tr>
      <td style="color: #BBB"><strong>玩家人数</strong></td>
      <td>大型多人</td>
    </tr>
    <tr>
      <td style="color: #BBB"><strong>游戏画面</strong></td>
      <td>2D 3D</td>
    </tr>
    <tr>
      <td style="color: #BBB"><strong>主要角色</strong></td>
      <td>法师，野蛮人，巨人，哥布林，瓦基丽武神</td>
    </tr>
    <tr>
      <td style="color: #BBB"><strong>语    言</strong></td>
      <td>简体中文等共13种。</td>
    </tr>
    <tr>  
      <td style="color: #BBB"><strong>地    区</strong></td>
      <td>全 球</td>
    </tr>
  </tbody>
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
