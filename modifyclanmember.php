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
  $updateSQL = sprintf("UPDATE clanmember SET Password=%s, VillageName=%s, Position=%s,`Level`=%s, TownHallLevel=%s, Star=%s, Donation=%s, Email=%s, QQorWechat=%s WHERE Code=%s",
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['villagename'], "text"),
                       GetSQLValueString($_POST['Position'], "int"),
                       GetSQLValueString($_POST['level'], "int"),
                       GetSQLValueString($_POST['townhalllevel'], "int"),
                       GetSQLValueString($_POST['star'], "int"),
                       GetSQLValueString($_POST['donation'], "int"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['qqorwechat'], "text"),
                       GetSQLValueString($_POST['usercode'], "text"));

  mysql_select_db($database_clandata, $clandata);
  $Result1 = mysql_query($updateSQL, $clandata) or die(mysql_error());

  $updateGoTo = "clanmanage.php";
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
$sqlmember = mysql_query ( "select * from clanmember where Code='".$_GET['Code']."'",$clandata);
$infomember = mysql_fetch_array($sqlmember);


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>部落冲突BOX</title>

<!-- Bootstrap -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/yunyouclan.css" rel="stylesheet">
<link rel="stylesheet" href="css/bootstrap-select.css">

<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" media="screen" />
<link rel="Bookmark" href="favicon.ico" >


<!-- Font Awesome CSS -->
		<link href="fonts/font-awesome/css/font-awesome.css" rel="stylesheet">

		<!-- Plugins -->
		<link href="css/animations.css" rel="stylesheet">


		<!-- Custom css --> 
		<link href="css/custom.css" rel="stylesheet">
<style>
@font-face{
    font-family:'Supercell-Magic_5';
    src:url('fonts/Supercell-Magic_5.ttf') format('truetype');  
}
body
{
	font-family: "微软雅黑","幼圆", "楷体", "隶书", "华文隶书", "黑体",  "华文行楷";	
     font-family: "Microsoft YaHei",Arial,Helvetica,sans-serif;	
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

<script type="text/javascript" language="javascript">   

function ready(){
document.getElementById("clanmember").classList.add('active');
 $("#position").val(<?php echo $infomember["Position"];?>);

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
  <div  class="row yunyouback" data-animation-effect="fadeIn" style="background-image:url(images/Clash_Barbarian.png); background-repeat:no-repeat; background-size:contain; background-position:center;">
    <div class="text-center col-md-6">
    
    <div class="form-group form-group-lg">
    <h3><label class="col-lg-3 control-label">个人标签</label>
    
      <div class="col-lg-8">
      <div class="input-group">
      <span class="input-group-addon" style="font-size:larger;background-color:rgba(255,255,255,0.80);">
        #
      </span>
      <input name="usercode" type="text" required="required" class="form-control" 
      style="background-color:rgba(255,255,255,0.60);"  maxlength="10" readonly value="<?php echo $infomember["Code"];?>">
      </div>
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
      <input name="email" type="email" required="required" readonly class="form-control" placeholder="电子邮箱" style="background-color:rgba(255,255,255,0.60);" value="<?php echo $infomember["Email"];?>">
     </div>
     </div>
      
      <div class="form-group form-group-lg">
      <h3><label class="col-sm-3 control-label">QQ/微信号</label></h3>
      <div class="col-sm-8">
      <input name="qqorwechat" type="text" class="form-control" readonly placeholder="QQ/微信号(可不填)" style="background-color:rgba(255,255,255,0.60);" value="<?php echo $infomember["QQorWechat"];?>">
      </div>
      </div>
      
          <div class="form-group form-group-lg">
      <h3><label class="col-sm-3 control-label">所属部落</label></h3>
      <div class="col-sm-8">
      <input name="clancode" type="text" class="form-control" placeholder="所在的部落" style="background-color:rgba(255,255,255,0.60);" readonly title="部落编号" value="<?php echo "#  ".$infomember["ClanCode"];?>">
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
      <input name="donation" type="text" class="form-control" placeholder="填写你的大致捐兵数" style="background-color:rgba(255,255,255,0.60);" maxlength="7" value="<?php echo $infomember["Donation"];?>">
      </div>
      </div>
    
    
    <div class="form-group form-group-lg">
      <h3><label class="col-sm-3 control-label">职位</label></h3>
      <div class="col-sm-8">
      <select name="Position" id="position" class=" form-control" style="background-color:rgba(255,255,255,0.60);" data-hide-disabled="true" data-live-search="true">
                      <optgroup label="职位">
<option value="0">成员</option>
                    <option value="1">长老</option>
                    <option value="2">副首领</option>            
                      </optgroup>
                    </select>
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

</script>


</body>
</html>