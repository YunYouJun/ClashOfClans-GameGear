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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "clanerregister")) {
  $usercode=$_POST['usercode'];
$usercode = str_replace("#","",$usercode);
  $insertSQL = sprintf("INSERT INTO clanmember (Code, Password, VillageName,TownHallLevel,Email, QQorWechat) VALUES (%s, %s,%s,%s,%s, %s)",
                       GetSQLValueString($usercode, "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['villagename'], "text"),
                       GetSQLValueString($_POST['TownHallLevel'], "int"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['qqorwechat'], "text"));

  mysql_select_db($database_clandata, $clandata);
  $Result1 = mysql_query($insertSQL, $clandata);
// or die(mysql_error())
  $insertGoTo = "index.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  if($Result1){header(sprintf("Location: %s", $insertGoTo));}
    else {
    echo "<div id='myalert' class='form-group' style='display:none;'>
<div class='alert alert-warning  col-sm-offset-2 col-sm-8'>
   <a href='#' class='close' data-dismiss='alert'>
      &times;   </a>
   <strong>警告！</strong>您已经注册过了哦！</div>
</div>";
echo "<script type='text/javascript'>";
echo "document.getElementById('myalert').style.display='';";

echo "</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $WebName;?>-注册</title>

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

<body>
<?php
include("navbar.php");
?>


<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h1 class="text-center">村庄注册</h1>
    </div>
  </div>
  <hr style="opacity:0.3">
</div>

<div class="container">
<form action="<?php echo $editFormAction; ?>" METHOD="POST" style="max-width:500px;margin:0 auto;" role="form" name="clanerregister" onSubmit="return formCheck()" class="form-horizontal">
    <div class="text-center col-md-12" >   
      <div class="form-group">
      <div class="input-group">
      <span class="input-group-addon" style="font-size:large;background-color:rgba(255,255,255,0.70);font-family:Supercell-Magic_5;">
        #
      </span>
      <input name="usercode" type="text" required="required" class="form-control" placeholder="您的部落个人标签"
      style="background-color:rgba(255,255,255,0.60);text-transform:uppercase;" autocomplete="on" maxlength="10">
      </div>
      </div>

      
      <div id="check1" class="form-group">
      <input name="password" id="password" type="password" pattern="^[a-zA-Z]\w{5,17}$" required="required" class="form-control" placeholder="您的密码&nbsp;(最好是字母和数字混合哦！)" style="background-color:rgba(255,255,255,0.60);" title="以字母开头，长度在6~18位之间，只能包含字母、数字和下划线" maxlength="18" jvmethod="checkPwd" onKeyUp="compare();">
      <span id="ok"></span>
      </div>

      <div id="check2" class="form-group">
      <input name="password2" id="password2" type="password" required="required" class="form-control" placeholder="确认密码" style="background-color:rgba(255,255,255,0.60);" pattern="^[a-zA-Z]\w{5,17}$"  title="确认密码" onKeyUp="compare();">
      <span id="remove"></span>
      </div>
      
      <div class="form-group">
      <input name="villagename" type="text" required="required" class="form-control" placeholder="村庄名称" style="background-color:rgba(255,255,255,0.60);">
      </div>
      <div class="form-group">
        <select name="TownHallLevel" class="form-control"  >
        
        <optgroup label="大本营等级">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
                      </optgroup>
                    </select>
      </div>
      <div class="form-group">
      <input name="email" type="email" class="form-control" placeholder="电子邮箱" style="background-color:rgba(255,255,255,0.60);">
      </div>
      <div class="form-group">
      <input name="qqorwechat" type="text" class="form-control" placeholder="QQ/微信号(可不填)" style="background-color:rgba(255,255,255,0.60);">
      </div>
      <div class="form-group">
      <input class="btn btn-default btn-lg btn-block" style="opacity:0.9" role="button" value="注册" type="submit">
      </div>
        
  </div>
  <input type="hidden" name="MM_insert" value="clanerregister">
 </form>
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
