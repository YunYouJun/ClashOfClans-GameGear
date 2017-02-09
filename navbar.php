  

<header class="header fixed clearfix navbar navbar-fixed-top">
<nav class="navbar  navbar-inverse" style="background-color:rgba(0,0,0,0.7);">

 <?php
 mysql_select_db($database_clandata, $clandata);
if (!isset($_SESSION)) {
  session_start();
}
		// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
//	  $logoutGoTo = "index.php";
//  if ($logoutGoTo) {
//   header("Location: $logoutGoTo");
//    exit;
	
	echo  "<script>window.location.href='index.php';</script>";
	
	session_destroy();
 // }
  
}


$logoutClanAction = $_SERVER['PHP_SELF']."?doLogoutClan=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutClanAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogoutClan'])) &&($_GET['doLogoutClan']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Clan'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Clan']);
  unset($_SESSION['PrevUrl']);


  echo  "<script>window.location.href='clanlogin.php';</script>";

  
}
?>  

  <div class="container-fluid"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
      

      <?php
		if(isset($_SESSION['MM_Clan'])){
$clanName = mysql_query ( "select ClanName from clan where ClanCode='".$_SESSION['MM_Clan']."'",$clandata);
$cname = mysql_fetch_array($clanName);
$_SESSION['ClanName'] = $cname['ClanName'];


      $sqljoin=mysql_query("select count(*) as total from joinclan where ClanCode='".$_SESSION['MM_Clan']."'",$clandata);
      $infojoin=mysql_fetch_array($sqljoin);
			?>
 <ul class="nav navbar-nav">
    <li class="dropdown" id="myclan"><a href="#" class="dropdown-toggle navbar-brand" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo  $_SESSION['ClanName'];?><span class="caret"></span></a>
          <ul class="dropdown-menu"  role="menu" style="filter:alpha(opacity=0);">
            <li id="claninfo"><a href="claninfo.php">部落信息</a></li>
            <li id="clanmanage"><a href="clanmanage.php">成员管理&nbsp;<?php if($infojoin['total']>0){?><span class="badge"><?php echo $infojoin['total'];?><?php } ?></span></a></li> 
            <li id="clanwar"><a href="clanwar.php">部落战</a></li> 
            <li id="clanwordmanage"><a href="clanwordmanage.php">部落留言</a></li>   
            <li class="divider" ></li>
           <li><a href="<?php echo $logoutClanAction ?>">注销部落</a></li>
          </ul>
        </li> 
        </ul>
 
 
            
            <?php
		}else{?>

     <?php if(isset($_SESSION['MM_Username'])){  
//这时候才显示可以登录部落
  ?>
		<a class="navbar-brand" href="clanlogin.php" >
     <?php
          $myclancode = mysql_query ( "select ClanCode from clanmember where Code='".$_SESSION['MM_Username']."'",$clandata);
@$myccode = mysql_fetch_array($myclancode);
     $myclanName = mysql_query ( "select ClanName from clan where ClanCode='".$myccode['ClanCode']."'",$clandata);
@$mycname = mysql_fetch_array($myclanName);
 if($myccode['ClanCode']!=""){  
	  echo $mycname['ClanName']."</a>"; 
  }else echo "部落</a>"; 
} }
	  ?> 
      </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="defaultNavbar1">
      <ul class="nav navbar-nav">


      <li id="mainpage" ><a href="welcome.php"><span  class="glyphicon glyphicon-home"></span></a></li>
      <li id="orange_lottery_judge" ><a href="orange-lottery-judge.php">Orange Lottery Judge</a></li>
       <?php if(isset($_SESSION['MM_Username'])){  
//这时候才显示可以登录部落
  ?>
        <li id="clanmember"><a href="clanmember.php">成员<span class="sr-only"></span></a></li>
        <li id="clanwarformember"><a href="clanwarformember.php">部落战</a></li>
        <li id="clanword"><a href="clanword.php">部落留言</a></li>
        <li id="search"><a href="search.php">查询</a></li>
 <?php } ?>  

      </ul>

     <?php if(isset($_SESSION['MM_Username'])){  
  ?>
      <form class="navbar-form navbar-left" role="search" action="search.php" method="get">
        <div class="form-group">
          <input  type="text" class="form-control" name="keyword" id="keyword" placeholder="搜索" 
          <?php  if(@isset($_SESSION['keyword'])) echo "value='".$_SESSION['keyword']."'";?>>
        </div>&nbsp;&nbsp;
        <button type="submit" class="btn btn-default" >搜索</button>
      </form>
     <?php } ?>    
     
      
      <ul class="nav navbar-nav navbar-right">
      
      <?php
		if(isset($_SESSION['MM_Username'])){
      $sqlVillageName=mysql_query("select VillageName from clanmember where Code='".$_SESSION['MM_Username']."'",$clandata);
      $infoVillageName=mysql_fetch_array($sqlVillageName);   
			?>
      <li ><a style="color:rgba(255,255,255,1.00);">欢迎你，<?php echo $infoVillageName['VillageName'];?>.</a></li>
      

      <li class="dropdown" id="basicinfo"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">个人信息<span class="caret"></span></a>
          <ul class="dropdown-menu"  role="menu" style="filter:alpha(opacity=0);">
<!--            <li><a href="basicinfo.php#basicdata" class="nav_basicdata">基本信息</a></li>
            <li><a href="basicinfo.php#technology" class="nav_technology">科技信息</a></li>
            <li><a href="basicinfo.php#defense" class="nav_defense">防御信息</a></li>-->
            
            <li><a href="basicinfo.php#basicdata"  class="nav_basicdata">基本信息</a></li>
            <li><a href="basicinfo.php#technology" class="nav_technology">科技信息</a></li>
            <li><a href="basicinfo.php#defense" class="nav_defense">防御信息</a></li>
            
            <li class="divider" ></li>
            <li><a href="basicinfo.php#match" >匹配值</a></li>

        <?php   
          $myclancode = mysql_query ( "select ClanCode from clanmember where Code='".$_SESSION['MM_Username']."'",$clandata);
$myccode = mysql_fetch_array($myclancode);
         if($myccode['ClanCode']!=""){  ?>
            <li class="divider" ></li>
            <li><a href="quitclan.php" onclick="return confirm('确定要退出部落吗？')">退出我的部落</a></li>
            <?php } ?>
          </ul>
        </li> 

     
        <li><a href="<?php echo $logoutAction ?>">注销</a></li>
        
        
        <?php
		}else{
		?>
        <li><a href="index.php">登录</a></li>
        <li><a href="register.php">注册</a></li>
        <?php
		}
		?>
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>
</header>
<!-- <div class="container-fluid" id="basicdata">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h1 class="text-center" ></h1>
    </div>
  </div>
  <hr style="opacity:0.3">
</div>   -->