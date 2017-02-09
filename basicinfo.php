<?php require_once('Connections/clandata.php');?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "clanerupdate")) {
  $updateSQL = sprintf("UPDATE clanmember SET Password=%s, VillageName=%s, `Level`=%s, TownHallLevel=%s, Star=%s, Donation=%s, Email=%s, QQorWechat=%s WHERE Code=%s",
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['villagename'], "text"),
                       GetSQLValueString($_POST['level'], "int"),
                       GetSQLValueString($_POST['townhalllevel'], "int"),
                       GetSQLValueString($_POST['star'], "int"),
                       GetSQLValueString($_POST['donation'], "int"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['qqorwechat'], "text"),
                       GetSQLValueString($_POST['usercode'], "text"));

  mysql_select_db($database_clandata, $clandata);
  $Result1 = mysql_query($updateSQL, $clandata) or die(mysql_error());

  $updateGoTo = "basicinfo.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

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
$sqlmember = mysql_query ( "select * from clanmember where Code='".$_SESSION['MM_Username']."'",$clandata);
$infomember = mysql_fetch_array($sqlmember);


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

	background-image: url(images/loginback.jpg);
	background-attachment:fixed;
	background-size:cover;
	background-repeat: no-repeat;
	background-position:center;
}
label{
	color:rgba(255,255,255,1.00);
	font-weight:normal;
}

</style>
<?php
$sqlBar = mysql_query ( "select * from havetechnology where Code='".$_SESSION['MM_Username']."' and TechnologyID='Bar'",$clandata);
$infoBar = mysql_fetch_array($sqlBar);
$sqlArc = mysql_query ( "select * from havetechnology where Code='".$_SESSION['MM_Username']."' and TechnologyID='Arc'",$clandata);
$infoArc = mysql_fetch_array($sqlArc);
$sqlArcQueen = mysql_query ( "select * from havetechnology where Code='".$_SESSION['MM_Username']."' and TechnologyID='ArcQueen'",$clandata);
$infoArcQueen = mysql_fetch_array($sqlArcQueen);
$sqlBabyDragon = mysql_query ( "select * from havetechnology where Code='".$_SESSION['MM_Username']."' and TechnologyID='BabyDragon'",$clandata);
$infoBabyDragon = mysql_fetch_array($sqlBabyDragon);
$sqlBalloon = mysql_query ( "select * from havetechnology where Code='".$_SESSION['MM_Username']."' and TechnologyID='Balloon'",$clandata);
$infoBalloon = mysql_fetch_array($sqlBalloon);
$sqlBarKing = mysql_query ( "select * from havetechnology where Code='".$_SESSION['MM_Username']."' and TechnologyID='BarKing'",$clandata);
$infoBarKing = mysql_fetch_array($sqlBarKing);
$sqlBowler = mysql_query ( "select * from havetechnology where Code='".$_SESSION['MM_Username']."' and TechnologyID='Bowler'",$clandata);
$infoBowler = mysql_fetch_array($sqlBowler);
$sqlClone = mysql_query ( "select * from havetechnology where Code='".$_SESSION['MM_Username']."' and TechnologyID='Clone'",$clandata);
$infoClone = mysql_fetch_array($sqlClone);
$sqlDragon = mysql_query ( "select * from havetechnology where Code='".$_SESSION['MM_Username']."' and TechnologyID='Dragon'",$clandata);
$infoDragon = mysql_fetch_array($sqlDragon);
$sqlEarthQuake = mysql_query ( "select * from havetechnology where Code='".$_SESSION['MM_Username']."' and TechnologyID='EarthQuake'",$clandata);
$infoEarthQuake = mysql_fetch_array($sqlEarthQuake);
$sqlGiant = mysql_query ( "select * from havetechnology where Code='".$_SESSION['MM_Username']."' and TechnologyID='Giant'",$clandata);
$infoGiant = mysql_fetch_array($sqlGiant);
$sqlGoblin = mysql_query ( "select * from havetechnology where Code='".$_SESSION['MM_Username']."' and TechnologyID='Goblin'",$clandata);
$infoGoblin = mysql_fetch_array($sqlGoblin);
$sqlGolem = mysql_query ( "select * from havetechnology where Code='".$_SESSION['MM_Username']."' and TechnologyID='Golem'",$clandata);
$infoGolem = mysql_fetch_array($sqlGolem);
$sqlGrandWarden = mysql_query ( "select * from havetechnology where Code='".$_SESSION['MM_Username']."' and TechnologyID='GrandWarden'",$clandata);
$infoGrandWarden = mysql_fetch_array($sqlGrandWarden);
$sqlFreeze = mysql_query ( "select * from havetechnology where Code='".$_SESSION['MM_Username']."' and TechnologyID='Freeze'",$clandata);
$infoFreeze = mysql_fetch_array($sqlFreeze);
$sqlHaste = mysql_query ( "select * from havetechnology where Code='".$_SESSION['MM_Username']."' and TechnologyID='Haste'",$clandata);
$infoHaste = mysql_fetch_array($sqlHaste);
$sqlHealer = mysql_query ( "select * from havetechnology where Code='".$_SESSION['MM_Username']."' and TechnologyID='Healer'",$clandata);
$infoHealer = mysql_fetch_array($sqlHealer);
$sqlHealing = mysql_query ( "select * from havetechnology where Code='".$_SESSION['MM_Username']."' and TechnologyID='Healing'",$clandata);
$infoHealing = mysql_fetch_array($sqlHealing);
$sqlHogRider = mysql_query ( "select * from havetechnology where Code='".$_SESSION['MM_Username']."' and TechnologyID='HogRider'",$clandata);
$infoHogRider = mysql_fetch_array($sqlHogRider);
$sqlJump = mysql_query ( "select * from havetechnology where Code='".$_SESSION['MM_Username']."' and TechnologyID='Jump'",$clandata);
$infoJump = mysql_fetch_array($sqlJump);
$sqlLavaHound = mysql_query ( "select * from havetechnology where Code='".$_SESSION['MM_Username']."' and TechnologyID='LavaHound'",$clandata);
$infoLavaHound = mysql_fetch_array($sqlLavaHound);
$sqlLightning = mysql_query ( "select * from havetechnology where Code='".$_SESSION['MM_Username']."' and TechnologyID='Lightning'",$clandata);
$infoLightning = mysql_fetch_array($sqlLightning);
$sqlMiner = mysql_query ( "select * from havetechnology where Code='".$_SESSION['MM_Username']."' and TechnologyID='Miner'",$clandata);
$infoMiner = mysql_fetch_array($sqlMiner);
$sqlMinion = mysql_query ( "select * from havetechnology where Code='".$_SESSION['MM_Username']."' and TechnologyID='Minion'",$clandata);
$infoMinion = mysql_fetch_array($sqlMinion);
$sqlPekka = mysql_query ( "select * from havetechnology where Code='".$_SESSION['MM_Username']."' and TechnologyID='Pekka'",$clandata);
$infoPekka = mysql_fetch_array($sqlPekka);
$sqlPoison = mysql_query ( "select * from havetechnology where Code='".$_SESSION['MM_Username']."' and TechnologyID='Poison'",$clandata);
$infoPoison = mysql_fetch_array($sqlPoison);
$sqlRage = mysql_query ( "select * from havetechnology where Code='".$_SESSION['MM_Username']."' and TechnologyID='Rage'",$clandata);
$infoRage = mysql_fetch_array($sqlRage);
$sqlSkeleton = mysql_query ( "select * from havetechnology where Code='".$_SESSION['MM_Username']."' and TechnologyID='Skeleton'",$clandata);
$infoSkeleton = mysql_fetch_array($sqlSkeleton);
$sqlValkyrie = mysql_query ( "select * from havetechnology where Code='".$_SESSION['MM_Username']."' and TechnologyID='Valkyrie'",$clandata);
$infoValkyrie = mysql_fetch_array($sqlValkyrie);
$sqlWallBreaker = mysql_query ( "select * from havetechnology where Code='".$_SESSION['MM_Username']."' and TechnologyID='WallBreaker'",$clandata);
$infoWallBreaker = mysql_fetch_array($sqlWallBreaker);
$sqlWitch = mysql_query ( "select * from havetechnology where Code='".$_SESSION['MM_Username']."' and TechnologyID='Witch'",$clandata);
$infoWitch = mysql_fetch_array($sqlWitch);
$sqlWizard = mysql_query ( "select * from havetechnology where Code='".$_SESSION['MM_Username']."' and TechnologyID='Wizard'",$clandata);
$infoWizard = mysql_fetch_array($sqlWizard);

$sqlCannon = mysql_query ( "select * from havedefense where Code='".$_SESSION['MM_Username']."' and DefenseID='Cannon'",$clandata);
$infoCannon = mysql_fetch_array($sqlCannon);
$sqlAirBombs = mysql_query ( "select * from havedefense where Code='".$_SESSION['MM_Username']."' and DefenseID='AirBombs'",$clandata);
$infoAirBombs = mysql_fetch_array($sqlAirBombs);
$sqlAirDefense = mysql_query ( "select * from havedefense where Code='".$_SESSION['MM_Username']."' and DefenseID='AirDefense'",$clandata);
$infoAirDefense = mysql_fetch_array($sqlAirDefense);
$sqlAirSweeper = mysql_query ( "select * from havedefense where Code='".$_SESSION['MM_Username']."' and DefenseID='AirSweeper'",$clandata);
$infoAirSweeper = mysql_fetch_array($sqlAirSweeper);
$sqlAncientArtillery = mysql_query ( "select * from havedefense where Code='".$_SESSION['MM_Username']."' and DefenseID='AncientArtillery'",$clandata);
$infoAncientArtillery = mysql_fetch_array($sqlAncientArtillery);
$sqlArcherTower = mysql_query ( "select * from havedefense where Code='".$_SESSION['MM_Username']."' and DefenseID='ArcherTower'",$clandata);
$infoArcherTower = mysql_fetch_array($sqlArcherTower);
$sqlBombTower = mysql_query ( "select * from havedefense where Code='".$_SESSION['MM_Username']."' and DefenseID='BombTower'",$clandata);
$infoBombTower = mysql_fetch_array($sqlBombTower);
$sqlGiantBombs = mysql_query ( "select * from havedefense where Code='".$_SESSION['MM_Username']."' and DefenseID='GiantBombs'",$clandata);
$infoGiantBombs = mysql_fetch_array($sqlGiantBombs);
$sqlInferno = mysql_query ( "select * from havedefense where Code='".$_SESSION['MM_Username']."' and DefenseID='Inferno'",$clandata);
$infoInferno = mysql_fetch_array($sqlInferno);
$sqlMortar = mysql_query ( "select * from havedefense where Code='".$_SESSION['MM_Username']."' and DefenseID='Mortar'",$clandata);
$infoMortar = mysql_fetch_array($sqlMortar);
$sqlSeekingAirMines = mysql_query ( "select * from havedefense where Code='".$_SESSION['MM_Username']."' and DefenseID='SeekingAirMines'",$clandata);
$infoSeekingAirMines = mysql_fetch_array($sqlSeekingAirMines);
$sqlSkeletonTraps = mysql_query ( "select * from havedefense where Code='".$_SESSION['MM_Username']."' and DefenseID='SkeletonTraps'",$clandata);
$infoSkeletonTraps = mysql_fetch_array($sqlSkeletonTraps);
$sqlSmallBombs = mysql_query ( "select * from havedefense where Code='".$_SESSION['MM_Username']."' and DefenseID='SmallBombs'",$clandata);
$infoSmallBombs = mysql_fetch_array($sqlSmallBombs);
$sqlSpringTraps = mysql_query ( "select * from havedefense where Code='".$_SESSION['MM_Username']."' and DefenseID='SpringTraps'",$clandata);
$infoSpringTraps = mysql_fetch_array($sqlSpringTraps);
$sqlTesla = mysql_query ( "select * from havedefense where Code='".$_SESSION['MM_Username']."' and DefenseID='Tesla'",$clandata);
$infoTesla = mysql_fetch_array($sqlTesla);
$sqlWall = mysql_query ( "select * from havedefense where Code='".$_SESSION['MM_Username']."' and DefenseID='Wall'",$clandata);
$infoWall = mysql_fetch_array($sqlWall);
$sqlWizardTower = mysql_query ( "select * from havedefense where Code='".$_SESSION['MM_Username']."' and DefenseID='WizardTower'",$clandata);
$infoWizardTower = mysql_fetch_array($sqlWizardTower);
$sqlXbow = mysql_query ( "select * from havedefense where Code='".$_SESSION['MM_Username']."' and DefenseID='Xbow'",$clandata);
$infoXbow = mysql_fetch_array($sqlXbow);

?>
<script type="text/javascript" language="javascript">   

function ready(){
document.getElementById("basicinfo").classList.add('active');

$("#Bar").val("<?php echo $infoBar['TechnologyLevel'];?>"); 
$("#Arc").val("<?php echo $infoArc['TechnologyLevel'];?>");
$("#ArcQueen").val("<?php echo $infoArcQueen['TechnologyLevel'];?>"); 
$("#BabyDragon").val("<?php echo $infoBabyDragon['TechnologyLevel'];?>");
$("#Balloon").val("<?php echo $infoBalloon['TechnologyLevel'];?>");
$("#BarKing").val("<?php echo $infoBarKing['TechnologyLevel'];?>");
$("#Bowler").val("<?php echo $infoBowler['TechnologyLevel'];?>");
$("#Clone").val("<?php echo $infoClone['TechnologyLevel'];?>");
$("#Dragon").val("<?php echo $infoDragon['TechnologyLevel'];?>");
$("#EarthQuake").val("<?php echo $infoEarthQuake['TechnologyLevel'];?>");
$("#Freeze").val("<?php echo $infoFreeze['TechnologyLevel'];?>");
$("#Giant").val("<?php echo $infoGiant['TechnologyLevel'];?>");
$("#Goblin").val("<?php echo $infoGoblin['TechnologyLevel'];?>");
$("#Golem").val("<?php echo $infoGolem['TechnologyLevel'];?>");
$("#GrandWarden").val("<?php echo $infoGrandWarden['TechnologyLevel'];?>");
$("#Haste").val("<?php echo $infoHaste['TechnologyLevel'];?>");
$("#Healer").val("<?php echo $infoHealer['TechnologyLevel'];?>");
$("#Healing").val("<?php echo $infoHealing['TechnologyLevel'];?>");
$("#HogRider").val("<?php echo $infoHogRider['TechnologyLevel'];?>");
$("#Jump").val("<?php echo $infoJump['TechnologyLevel'];?>");
$("#LavaHound").val("<?php echo $infoLavaHound['TechnologyLevel'];?>");
$("#Lightning").val("<?php echo $infoLightning['TechnologyLevel'];?>");
$("#Miner").val("<?php echo $infoMiner['TechnologyLevel'];?>");
$("#Minion").val("<?php echo $infoMinion['TechnologyLevel'];?>");
$("#Pekka").val("<?php echo $infoPekka['TechnologyLevel'];?>");
$("#Poison").val("<?php echo $infoPoison['TechnologyLevel'];?>");
$("#Rage").val("<?php echo $infoRage['TechnologyLevel'];?>");
$("#Skeleton").val("<?php echo $infoSkeleton['TechnologyLevel'];?>");
$("#Valkyrie").val("<?php echo $infoValkyrie['TechnologyLevel'];?>");
$("#WallBreaker").val("<?php echo $infoWallBreaker['TechnologyLevel'];?>");
$("#Witch").val("<?php echo $infoWitch['TechnologyLevel'];?>");
$("#Wizard").val("<?php echo $infoWizard['TechnologyLevel'];?>");


$("#Cannon").val("<?php echo $infoCannon['DefenseLevel'];?>"); 
$("#AirBombs").val("<?php echo $infoAirBombs['DefenseLevel'];?>");
$("#AirDefense").val("<?php echo $infoAirDefense['DefenseLevel'];?>");
$("#AirSweeper").val("<?php echo $infoAirSweeper['DefenseLevel'];?>");
$("#AncientArtillery").val("<?php echo $infoAncientArtillery['DefenseLevel'];?>");
$("#ArcherTower").val("<?php echo $infoArcherTower['DefenseLevel'];?>");
$("#BombTower").val("<?php echo $infoBombTower['DefenseLevel'];?>");
$("#GiantBombs").val("<?php echo $infoGiantBombs['DefenseLevel'];?>");
$("#Inferno").val("<?php echo $infoInferno['DefenseLevel'];?>");
$("#Mortar").val("<?php echo $infoMortar['DefenseLevel'];?>");
$("#SeekingAirMines").val("<?php echo $infoSeekingAirMines['DefenseLevel'];?>");
$("#SkeletonTraps").val("<?php echo $infoSkeletonTraps['DefenseLevel'];?>");
$("#SmallBombs").val("<?php echo $infoSmallBombs['DefenseLevel'];?>");
$("#SpringTraps").val("<?php echo $infoSpringTraps['DefenseLevel'];?>");
$("#Tesla").val("<?php echo $infoTesla['DefenseLevel'];?>");
$("#Wall").val("<?php echo $infoWall['DefenseLevel'];?>");
$("#WizardTower").val("<?php echo $infoWizardTower['DefenseLevel'];?>");
$("#Xbow").val("<?php echo $infoXbow['DefenseLevel'];?>");

$("#CannonNum").val("<?php echo $infoCannon['DefenseNum'];?>");
$("#AirBombsNum").val("<?php echo $infoAirBombs['DefenseNum'];?>");
$("#AirSweeperNum").val("<?php echo $infoAirSweeper['DefenseNum'];?>");
$("#AirDefenseNum").val("<?php echo $infoAirDefense['DefenseLevel'];?>");
$("#AncientArtilleryNum").val("<?php echo $infoAncientArtillery['DefenseNum'];?>");
$("#ArcherTowerNum").val("<?php echo $infoArcherTower['DefenseNum'];?>");
$("#BombTowerNum").val("<?php echo $infoBombTower['DefenseNum'];?>");
$("#GiantBombsNum").val("<?php echo $infoGiantBombs['DefenseNum'];?>");
$("#InfernoNum").val("<?php echo $infoInferno['DefenseNum'];?>");
$("#MortarNum").val("<?php echo $infoMortar['DefenseNum'];?>");
$("#SeekingAirMinesNum").val("<?php echo $infoSeekingAirMines['DefenseNum'];?>");
$("#SkeletonTrapsNum").val("<?php echo $infoSkeletonTraps['DefenseNum'];?>");
$("#SmallBombsNum").val("<?php echo $infoSmallBombs['DefenseNum'];?>");
$("#SpringTrapsNum").val("<?php echo $infoSpringTraps['DefenseNum'];?>");
$("#TeslaNum").val("<?php echo $infoTesla['DefenseNum'];?>");
$("#WallNum").val("<?php echo $infoWall['DefenseNum'];?>");
$("#WizardTowerNum").val("<?php echo $infoWizardTower['DefenseNum'];?>");
$("#XbowNum").val("<?php echo $infoXbow['DefenseNum'];?>"); 



}
function compare()
{
var a=document.getElementById('password').value;
var b=document.getElementById('password2').value;
if(a==b){
document.getElementById('check1').className="form-group has-success has-feedback";
document.getElementById('check2').className="form-group has-success has-feedback";
document.getElementById('ok').className="glyphicon glyphicon-ok form-control-feedback";
document.getElementById('remove').className="glyphicon glyphicon-ok form-control-feedback";

}
else{
document.getElementById('check1').className="form-group has-error has-feedback";
document.getElementById('check2').className="form-group has-error has-feedback";
document.getElementById('ok').className="glyphicon glyphicon-remove form-control-feedback";
document.getElementById('remove').className="glyphicon glyphicon-remove form-control-feedback";

}
}

function formCheck(){ 
if(clanerregister.password.value!=clanerregister.password2.value){ 
alert( "两次输入的密码不一致，请再次输入！ "); 
var pass=document.getElementById('password');
var pass1=document.getElementById('password2');
pass.value="";
pass1.value="";
return false; 
} 
return true; 
}
</script>

</head>

<body onLoad="ready()">


<?php
include("navbar.php");
?>



<div class="container">
<form action="<?php echo $editFormAction; ?>" METHOD="POST" style="margin:0 auto;" role="form" name="clanerupdate" class="form-horizontal">
  <div  class="row yunyouback" data-animation-effect="fadeIn">
    <div class="text-center col-md-6">
    
    <div class="form-group form-group-lg">
    <h3><label class="col-lg-3 control-label">个人标签</label>
    
      <div class="col-lg-8">
      <div class="input-group">
      <span class="input-group-addon" style="font-size:larger;background-color:rgba(255,255,255,0.80);">
        #
      </span>
      <input name="usercode" type="text" required="required" class="form-control"  maxlength="10" readonly value="<?php echo $infomember["Code"];?>">
      </div>
      </div>
    </div>

<div id="check1" class="form-group form-group-lg">   
      <h3><label class="col-sm-3 control-label">修改密码</label></h3>
      <div  class="col-sm-8">
      <input name="password" id="password" type="password" pattern="^[a-zA-Z]\w{5,17}$" required="required" class="form-control" placeholder="您的密码&nbsp;(最好是字母和数字混合哦！)" style="background-color:rgba(255,255,255,0.60);" title="以字母开头，长度在6~18位之间，只能包含字母、数字和下划线" maxlength="18" value="<?php echo $infomember["Password"];?>">
      <span id="ok"></span>
      </div>
</div>

      <div id="check2" class="form-group form-group-lg">
      <h3><label class="col-sm-3 control-label">确认密码</label></h3>
      <div class="col-sm-8">
      <input name="password2" id="password2" type="password" required="required" class="form-control" placeholder="确认密码" style="background-color:rgba(255,255,255,0.60);" pattern="^[a-zA-Z]\w{5,17}$"  title="确认密码" value="<?php echo $infomember["Password"];?>" onKeyUp="compare();">
      <span id="remove"></span>
      </div>
      </div>

<div class="form-group form-group-lg">
      <h3><label class="col-sm-3 control-label">村庄名称</label></h3>
      <div class="col-sm-8">
      <input name="villagename" type="text" required="required" class="form-control" placeholder="村庄名称" style="background-color:rgba(255,255,255,0.66);" value="<?php echo $infomember["VillageName"];?>">
      </div>
</div>
      
<div class="form-group form-group-lg">
      <h3><label class="col-sm-3 control-label">电子邮箱</label></h3>
      <div class="col-sm-8">
      <input name="email" type="email" required="required" class="form-control" placeholder="电子邮箱" style="background-color:rgba(255,255,255,0.60);" value="<?php echo $infomember["Email"];?>">
     </div>
     </div>
      
      <div class="form-group form-group-lg">
      <h3><label class="col-sm-3 control-label">QQ/微信号</label></h3>
      <div class="col-sm-8">
      <input name="qqorwechat" type="text" class="form-control" placeholder="QQ/微信号(可不填)" style="background-color:rgba(255,255,255,0.60);" value="<?php echo $infomember["QQorWechat"];?>">
      </div>
      </div>

    </div>
    <div class="text-center col-md-6">
    
    <div class="form-group form-group-lg">
      <h3><label class="col-sm-3 control-label">个人等级</label></h3>
      <div class="col-sm-8">
      <input name="level" type="text" class="form-control" placeholder="填写你的个人等级" style="background-color:rgba(255,255,255,0.60);" value="<?php echo $infomember["Level"];?>">
      </div>
      </div>
      
      <div class="form-group form-group-lg">
      <h3><label class="col-sm-3 control-label">大本营等级</label></h3>
      <div class="col-sm-8">
       <select id="basic" name="townhalllevel" class="form-control" style="background-color:rgba(255,255,255,0.60);">
         <option value="1" <?php if($infomember["TownHallLevel"]==1) {echo "selected=\"selected\"";} ?>>1</option>
         <option value="2" <?php if($infomember["TownHallLevel"]==2) {echo "selected=\"selected\"";} ?>>2</option>
         <option value="3" <?php if($infomember["TownHallLevel"]==3) {echo "selected=\"selected\"";} ?>>3</option>
         <option value="4" <?php if($infomember["TownHallLevel"]==4) {echo "selected=\"selected\"";} ?>>4</option>
         <option value="5" <?php if($infomember["TownHallLevel"]==5) {echo "selected=\"selected\"";} ?>>5</option>
         <option value="6" <?php if($infomember["TownHallLevel"]==6) {echo "selected=\"selected\"";} ?>>6</option>
         <option value="7" <?php if($infomember["TownHallLevel"]==7) {echo "selected=\"selected\"";} ?>>7</option>
         <option value="8" <?php if($infomember["TownHallLevel"]==8) {echo "selected=\"selected\"";} ?>>8</option>
         <option value="9" <?php if($infomember["TownHallLevel"]==9) {echo "selected=\"selected\"";} ?>>9</option>
         <option value="10" <?php if($infomember["TownHallLevel"]==10) {echo "selected=\"selected\"";} ?>>10</option>
         <option value="11" <?php if($infomember["TownHallLevel"]==11) {echo "selected=\"selected\"";} ?>>11</option>
       </select>

      </div>
      </div>
      
      <div class="form-group form-group-lg">
      <h3><label class="col-sm-3 control-label">战争星数</label></h3>
      <div class="col-sm-8">
      <input name="star" type="text" class="form-control" placeholder="填写你的战争星数" style="background-color:rgba(255,255,255,0.60);" maxlength="5" value="<?php echo $infomember["Star"];?>">
      </div>
      </div>
      
      <div class="form-group form-group-lg">
      <h3><label class="col-sm-3 control-label">捐兵数</label></h3>
      <div class="col-sm-8">
      <input name="donation" type="text" class="form-control" placeholder="填写你的大致捐兵数" style="" maxlength="7" value="<?php echo $infomember["Donation"];?>">
      </div>
      </div>
    
    <div class="form-group form-group-lg">
      <h3><label class="col-sm-3 control-label">你的部落</label></h3>
      <div class="col-lg-8">
      <div class="input-group">
      <span class="input-group-addon" style="font-family:Supercell-Magic_5;background-color:rgba(255,255,255,0.80);">
        #
      </span>
      <input name="clancode" type="text" class="form-control" placeholder="你所在的部落" style="text-transform:uppercase;" readonly title="部落编号" value="<?php echo $infomember["ClanCode"];?>">
      </div>
      </div>
      </div>
    
    <div class="form-group form-group-lg">
      <h3><label class="col-sm-3 control-label">职位</label></h3>
      <div class="col-sm-8">
      <input name="position" type="text" class="form-control" placeholder="你在部落中的的职位" readonly value="<?php if($infomember["Position"]==3) echo "首领";
	  else if($infomember["Position"]==2) echo "副首领";
	  else if($infomember["Position"]==1) echo "长老";
	  else if($infomember["Position"]==0) echo "成员";
	  ?>">
      </div>
      </div>
    
    </div>
    
    
    <div class="col-sm-6  col-md-offset-3">
    <h3><input class="btn btn-default btn-lg btn-block" role="button" value="保存" type="submit"></h3>
    </div>
    
  </div>
  <input type="hidden" name="MM_update" value="clanerupdate">
 </form>
 </div>
 
   <div class="container-fluid" id="technology">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h1 class="text-center" ></h1>
    </div>
  </div>
  <hr style="opacity:0.3">
</div>
        
        <!-- section start -->
		<!-- ================ -->
			<div class="container">
            <form action="addtechnology.php" METHOD="POST" name="technologyinfo" class="form-horizontal" >
            
            <div class="row yunyouback" data-animation-effect="fadeIn" > 
				<h1 class="text-center title">科技信息</h1>
				<p class="lead text-center">请认真填写您的科技信息！</p>		
					<div class="col-md-12" data-filter-group="technology">

						<!-- isotope filters start -->
						<div id="technologyfilter" class="filters center-block text-center" >
							<ul class="nav nav-tabs nav-justified navbar-inverse filter-option"  style="opacity:0.8;" >
								<li class="active"><a href="#" data-filter=".Elixir, .DarkElixir,.Spell">所有科技</a></li>
								<li><a href="#" data-filter=".Elixir">圣水兵种</a></li>
								<li><a href="#" data-filter=".DarkElixir">黑水兵种与三王</a></li>
								<li><a href="#" data-filter=".Spell">法术</a></li>
							</ul>
						</div>
                        <br>
        
						<!-- isotope filters end -->


  
          
						<!-- portfolio items start -->
						<div id="technologyfilter" class="isotope-container row grid-space-20">
							<div class="col-sm-6 col-md-3 isotope-item  Elixir">

                    
              <div class="form-group">

							<label class="col-sm-5 control-label">野蛮人：</label>
                            <div class="col-sm-7">
                  <select name="Bar" id="Bar" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="等级">
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                      </optgroup>
                    </select>
					</div>		
              </div>

					</div>

							<div class="col-sm-6 col-md-3 isotope-item Elixir">
                                    
                                    <div class="form-group">
                  <label class="col-sm-5 control-label">弓箭手：</label>
                  <div class="col-sm-7">
                  <select name="Arc" id="Arc" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="等级">
<option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                      </optgroup>
                    </select>
				</div>		
			</div>	             


	

							</div>
							
							<div class="col-sm-6 col-md-3 isotope-item Elixir">
									<div>
										<div class="form-group">
                  <label class="col-sm-5 control-label">巨人：</label>
                  <div class="col-sm-7">
                  <select name="Giant" id="Giant" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="等级">
<option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                      </optgroup>
                    </select>
				</div>		
			</div>
									</div>
				
	
							</div>
                            
                            <div class="col-sm-6 col-md-3 isotope-item Elixir">
									<div>
										<div class="form-group">
                  <label class="col-sm-5 control-label">哥布林：</label>
                  <div class="col-sm-7">
                  <select name="Goblin" id="Goblin" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="等级">
<option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                      </optgroup>
                    </select>
				</div>		
			</div>
									</div>
				
	
							</div>
                            
                            <div class="col-sm-6 col-md-3 isotope-item Elixir">
									<div>
                            <div class="form-group">
                  <label class="col-sm-5 control-label">炸弹人：</label>
                  <div class="col-sm-7">
                  <select name="WallBreaker" id="WallBreaker" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="等级">
<option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>                      
                      </optgroup>
                    </select>
				</div>		
			</div>
            
            </div>
            </div>
            
            <div class="col-sm-6 col-md-3 isotope-item Elixir">
									<div>
                            <div class="form-group">
                  <label class="col-sm-5 control-label">气球兵：</label>
                  <div class="col-sm-7">
                  <select name="Balloon" id="Balloon" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="等级">
<option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                      </optgroup>
                    </select>
				</div>		
			</div>
            
            </div>
            </div>
            
            <div class="col-sm-6 col-md-3 isotope-item Elixir">
									<div>
                            <div class="form-group">
                  <label class="col-sm-5 control-label">法师：</label>
                  <div class="col-sm-7">
                  <select name="Wizard" id="Wizard" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="等级">
<option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                      </optgroup>
                    </select>
				</div>		
			</div>
            
            </div>
            </div>
            
            <div class="col-sm-6 col-md-3 isotope-item Elixir">
									<div>
                            <div class="form-group">
                  <label class="col-sm-5 control-label">天使：</label>
                  <div class="col-sm-7">
                  <select name="Healer" id="Healer" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="等级">
<option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                      </optgroup>
                    </select>
				</div>		
			</div>
            
            </div>
            </div>
            
            <div class="col-sm-6 col-md-3 isotope-item Elixir">
									<div>
                            <div class="form-group">
                  <label class="col-sm-5 control-label">龙：</label>
                  <div class="col-sm-7">
                  <select name="Dragon" id="Dragon" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="等级">
<option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </optgroup>
                    </select>
				</div>		
			</div>
            
            </div>
            </div>
            
            <div class="col-sm-6 col-md-3 isotope-item Elixir">
									<div>
                            <div class="form-group">
                  <label class="col-sm-5 control-label">皮卡超人：</label>
                  <div class="col-sm-7">
                  <select name="Pekka" id="Pekka" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="等级">
<option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </optgroup>
                    </select>
				</div>		
			</div>
            
            </div>
            </div>
            
            <div class="col-sm-6 col-md-3 isotope-item Elixir">
									<div>
                            <div class="form-group">
                  <label class="col-sm-5 control-label">龙宝宝：</label>
                  <div class="col-sm-7">
                  <select name="BabyDragon" id="BabyDragon" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="等级">
<option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </optgroup>
                    </select>
				</div>		
			</div>
            
            </div>
            </div>
            
            <div class="col-sm-6 col-md-3 isotope-item Elixir">
									<div>
                            <div class="form-group">
                  <label class="col-sm-5 control-label">掘地矿工：</label>
                  <div class="col-sm-7">
                  <select name="Miner" id="Miner" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="等级">
<option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                      </optgroup>
                    </select>
				</div>		
			</div>
            
            </div>
            </div>
            
            <div class="col-sm-6 col-md-3 isotope-item Spell">
									<div>
                            <div class="form-group">
                  <label class="col-sm-5 control-label">闪电法术：</label>
                  <div class="col-sm-7">
                  <select name="Lightning" id="Lightning" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="等级">
<option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                      </optgroup>
                    </select>
				</div>		
			</div>
            
            </div>
            </div>
            
            <div class="col-sm-6 col-md-3 isotope-item Spell">
									<div>
                            <div class="form-group">
                  <label class="col-sm-5 control-label">治疗法术：</label>
                  <div class="col-sm-7">
                  <select name="Healing" id="Healing" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="等级">
<option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                      </optgroup>
                    </select>
				</div>		
			</div>
            
            </div>
            </div>
            
            <div class="col-sm-6 col-md-3 isotope-item Spell">
									<div>
                            <div class="form-group">
                  <label class="col-sm-5 control-label">狂暴法术：</label>
                  <div class="col-sm-7">
                  <select name="Rage" id="Rage" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="等级">
<option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </optgroup>
                    </select>
				</div>		
			</div>
            
            </div>
            </div>
            
					
               <div class="col-sm-6 col-md-3 isotope-item Spell">
									<div>
                            <div class="form-group">
                  <label class="col-sm-5 control-label">弹跳法术：</label>
                  <div class="col-sm-7">
                  <select name="Jump" id="Jump" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="等级">
<option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                      </optgroup>
                    </select>
				</div>		
			</div>
            
            </div>
            </div>		
		
        <div class="col-sm-6 col-md-3 isotope-item Spell">
									<div>
                            <div class="form-group">
                  <label class="col-sm-5 control-label">冰霜法术：</label>
                  <div class="col-sm-7">
                  <select name="Freeze" id="Freeze" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="等级">
<option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </optgroup>
                    </select>
				</div>		
			</div>
            
            </div>
            </div>
            
            <div class="col-sm-6 col-md-3 isotope-item Spell">
									<div>
                            <div class="form-group">
                  <label class="col-sm-5 control-label">镜像法术：</label>
                  <div class="col-sm-7">
                  <select name="Clone" id="Clone" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="等级">
<option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                      </optgroup>
                    </select>
				</div>		
			</div>
            
            </div>
            </div>
							
                            <div class="col-sm-6 col-md-3 isotope-item Spell">
									<div>
                            <div class="form-group">
                  <label class="col-sm-5 control-label">毒药法术：</label>
                  <div class="col-sm-7">
                  <select name="Poison" id="Poison" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="等级">
<option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                      </optgroup>
                    </select>
				</div>		
			</div>
            
            </div>
            </div>
            
            <div class="col-sm-6 col-md-3 isotope-item Spell">
									<div>
                            <div class="form-group">
                  <label class="col-sm-5 control-label">地震法术：</label>
                  <div class="col-sm-7">
                  <select name="EarthQuake" id="EarthQuake" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="等级">
<option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                      </optgroup>
                    </select>
				</div>		
			</div>
            
            </div>
            </div>
            
            <div class="col-sm-6 col-md-3 isotope-item Spell">
									<div>
                            <div class="form-group">
                  <label class="col-sm-5 control-label">极速法术：</label>
                  <div class="col-sm-7">
                  <select name="Haste" id="Haste" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="等级">
<option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                      </optgroup>
                    </select>
				</div>		
			</div>
            
            </div>
            </div>
            
            <div class="col-sm-6 col-md-3 isotope-item Spell">
									<div>
                            <div class="form-group">
                  <label class="col-sm-5 control-label">骷髅法术：</label>
                  <div class="col-sm-7">
                  <select name="Skeleton" id="Skeleton" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="等级">
<option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                      </optgroup>
                    </select>
				</div>		
			</div>
            
            </div>
            </div>

<div class="col-sm-6 col-md-3 isotope-item  DarkElixir">
									<div>
                            <div class="form-group">
                  <label class="col-sm-5 control-label">亡灵：</label>
                  <div class="col-sm-7">
                  <select name="Minion" id="Minion" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="等级">
<option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                      </optgroup>
                    </select>
				</div>		
			</div>
            
            </div>
            </div>
            
            <div class="col-sm-6 col-md-3 isotope-item  DarkElixir">
									<div>
                            <div class="form-group">
                  <label class="col-sm-5 control-label">野猪骑士：</label>
                  <div class="col-sm-7">
                  <select name="HogRider" id="HogRider" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="等级">
<option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                      </optgroup>
                    </select>
				</div>		
			</div>
            
            </div>
            </div>
            
            <div class="col-sm-6 col-md-3 isotope-item DarkElixir">
									<div>
                            <div class="form-group">
                  <label class="col-sm-5 control-label">瓦里基女武神</label>
                  <div class="col-sm-7">
                  <select name="Valkyrie" id="Valkyrie"  class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="等级">
<option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </optgroup>
                    </select>
				</div>		
			</div>
            
            </div>
            </div>
            
            <div class="col-sm-6 col-md-3 isotope-item DarkElixir">
									<div>
                            <div class="form-group">
                  <label class="col-sm-5 control-label">石头人：</label>
                  <div class="col-sm-7">
                  <select name="Golem" id="Golem" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="等级">
<option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </optgroup>
                    </select>
				</div>		
			</div>
            
            </div>
            </div>
            
            <div class="col-sm-6 col-md-3 isotope-item DarkElixir">
									<div>
                            <div class="form-group">
                  <label class="col-sm-5 control-label">女巫：</label>
                  <div class="col-sm-7">
                  <select name="Witch" id="Witch" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="等级">
<option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                      </optgroup>
                    </select>
				</div>		
			</div>
            
            </div>
            </div>
            
            <div class="col-sm-6 col-md-3 isotope-item DarkElixir">
									<div>
                            <div class="form-group">
                  <label class="col-sm-5 control-label">熔岩猎犬：</label>
                  <div class="col-sm-7">
                  <select name="LavaHound" id="LavaHound" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="等级">
<option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                      </optgroup>
                    </select>
				</div>		
			</div>
            
            </div>
            </div>
            
            <div class="col-sm-6 col-md-3 isotope-item DarkElixir">
									<div>
                            <div class="form-group">
                  <label class="col-sm-5 control-label">巨石投手：</label>
                  <div class="col-sm-7">
                  <select name="Bowler" id="Bowler" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="等级">
<option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                      </optgroup>
                    </select>
				</div>		
			</div>
            
            </div>
            </div>
            
            <div class="col-sm-6 col-md-3 isotope-item DarkElixir">
									<div>
                            <div class="form-group">
                  <label class="col-sm-5 control-label">野蛮人之王：</label>
                  <div class="col-sm-7">
                  <select name="BarKing" id="BarKing" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="等级">
<option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                        <option>13</option>
                        <option>14</option>
                        <option>15</option>
                        <option>16</option>
                        <option>17</option>
                        <option>18</option>
                        <option>19</option>
                        <option>20</option>
                        <option>21</option>
                        <option>22</option>
                        <option>23</option>
                        <option>24</option>
                        <option>25</option>
                        <option>26</option>
                        <option>27</option>
                        <option>28</option>
                        <option>29</option>
                        <option>30</option>
                        <option>31</option>
                        <option>32</option>
                        <option>33</option>
                        <option>34</option>
                        <option>35</option>
                        <option>36</option>
                        <option>37</option>
                        <option>38</option>
                        <option>39</option>
                        <option>40</option>
                      </optgroup>
                    </select>
				</div>		
			</div>
            
            </div>
            </div>
            
            <div class="col-sm-6 col-md-3 isotope-item DarkElixir">
									<div>
                            <div class="form-group">
                  <label class="col-sm-5 control-label">弓箭女皇：</label>
                  <div class="col-sm-7">
                  <select name="ArcQueen" id="ArcQueen" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="等级">
<option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                        <option>13</option>
                        <option>14</option>
                        <option>15</option>
                        <option>16</option>
                        <option>17</option>
                        <option>18</option>
                        <option>19</option>
                        <option>20</option>
                        <option>21</option>
                        <option>22</option>
                        <option>23</option>
                        <option>24</option>
                        <option>25</option>
                        <option>26</option>
                        <option>27</option>
                        <option>28</option>
                        <option>29</option>
                        <option>30</option>
                        <option>31</option>
                        <option>32</option>
                        <option>33</option>
                        <option>34</option>
                        <option>35</option>
                        <option>36</option>
                        <option>37</option>
                        <option>38</option>
                        <option>39</option>
                        <option>40</option>
                      </optgroup>
                    </select>
				</div>		
			</div>
            
            </div>
            </div>
            
            <div class="col-sm-6 col-md-3 isotope-item DarkElixir">
									<div>
                            <div class="form-group">
                  <label class="col-sm-5 control-label">大守护者：</label>
                  <div class="col-sm-7">
                  <select name="GrandWarden" id="GrandWarden" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="等级">
<option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                        <option>13</option>
                        <option>14</option>
                        <option>15</option>
                        <option>16</option>
                        <option>17</option>
                        <option>18</option>
                        <option>19</option>
                        <option>20</option>
                      </optgroup>
                    </select>
				</div>		
			</div>
            
            </div>
            </div>


						</div>

                                            
                        <div class="col-sm-6  col-md-offset-3">
    <h3><input class="btn btn-default btn-lg btn-block" role="button" value="保存" type="submit"></h3>
    </div>                      
                        
					</div>
				</div>
                
                </form>
			</div>

		<!-- section end -->
        
  <div class="container-fluid" id="defense">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h1 class="text-center" ></h1>
    </div>
  </div>
  <hr>
</div>
        
     <!-- section start -->
		<!-- ================ -->
			<div class="container">
            
            <form action="adddefense.php" method="post" name="technologyinfo" class="form-horizontal">
            <div class="row yunyouback" data-animation-effect="fadeIn">
				<h1 class="text-center title">防御信息</h1>
				<p class="lead text-center">请认真填写您的防御信息！</p>		
					<div class="col-md-12">

						<!-- isotope filters start -->
						<div class="filters2 center-block text-center" >
							<ul class="nav nav-tabs nav-justified navbar-inverse filter-option" style="opacity:0.8;" data-filter-group="defense">
								<li class="active"><a href="#" data-filter=".DefenseBuilding,.DefenseTrap">所有防御</a></li>
								<li><a href="#" data-filter=".DefenseBuilding">防御建筑</a></li>
								<li><a href="#" data-filter=".DefenseTrap">防御陷阱</a></li>
							</ul>
						</div>
                        <br>
        
						<!-- isotope filters end -->

						<!-- portfolio items start -->
						<div id="defensefilter" class="isotope-container2 row grid-space-20" >
							<div class="col-sm-6 col-md-6 isotope-item2 DefenseBuilding">

                    
              <div class="form-group">

							<label class="col-sm-5 control-label">加农炮：</label>
                            <div class="col-sm-7">
                  <select name="Cannon" id="Cannon" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="等级">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                        <option>13</option>
                        <option>14</option>
                      </optgroup>
                    </select>
                    <select name="CannonNum" id="CannonNum" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="数量">
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                      </optgroup>
                    </select>
					</div>		
              </div>

					</div>
                    
                    <div class="col-sm-6 col-md-6 isotope-item2 DefenseBuilding">             
              <div class="form-group">

							<label class="col-sm-5 control-label">箭塔：</label>
                            <div class="col-sm-7">
                  <select name="ArcherTower" id="ArcherTower" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="等级">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                        <option>13</option>
                        <option>14</option>
                      </optgroup>
                    </select>
                    <select name="ArcherTowerNum" id="ArcherTowerNum" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="数量">
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                      </optgroup>
                    </select>
					</div>		
              </div>
					</div>
                    
                    <div class="col-sm-6 col-md-6 isotope-item2 DefenseBuilding">             
              <div class="form-group">

							<label class="col-sm-5 control-label">法师塔：</label>
                            <div class="col-sm-7">
                  <select name="WizardTower" id="WizardTower" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="等级">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                      </optgroup>
                    </select>
                    <select name="WizardTowerNum" id="WizardTowerNum" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="数量">
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </optgroup>
                    </select>
					</div>		
              </div>
					</div>
                    
                    <div class="col-sm-6 col-md-6 isotope-item2 DefenseBuilding">             
              <div class="form-group">

							<label class="col-sm-5 control-label">防空火箭：</label>
                            <div class="col-sm-7">
                  <select name="AirDefense" id="AirDefense" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="等级">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                      </optgroup>
                    </select>
                    <select name="AirDefenseNum" id="AirDefenseNum" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="数量">
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                      </optgroup>
                    </select>
					</div>		
              </div>
					</div>
                    
                     <div class="col-sm-6 col-md-6 isotope-item2 DefenseBuilding">             
              <div class="form-group">

							<label class="col-sm-5 control-label">迫击炮：</label>
                            <div class="col-sm-7">
                  <select name="Mortar" id="Mortar" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="等级">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                      </optgroup>
                    </select>
                    <select name="MortarNum" id="MortarNum" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="数量">
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                      </optgroup>
                    </select>
					</div>		
              </div>
					</div>
                    
                     <div class="col-sm-6 col-md-6 isotope-item2 DefenseBuilding">             
              <div class="form-group">

							<label class="col-sm-5 control-label">特斯拉电磁塔：</label>
                            <div class="col-sm-7">
                  <select name="Tesla" id="Tesla" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="等级">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                      </optgroup>
                    </select>
                    <select name="TeslaNum" id="TeslaNum" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="数量">
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                      </optgroup>
                    </select>
					</div>		
              </div>
					</div>
                    
                     <div class="col-sm-6 col-md-6 isotope-item2 DefenseBuilding">             
              <div class="form-group">

							<label class="col-sm-5 control-label">空气炮：</label>
                            <div class="col-sm-7">
                  <select name="AirSweeper" id="AirSweeper" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="等级">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                      </optgroup>
                    </select>
                    <select name="AirSweeperNum" id="AirSweeperNum" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="数量">
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                      </optgroup>
                    </select>
					</div>		
              </div>
					</div>
                    
                     <div class="col-sm-6 col-md-6 isotope-item2 DefenseBuilding">             
              <div class="form-group">

							<label class="col-sm-5 control-label">炸弹塔：</label>
                            <div class="col-sm-7">
                  <select name="BombTower" id="BombTower" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="等级">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </optgroup>
                    </select>
                    <select name="BombTowerNum" id="BombTowerNum" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="数量">
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                      </optgroup>
                    </select>
					</div>		
              </div>
					</div>
                    
                     <div class="col-sm-6 col-md-6 isotope-item2 DefenseBuilding">             
              <div class="form-group">

							<label class="col-sm-5 control-label">X-连弩：</label>
                            <div class="col-sm-7">
                  <select name="Xbow" id="Xbow" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="等级">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </optgroup>
                    </select>
                    <select name="XbowNum" id="XbowNum" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="数量">
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                      </optgroup>
                    </select>
					</div>		
              </div>
					</div>
                    
                     <div class="col-sm-6 col-md-6 isotope-item2 DefenseBuilding">             
              <div class="form-group">

							<label class="col-sm-5 control-label">地狱塔：</label>
                            <div class="col-sm-7">
                  <select name="Inferno" id="Inferno" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="等级">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                      </optgroup>
                    </select>
                    <select name="InfernoNum" id="InfernoNum" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="数量">
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                      </optgroup>
                    </select>
					</div>		
              </div>
					</div>
                    
                     <div class="col-sm-6 col-md-6 isotope-item2 DefenseBuilding">             
              <div class="form-group">

							<label class="col-sm-5 control-label">天鹰火炮：</label>
                            <div class="col-sm-7">
                  <select name="AncientArtillery" id="AncientArtillery" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="等级">
                        <option>1</option>
                        <option>2</option>
                      </optgroup>
                    </select>
                    <select name="AncientArtilleryNum" id="AncientArtilleryNum" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="数量">
                        <option>0</option>
                        <option>1</option>
                      </optgroup>
                    </select>
					</div>		
              </div>
					</div>
                     

 <div class="col-sm-6 col-md-6 isotope-item2 DefenseTrap">             
              <div class="form-group">

							<label class="col-sm-5 control-label">小型炸弹：</label>
                            <div class="col-sm-7">
                  <select name="SmallBombs" id="SmallBombs" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="等级">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                      </optgroup>
                    </select>
                    <select name="SmallBombsNum" id="SmallBombsNum" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="数量">
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                      </optgroup>
                    </select>
					</div>		
              </div>
					</div>

 <div class="col-sm-6 col-md-6 isotope-item2 DefenseTrap">             
              <div class="form-group">

							<label class="col-sm-5 control-label">隐形弹簧：</label>
                            <div class="col-sm-7">
                  <select name="SpringTraps" id="SpringTraps" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="等级">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </optgroup>
                    </select>
                    <select name="SpringTrapsNum" id="SpringTrapsNum" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="数量">
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                      </optgroup>
                    </select>
					</div>		
              </div>
					</div>
                    
                     <div class="col-sm-6 col-md-6 isotope-item2 DefenseTrap">             
              <div class="form-group">

							<label class="col-sm-5 control-label">巨型炸弹：</label>
                            <div class="col-sm-7">
                  <select name="GiantBombs"id="GiantBombs" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="等级">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                      </optgroup>
                    </select>
                    <select name="GiantBombsNum" id="GiantBombsNum" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="数量">
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </optgroup>
                    </select>
					</div>		
              </div>
					</div>
                    
                     <div class="col-sm-6 col-md-6 isotope-item2 DefenseTrap">             
              <div class="form-group">

							<label class="col-sm-5 control-label">空中炸弹：</label>
                            <div class="col-sm-7">
                  <select name="AirBombs" id="AirBombs" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="等级">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                      </optgroup>
                    </select>
                    <select name="AirBombsNum" id="AirBombsNum" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="数量">
                        <option>0</option>
<option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </optgroup>
                    </select>
					</div>		
              </div>
					</div>
                    
                     <div class="col-sm-6 col-md-6 isotope-item2 DefenseTrap">             
              <div class="form-group">

							<label class="col-sm-5 control-label">搜空地雷：</label>
                            <div class="col-sm-7">
                  <select name="SeekingAirMines" id="SeekingAirMines" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="等级">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                      </optgroup>
                    </select>
                    <select name="SeekingAirMinesNum" id="SeekingAirMinesNum" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="数量">
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </optgroup>
                    </select>
					</div>		
              </div>
					</div>
                    
                     <div class="col-sm-6 col-md-6 isotope-item2 DefenseTrap">             
              <div class="form-group">

							<label class="col-sm-5 control-label">骷髅陷阱：</label>
                            <div class="col-sm-7">
                  <select name="SkeletonTraps" id="SkeletonTraps" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="等级">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                      </optgroup>
                    </select>
                    <select name="SkeletonTrapsNum" id="SkeletonTrapsNum" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="数量">
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                      </optgroup>
                    </select>
					</div>		
              </div>
					</div>

                               <div class="col-sm-6 col-md-6 isotope-item2 DefenseBuilding">             
              <div class="form-group">

              <label class="col-sm-5 control-label">城墙：</label>
                            <div class="col-sm-7 form-inline">
                  <select name="Wall" class="selectpicker" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="等级">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                      </optgroup>
                    </select>
                    <input type="number" name="WallNum" class="form-control" min="0" max="275" value="0" style="width: 100px;">
          </div>    
              </div>
          </div>
                   
            


						</div>

                                            
                        <div class="col-sm-6  col-md-offset-3">
    <h3><input class="btn btn-default btn-lg btn-block" role="button" value="保存" type="submit"></h3>
    </div>                      
                        
					
                    
					</div>
                    
                    
				</div>
                
                </form>
			</div>

		<!-- section end -->
        <!-- section end -->
        
  <div class="container-fluid" id="match">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h1 class="text-center" ></h1>
    </div>
  </div>
  <hr>
</div>
        
        <?php
        include("matchcount.php");
        ?>
     <!-- section start -->


    <!-- ================ -->
      <div class="container">  
        <div class="row yunyouback" data-animation-effect="fadeIn";>
        <h1 class="text-center title">匹配值数据</h1>
        <hr>
        <p class="lead text-center">您防御所占的匹配值:&nbsp;<?php echo $matchdata;?></p>    
          <div class="col-md-12 text-center">

          </div>
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
<script src="js/bootstrap-select.js"></script>

<script type="text/javascript" src="plugins/jquery.min.js"></script>

		<!-- Modernizr javascript -->
		<script type="text/javascript" src="plugins/modernizr.js"></script>

		<!-- Isotope javascript -->
		<script type="text/javascript" src="plugins/isotope/isotope.pkgd.min.js"></script>
		
		<!-- Backstretch javascript -->
		<script type="text/javascript" src="plugins/jquery.backstretch.min.js"></script>

		<!-- Appear javascript -->
		<script type="text/javascript" src="plugins/jquery.appear.js"></script>

		<!-- Initialization of Plugins -->
		<script type="text/javascript" src="js/template.js"></script>

		<!-- Custom Scripts -->
		<script type="text/javascript" src="js/custom.js"></script>
        
        <script type="text/javascript">
    jQuery(document).ready(function($){
        $('.nav_basicdata').click(function(){$('html,body').animate({scrollTop: '0px'}, 700);}); 
        $('.nav_technology').click(function(){$('html,body').animate({scrollTop: $('#technology').offset().top}, 700);});
        $('.nav_defense').click(function(){$('html,body').animate({scrollTop:$('#defense').offset().top}, 700);});
    });
</script>


</body>
</html>