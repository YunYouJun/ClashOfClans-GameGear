<?php require_once('Connections/clandata.php'); 
if (!isset($_SESSION)) {
  session_start();
}
if(isset($_SESSION['MM_Username']))
{
  header("Location: welcome.php");
}
?>
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

if (isset($_POST['usercode'])) {
  $loginUsername=$_POST['usercode'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "welcome.php";
  $MM_redirectLoginFailed = "index.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_clandata, $clandata);
  
  $LoginRS__query=sprintf("SELECT Code, Password FROM clanmember WHERE Code=%s AND Password=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $clandata) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
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
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $WebName;?></title>

<?php
include("headlink.php");
?>

</head>

<body>

<?php
include("navbar.php");
?>



<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h1 class="text-center">登录</h1>
    </div>
  </div>
  <hr style="opacity:0.3">
</div>
<div class="container">
<form ACTION="<?php echo $loginFormAction; ?>" METHOD="POST" style="max-width:500px;margin:0 auto;" role="form" name="clanerlogin" class="form-horizontal">

    <div class="text-center col-md-12" >
    
    <div>
      <div class="form-group">
      <div class="input-group">
      <span class="input-group-addon" style="font-size:large;background-color:rgba(255,255,255,0.70);font-family:Supercell-Magic_5;">
        #
      </span>
      <input name="usercode" type="text" class="form-control input-lg" placeholder="您的部落个人标签"
      style="background-color:rgba(255,255,255,0.30);" autocomplete="on" maxlength="10">
      </div>
      </div>
      <div class="form-group">
      <input name="password" type="password" class="form-control input-lg" placeholder="您的密码&nbsp;(最好是字母和数字混合哦！)" style="background-color:rgba(255,255,255,0.30);">
      </div>
      <!--<div class="checkbox" align="left">
          <label>
            <input type="checkbox" value="remember-me"> 记住我
          </label>
        </div>-->
      <div class="form-group">
      <input type="submit" class="btn btn-default btn-lg btn-block" value="登录"> 
      </div>
      <div class="form-group">
      <a href="register.php"><button type="button" class="btn btn-default btn-lg btn-block"  role="button">注册</button></a> 
      </div>
      </div>  
    </div>

 </form>
</div>
<?php 
include("foot.php");
?>
</body>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js/jquery-1.11.3.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/bootstrap.js"></script>
</html>
