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
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['ClanCode'])) {
  $loginClan=$_POST['ClanCode'];
  $password=$_POST['ClanPassword'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "clanmanage.php";
  $MM_redirectLoginFailed = "clanlogin.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_clandata, $clandata);
  
  $LoginRS__query=sprintf("SELECT ClanCode, ClanPassword FROM clan WHERE ClanCode=%s AND ClanPassword=%s",
    GetSQLValueString($loginClan, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $clandata) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Clan'] = $loginClan;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
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

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<script>
function ready(){
document.getElementById("clan").classList.add('active');
}
</script>

<body onLoad="ready()">
<?php
include("navbar.php");
?>


<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h1 class="text-center">登录部落账号</h1>
    </div>
  </div>
  <hr style="opacity:0.3">
</div>
<div class="container">
<form ACTION="<?php echo $loginFormAction; ?>" METHOD="POST" style="max-width:500px;margin:0 auto;" role="form" name="clanerlogin">
  <div class="row">
    <div class="text-center col-md-12" >
    
    <div>
      <div class="input-group">
      <span class="input-group-addon" style="font-size:large;background-color:rgba(255,255,255,0.70);font-family:Supercell-Magic_5;">
        #
      </span>
      <input name="ClanCode" type="text" class="form-control input-lg" placeholder="您的部落标签"
      style="background-color:rgba(255,255,255,0.60);" autocomplete="on" maxlength="10">
      </div>
      <br>
      <input name="ClanPassword" type="password" class="form-control input-lg" placeholder="您的部落密码&nbsp;(最好是字母和数字混合哦！)" style="background-color:rgba(255,255,255,0.60);">
      <!--<div class="checkbox" align="left">
          <label>
            <input type="checkbox" value="remember-me"> 记住我
          </label>
        </div>-->
      <br>
      <input type="submit" class="btn btn-default btn-lg btn-block" style="opacity:0.9" value="登录部落"> 
      <a href="registerclan.php" class="btn btn-default btn-lg btn-block"  style="opacity:0.9;color: #000;" role="button">注册部落</a> 
      </div>  
    </div>
  </div>
 </form>
  <hr style="opacity:0.3">
  <div class="row">
    <div class="text-center col-md-6 col-md-offset-3">
      <p style="font-family:Supercell-Magic_5">Copyright &copy; 2016 &middot; All Rights Reserved &middot;<a style="color:#FFFFFF;">Yunyoujun</a></p>
    </div>
  </div>
  <hr style="opacity:0.3">
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery-1.11.3.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.js"></script>
</body>
</html>
