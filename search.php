<?php require_once('Connections/clandata.php'); ?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}


?>

<?php

 
$fromurl="index.php";
if(!isset($_SESSION['MM_Username']))
 {
 header("Location:".$fromurl); exit;
 }
 
mysql_select_db($database_clandata, $clandata);
$VillageName = mysql_query ( "select VillageName from clanmember where Code='".$_SESSION['MM_Username']."'",$clandata);
$infomember = mysql_fetch_array($VillageName);

          if(isset($_GET['keyword'])){$_SESSION['keyword']=$_GET['keyword'];
          $keyword =$_SESSION['keyword']; }
           else @$keyword=$_SESSION['keyword'];

            $pagesize=10;
      
      if((@$_GET['pagemember'])==""){
          $pagemember=1;
      
      }else{
          $pagemember=intval($_GET['pagemember']);
      
      }

      if(!isset($_SESSION['fuhao'])){
          $_SESSION['fuhao']=">=";
      }else if(isset($_GET['fuhao'])){
      $_SESSION['fuhao']=$_GET['fuhao'];  
    }

    if(!isset($_SESSION['TownHallLevel'])){
          $_SESSION['TownHallLevel']="0";
      }else if(isset($_GET['TownHallLevel'])){
        if($_GET['TownHallLevel']=="")$_SESSION['TownHallLevel']=0;
        else
      $_SESSION['TownHallLevel']=$_GET['TownHallLevel'];  
    }
    if(!isset($_SESSION['turn'])) $_SESSION['turn']="desc";
    if(isset($_POST['turn'])){
    $_SESSION['turn'] = $_POST['turn'];
    }
    
    if(!isset($_SESSION['ziduan'])) $_SESSION['ziduan']="TownHallLevel";
    if(isset($_POST['ziduan'])){
    $_SESSION['ziduan'] = $_POST['ziduan'];
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $WebName;?>-查询</title>
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
document.getElementById("search").classList.add('active');
}
function turnordertownlevel()
{
  var turn = document.getElementById("turntownlevel").value;
  if(turn=="desc"){turn="asc";}
      else if(turn=="asc"||turn=="") {turn="desc";};
      document.getElementById("turntownlevel").value = turn;   
}
</script>


</head>

<body onLoad="ready()"><?php
include("navbar.php");
?>


<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h1 class="text-center">查询</h1>
    </div>
  </div>
  <hr style="opacity:0.3">
</div>
<div class="container-fluid">

  <div class="row yunyouback">
    <div class="text-center col-md-12" >
    
    <h3>人员</h3>

  <form name="searchtownlevel" id="searchtownlevel" class="form-group" role="search" action="search.php" method="get">
      <div class=" form-inline" style="margin-top: 15px;margin-bottom: 15px;">
        <div class="form-group">
          <input  type="text" class="form-control" name="keyword" id="keyword" placeholder="搜索" 
          <?php  if(@isset($_SESSION['keyword'])) echo "value='".$_SESSION['keyword']."'";?>>
        </div>
    <label class="btn btn-inverse-hover" style="font-size: medium;">大本营等级</label>
    <select name="fuhao" class="form-control" form="searchtownlevel" title="<>">
        <!--<option value=">="><></option>-->
        <option value=">=" <?php if (!(strcmp($_SESSION['fuhao'],'>='))) {echo "selected=\"selected\"";} ?>> ≥ </option>
        <option value="<=" <?php if (!(strcmp($_SESSION['fuhao'],'<='))) {echo "selected=\"selected\"";} ?>> ≤ </option>
        <option value="=" <?php if (!(strcmp($_SESSION['fuhao'],'='))) {echo "selected=\"selected\"";} ?>> = </option>
      </select>     
      <input type="search" class="form-control" name="TownHallLevel"  style="width:60px;" value="<?php if(isset($_SESSION['TownHallLevel'])){echo $_SESSION['TownHallLevel'];}?>"/>
        <button type="submit" class="btn btn-default" >搜索</button>
      </div>

  </form>

        <?php     
        $sqlmembernum=mysql_query("select count(*) as total from clanmember where (Code like '%".$keyword."%' or VillageName like '%".$keyword."%' or ClanCode like '%".$keyword."%') and TownHallLevel ".$_SESSION['fuhao'].$_SESSION['TownHallLevel'],$clandata);
    $infomembernum=mysql_fetch_array($sqlmembernum);
       if($infomembernum['total']==0){
  echo "<h3>没有搜索到该人员</h3>";
}else{
     ?>
    <table width align="center" cellpadding="0" cellspacing="0" class="col-md-12 yunyouback" border="1px" >
           <tr style="font-size:large;font-family:'幼圆', '隶书', '华文隶书';font-weight:bold;" height="40">
          <th ><div align="center">个人标签</div></th>
          <th ><div align="center">村庄名称</div></th>
          <th><div align="center">职位</div></th> 
          <th ><div align="center">个人等级</div></th>
          <form action="search.php" method="post" name="townlevel" id="townlevel">
          <input type="hidden" id="ziduan" name="ziduan" value="TownHallLevel"/>
          <input type="hidden" id="turntownlevel" name="turn" value="<?php echo $_SESSION['turn'];?>"/>
          </form>        
          <th ><div align="center"><a class="a2" href="javascript:document.townlevel.submit();" onClick="turnordertownlevel()">大本营等级</a></div></th>
          <th ><div align="center">战星</div></th>
          <th ><div align="center">捐兵数</div></th>
          <th ><div align="center">电子邮箱</div></th>
          <th ><div align="center">QQ/微信</div></th>
          <th ><div align="center">匹配值</div></th>
          <th ><div align="center">所属部落</div></th>
          <th ><div align="center">详细</div></th>
          </tr>
          <?php               

        $sqlmember=mysql_query("select * from clanmember where (Code like'%".$keyword."%' or VillageName like'%".$keyword."%' or ClanCode like'%".$keyword."%') and TownHallLevel ".$_SESSION['fuhao'].$_SESSION['TownHallLevel']." order by ".$_SESSION['ziduan']." ".$_SESSION['turn']." limit ".($pagemember-1)*$pagesize.",$pagesize ",$clandata);
        
             while($infomember=mysql_fetch_array($sqlmember))
		     {
		  ?>
        <tr style="font-family:'Supercell-Magic_5';FONT-WEIGHT:bold;">

          <td height="30"><div align="center"><?php echo $infomember['Code'];?></div></td>
          <td ><div align="center" ><a href="technologydefense.php?Code=<?php echo $infomember['Code'];?>" style="font-weight:bold;"><?php echo $infomember['VillageName'];?></a></div></td>
          <td ><div align="center">
          <?php if($infomember['ClanCode']!=""){
           if($infomember["Position"]==3) echo "首领";
	  else if($infomember["Position"]==2) echo "副首领";
	  else if($infomember["Position"]==1) echo "长老";
	  else if($infomember["Position"]==0) echo "成员";
  }else{
    echo "无";
  }
	  ?></div></td>
          <td ><div align="center"><?php echo $infomember['Level'];?></div></td>
          <td ><div align="center"><?php echo $infomember['TownHallLevel'];?></div></td>
          <td ><div align="center"><?php echo $infomember['Star'];?></div></td>
          <td ><div align="center"><?php echo $infomember['Donation'];?></div></td>
          <td ><div align="center"><?php echo $infomember['Email'];?></div></td>
          <td ><div align="center"><?php echo $infomember['QQorWechat'];?></div></td>    
          <td ><div align="center"><?php echo $infomember['PKMatch'];?></div></td>  
          <td ><div align="center"><?php if($infomember['ClanCode']!=""){ echo $infomember['ClanCode'];}else echo "无";?></div></td>     
          <td ><a href="technologydefense.php?Code=<?php echo $infomember['Code'];?>"><i class="glyphicon glyphicon-th-list"></i></a></td>      
          </tr>
          <?php
			 }
  
			 ?>
          
   </table>
     <?php   
    }
    ?>
   <!--  分页 -->
<hr>
              <div align="center">
              <div>搜索结果共有&nbsp;<?php echo $infomembernum['total'];?>&nbsp;条，&nbsp;
 每页显示&nbsp;<?php echo $pagesize;?>&nbsp;条。&nbsp;</div>
              <nav>
              <ul class="pagination">
        <?php
$total=$infomembernum['total'];

       if ($total<=$pagesize){
          $pagecount=1;
      } 
      if(($total%$pagesize)!=0){
         $pagecount=intval($total/$pagesize)+1;
      
      }else{
         $pagecount=$total/$pagesize;     
      }

      if($pagemember>=2)
      {
      ?>
        <li><a href="search.php?pagemember=1" class="glyphicon glyphicon-fast-backward" title="首页"></a></li>
        <li><a href="search.php?pagemember=<?php echo $pagemember-1;?>" class="glyphicon glyphicon-step-backward" title="前一页"></a></li>
        <?php
      }
       if($pagecount<=5){
        for($i=1;$i<=$pagecount;$i++){
      ?>
        <li class="<?php if($i==$pagemember){echo 'active';}?>"><a href="search.php?pagemember=<?php echo $i;?>" class="glyphicon" style="font-weight:bolder;"><?php echo $i;?></a></li>
        <?php
         }
       }else{
         if($pagecount>$pagemember+5){
       for($i=$pagemember;$i<=$pagemember+5;$i++){   
      ?>
        <li class="<?php if($i==$pagemember){echo 'active';}?>"><a href="search.php?pagemember=<?php echo $i;?>" class="glyphicon" style="font-weight:bolder;"><?php echo $i;?></a></li>
        <?php } }
    else{
      for($i=$pagecount-4;$i<=$pagecount;$i++){  
      ?>
        <li class="<?php if($i==$pagemember){echo 'active';}?>"><a href="search.php?pagemember=<?php echo $i;?>" class="glyphicon" style="font-weight:bolder;"><?php echo $i;?></a></li>
  <?php   
      }
    }
    ?>
        <li><a href="search.php?pagemember=<?php echo $page+1;?>" title="后一页" class="glyphicon glyphicon-step-forward"></a></li> 
        <li><a href="search.php?pagemember=<?php echo $pagecount;?>" title="尾页" class="glyphicon glyphicon-fast-forward"></a></li>
        <?php }?>
        </ul>
        </nav>

    </div>
  </div>
</div>
<hr id="fenge">

<!--申请加入部落-->

  <div class="row yunyouback">
    <div class="text-center col-md-12" >
    <h3>部落</h3>
    <?php      $sqlclannum=mysql_query("select count(*) as total from clan where ClanCode like'%".$keyword."%' or ClanName like '%".$keyword."%'",$clandata);
     $infoclannum=mysql_fetch_array($sqlclannum);
       if($infoclannum['total']==0){
  echo "<h3>没有搜索到该部落</h3>";
}else{
     ?>
    <table align="center" cellpadding="0" cellspacing="0" class="col-md-12" border="1px" >
           <tr style="font-size:large;font-family:'幼圆', '隶书', '华文隶书';font-weight:bold;" height="40">
          <th ><div align="center">部落标签</div></th>
          <th ><div align="center">部落名称</div></th>
          <th ><div align="center">部落等级</div></th>
          <th ><div align="center">部落人数</div></th>
          <th ><div align="center">部落群号</div></th>
          <th ><div align="center">首领标签</div></th>
          <th ><div align="center">申请加入</div></th>
          </tr>

<?php      
      if((@$_GET['pageclan'])==""){
          $pageclan =1;
      
      }else{
          $pageclan=intval($_GET['pageclan']);
      
      }

     $sqlclan=mysql_query("select *  from clan where ClanCode like'%".$keyword."%' or ClanName like '%".$keyword."%' limit ".($pageclan-1)*$pagesize.",$pagesize",$clandata);
        while($infoclan=mysql_fetch_array($sqlclan))
         {
      ?>


        <tr style="font-family:'Supercell-Magic_5';FONT-WEIGHT:bold;height: 35px;">

          <td ><div align="center"><?php echo $infoclan['ClanCode'];?></div></td>
          <td ><div align="center"><?php echo $infoclan['ClanName'];?></div></td>
          <td ><div align="center"><?php echo $infoclan['ClanLevel'];?></div></td>
          <td ><div align="center"><?php echo $infoclan['MemberNum'];?></div></td>
          <td ><div align="center"><?php echo $infoclan['ClanGroup'];?></div></td>
          <td ><div align="center"><?php echo $infoclan['ClanLeader'];?></div></td>
 <td>         
      <div><a href="joinclan.php?ClanCode=<?php echo $infoclan['ClanCode'];?>" onclick="return confirm('确定要申请加入吗？')"><i class="glyphicon glyphicon-plus-sign"  style="color: #66ccff;"></i></a></div>    
</td>  
          </tr>
<?php
} 
?>
          
   </table>
  <?php
} 
?> 
<hr>
              <div align="center">
              <div>搜索结果共有&nbsp;<?php echo $infoclannum['total'];?>&nbsp;条，&nbsp;
 每页显示&nbsp;<?php echo $pagesize;?>&nbsp;条。&nbsp;</div>
              <nav>
              <ul class="pagination">
        <?php
$totalclan=$infoclannum['total'];

       if ($totalclan<=$pagesize){
          $pagecount=1;
      } 
      if(($totalclan%$pagesize)!=0){
         $pagecount=intval($totalclan/$pagesize)+1;
      
      }else{
         $pagecount=$totalclan/$pagesize;     
      }
      if((@$_GET['pageclan'])==""){
          $pageclan =1;
      
      }else{
          $pageclan=intval($_GET['pageclan']);
      
      }
      if($pageclan>=2)
      {
      ?>
        <li><a href="search.php?pageclan=1#fenge" class="glyphicon glyphicon-fast-backward" title="首页"></a></li>
        <li><a href="search.php?pageclan=<?php echo $pageclan-1;?>#fenge" class="glyphicon glyphicon-step-backward" title="前一页"></a></li>
        <?php
      }
       if($pagecount<=5){
        for($i=1;$i<=$pagecount;$i++){
      ?>
        <li class="<?php if($i==$pageclan){echo 'active';}?>"><a href="search.php?pageclan=<?php echo $i;?>#fenge" class="glyphicon" style="font-weight:bolder;"><?php echo $i;?></a></li>
        <?php
         }
       }else{
         if($pagecount>$pageclan+5){
       for($i=$pageclan;$i<=$pageclan+5;$i++){   
      ?>
        <li class="<?php if($i==$pageclan){echo 'active';}?>"><a href="search.php?pageclan=<?php echo $i;?>#fenge" class="glyphicon" style="font-weight:bolder;"><?php echo $i;?></a></li>
        <?php } }
    else{
      for($i=$pagecount-4;$i<=$pagecount;$i++){  
      ?>
        <li class="<?php if($i==$pageclan){echo 'active';}?>"><a href="search.php?pageclan=<?php echo $i;?>#fenge" class="glyphicon" style="font-weight:bolder;"><?php echo $i;?></a></li>
  <?php   
      }
    }
    ?>
        <li><a href="search.php?pageclan=<?php echo $page+1;?>#fenge" title="后一页" class="glyphicon glyphicon-step-forward"></a></li> 
        <li><a href="search.php?pageclan=<?php echo $pagecount;?>#fenge" title="尾页" class="glyphicon glyphicon-fast-forward"></a></li>
        <?php }?>
        </ul>
        </nav>

    </div>

    </div>
  </div>
  <hr>

 
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



