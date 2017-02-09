<?php require_once('Connections/clandata.php'); ?>
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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "clanupdate")) {
  $updateSQL = sprintf("UPDATE clan SET ClanName=%s, ClanLevel=%s, ClanPassword=%s, ClanLeader=%s, ClanGroup=%s WHERE ClanCode=%s",
                       GetSQLValueString($_POST['ClanName'], "text"),
                       GetSQLValueString($_POST['ClanLevel'], "int"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['ClanLeader'], "text"),
                       GetSQLValueString($_POST['ClanGroup'], "text"),
                       GetSQLValueString($_POST['clancode'], "text"));

  mysql_select_db($database_clandata, $clandata);
  $Result1 = mysql_query($updateSQL, $clandata) or die(mysql_error());

  $updateGoTo = "claninfo.php";
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
document.getElementById("claninfo").classList.add('active');
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

<body onLoad="ready()"><?php
include("navbar.php");
?>


<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h1 class="text-center">欢迎你，部落管理者。</h1>
    </div>
  </div>
  <hr style="opacity:0.3">
</div>

<div class="container">
<form action="<?php echo $editFormAction; ?>"  METHOD="POST"  role="form" name="clanupdate" class="form-horizontal">
  <div  class="row yunyouback" data-animation-effect="fadeIn" style="background-image:url(images/Clash_Barbarian.png); background-repeat:no-repeat; background-size:contain; background-position:center;">
    <div class="text-center col-md-6">
    
    <div class="form-group form-group-lg">
    <h3><label class="col-lg-3 control-label">部落名称</label></h3>
    
<div  class="col-sm-8">
      <input name="ClanName" type="text" required="required" class="form-control" 
      style="background-color:rgba(255,255,255,0.60);"  maxlength="10" value="<?php echo $infoclan["ClanName"];?>">
      </div>
      </div>


<div id="check1" class="form-group form-group-lg">   
      <h3><label class="col-sm-3 control-label">修改密码</label></h3>
      <div  class="col-sm-8">
      <input name="password" id="password" type="password" pattern="^[a-zA-Z]\w{5,17}$" required="required" class="form-control" placeholder="您的密码&nbsp;(最好是字母和数字混合哦！)" style="background-color:rgba(255,255,255,0.60);" title="以字母开头，长度在6~18位之间，只能包含字母、数字和下划线" maxlength="18" value="<?php echo $infoclan["ClanPassword"];?>">
      <span id="ok"></span>
      </div>
</div>

      <div id="check2" class="form-group form-group-lg">
      <h3><label class="col-sm-3 control-label">确认密码</label></h3>
      <div class="col-sm-8">
      <input name="password2" id="password2" type="password" required="required" class="form-control" placeholder="确认密码" style="background-color:rgba(255,255,255,0.60);" pattern="^[a-zA-Z]\w{5,17}$"  title="确认密码" value="<?php echo $infoclan["ClanPassword"];?>" onKeyUp="compare();">
      <span id="remove"></span>
      </div>
      </div>

<div class="form-group form-group-lg">
      <h3><label class="col-sm-3 control-label">部落人数</label></h3>
      <div class="col-sm-8">
      <input name="MemberNum" type="text" required="required" readonly class="form-control" placeholder="部落人数"  value="<?php echo $infoclan["MemberNum"];?>">
      </div>
</div>
      

    </div>
    <div class="text-center col-md-6">
      
      <div class="form-group form-group-lg">
      <h3><label class="col-sm-3 control-label">部落等级</label></h3>
      <div class="col-sm-8">
       <select id="ClanLevel" name="ClanLevel" class="form-control" style="background-color:rgba(255,255,255,0.60);">
         <option value="1" <?php if($infoclan["ClanLevel"]==1) {echo "selected=\"selected\"";} ?>>1</option>
         <option value="2" <?php if($infoclan["ClanLevel"]==2) {echo "selected=\"selected\"";} ?>>2</option>
         <option value="3" <?php if($infoclan["ClanLevel"]==3) {echo "selected=\"selected\"";} ?>>3</option>
         <option value="4" <?php if($infoclan["ClanLevel"]==4) {echo "selected=\"selected\"";} ?>>4</option>
         <option value="5" <?php if($infoclan["ClanLevel"]==5) {echo "selected=\"selected\"";} ?>>5</option>
         <option value="6" <?php if($infoclan["ClanLevel"]==6) {echo "selected=\"selected\"";} ?>>6</option>
         <option value="7" <?php if($infoclan["ClanLevel"]==7) {echo "selected=\"selected\"";} ?>>7</option>
         <option value="8" <?php if($infoclan["ClanLevel"]==8) {echo "selected=\"selected\"";} ?>>8</option>
         <option value="9" <?php if($infoclan["ClanLevel"]==9) {echo "selected=\"selected\"";} ?>>9</option>
         <option value="10" <?php if($infoclan["ClanLevel"]==10) {echo "selected=\"selected\"";} ?>>10</option>
         <option value="11" <?php if($infoclan["ClanLevel"]==11) {echo "selected=\"selected\"";} ?>>11</option>
         <option value="12" <?php if($infoclan["ClanLevel"]==12) {echo "selected=\"selected\"";} ?>>12</option>
         <option value="13" <?php if($infoclan["ClanLevel"]==13) {echo "selected=\"selected\"";} ?>>13</option>
         <option value="14" <?php if($infoclan["ClanLevel"]==14) {echo "selected=\"selected\"";} ?>>14</option>
         <option value="15" <?php if($infoclan["ClanLevel"]==15) {echo "selected=\"selected\"";} ?>>15</option>
       </select>

      </div>
      </div>
      
    <div class="form-group form-group-lg">
      <h3><label class="col-sm-3 control-label">部落标签</label></h3>
      <div class="col-lg-8">
      <div class="input-group">
      <span class="input-group-addon" style="font-family:Supercell-Magic_5;background-color:rgba(255,255,255,0.80);">
        #
      </span>
      <input name="clancode" type="text" class="form-control" placeholder="部落标签" style="text-transform:uppercase;" readonly title="部落标签" value="<?php echo $infoclan["ClanCode"];?>">
      </div>
      </div>
      </div>
      
      <div class="form-group form-group-lg">
      <h3><label class="col-sm-3 control-label">部落群号</label></h3>
      <div class="col-sm-8">
      <input name="ClanGroup" type="text" class="form-control" placeholder="部落群号" style="background-color:rgba(255,255,255,0.60);" value="<?php echo $infoclan["ClanGroup"];?>">
      </div>
      </div>
      
      <div class="form-group form-group-lg">
      <h3><label class="col-sm-3 control-label">首领标签</label></h3>
      <div class="col-sm-8">
      <div class="input-group">
      <span class="input-group-addon" style="font-family:Supercell-Magic_5;background-color:rgba(255,255,255,0.80);">
        #
      </span>
      <input name="ClanLeader" type="text" class="form-control" placeholder="首领标签" style="background-color:rgba(255,255,255,0.60);" value="<?php echo $infoclan["ClanLeader"];?>">
      </div>
      </div>
      </div>
    

    </div>
    
    
    <div class="col-sm-6  col-md-offset-3">
    <h3><input class="btn btn-default btn-lg btn-block" role="button" value="保存" type="submit"></h3>
    </div>

  <input type="hidden" name="MM_update" value="clanerupdate">

 </div>
  <input type="hidden" name="MM_update" value="clanupdate">
  </form>
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

