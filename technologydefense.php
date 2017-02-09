<?php require_once('Connections/clandata.php');?>
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
 header("Location:".$fromurl); exit;
 }
 
 
$Code=$_GET['Code']; 
mysql_select_db($database_clandata, $clandata);
$sqlmember = mysql_query ( "select * from clanmember where Code='".$Code."'",$clandata);
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
<?php
$sqlexist1 = mysql_query ( "select * from havetechnology where Code='".$Code."'",$clandata);
$sqlexist2 = mysql_query ( "select * from havedefense where Code='".$Code."'",$clandata);
$infoexist1 = mysql_fetch_array($sqlexist1);
$infoexist2 = mysql_fetch_array($sqlexist2);

$sqlBar = mysql_query ( "select * from havetechnology where Code='".$Code."' and TechnologyID='Bar'",$clandata);
$infoBar = mysql_fetch_array($sqlBar);
$sqlArc = mysql_query ( "select * from havetechnology where Code='".$Code."' and TechnologyID='Arc'",$clandata);
$infoArc = mysql_fetch_array($sqlArc);
$sqlArcQueen = mysql_query ( "select * from havetechnology where Code='".$Code."' and TechnologyID='ArcQueen'",$clandata);
$infoArcQueen = mysql_fetch_array($sqlArcQueen);
$sqlBabyDragon = mysql_query ( "select * from havetechnology where Code='".$Code."' and TechnologyID='BabyDragon'",$clandata);
$infoBabyDragon = mysql_fetch_array($sqlBabyDragon);
$sqlBalloon = mysql_query ( "select * from havetechnology where Code='".$Code."' and TechnologyID='Balloon'",$clandata);
$infoBalloon = mysql_fetch_array($sqlBalloon);
$sqlBarKing = mysql_query ( "select * from havetechnology where Code='".$Code."' and TechnologyID='BarKing'",$clandata);
$infoBarKing = mysql_fetch_array($sqlBarKing);
$sqlBowler = mysql_query ( "select * from havetechnology where Code='".$Code."' and TechnologyID='Bowler'",$clandata);
$infoBowler = mysql_fetch_array($sqlBowler);
$sqlClone = mysql_query ( "select * from havetechnology where Code='".$Code."' and TechnologyID='Clone'",$clandata);
$infoClone = mysql_fetch_array($sqlClone);
$sqlDragon = mysql_query ( "select * from havetechnology where Code='".$Code."' and TechnologyID='Dragon'",$clandata);
$infoDragon = mysql_fetch_array($sqlDragon);
$sqlEarthQuake = mysql_query ( "select * from havetechnology where Code='".$Code."' and TechnologyID='EarthQuake'",$clandata);
$infoEarthQuake = mysql_fetch_array($sqlEarthQuake);
$sqlGiant = mysql_query ( "select * from havetechnology where Code='".$Code."' and TechnologyID='Giant'",$clandata);
$infoGiant = mysql_fetch_array($sqlGiant);
$sqlGoblin = mysql_query ( "select * from havetechnology where Code='".$Code."' and TechnologyID='Goblin'",$clandata);
$infoGoblin = mysql_fetch_array($sqlGoblin);
$sqlGolem = mysql_query ( "select * from havetechnology where Code='".$Code."' and TechnologyID='Golem'",$clandata);
$infoGolem = mysql_fetch_array($sqlGolem);
$sqlGrandWarden = mysql_query ( "select * from havetechnology where Code='".$Code."' and TechnologyID='GrandWarden'",$clandata);
$infoGrandWarden = mysql_fetch_array($sqlGrandWarden);
$sqlFreeze = mysql_query ( "select * from havetechnology where Code='".$Code."' and TechnologyID='Freeze'",$clandata);
$infoFreeze = mysql_fetch_array($sqlFreeze);
$sqlHaste = mysql_query ( "select * from havetechnology where Code='".$Code."' and TechnologyID='Haste'",$clandata);
$infoHaste = mysql_fetch_array($sqlHaste);
$sqlHealer = mysql_query ( "select * from havetechnology where Code='".$Code."' and TechnologyID='Healer'",$clandata);
$infoHealer = mysql_fetch_array($sqlHealer);
$sqlHealing = mysql_query ( "select * from havetechnology where Code='".$Code."' and TechnologyID='Healing'",$clandata);
$infoHealing = mysql_fetch_array($sqlHealing);
$sqlHogRider = mysql_query ( "select * from havetechnology where Code='".$Code."' and TechnologyID='HogRider'",$clandata);
$infoHogRider = mysql_fetch_array($sqlHogRider);
$sqlJump = mysql_query ( "select * from havetechnology where Code='".$Code."' and TechnologyID='Jump'",$clandata);
$infoJump = mysql_fetch_array($sqlJump);
$sqlLavaHound = mysql_query ( "select * from havetechnology where Code='".$Code."' and TechnologyID='LavaHound'",$clandata);
$infoLavaHound = mysql_fetch_array($sqlLavaHound);
$sqlLightning = mysql_query ( "select * from havetechnology where Code='".$Code."' and TechnologyID='Lightning'",$clandata);
$infoLightning = mysql_fetch_array($sqlLightning);
$sqlMiner = mysql_query ( "select * from havetechnology where Code='".$Code."' and TechnologyID='Miner'",$clandata);
$infoMiner = mysql_fetch_array($sqlMiner);
$sqlMinion = mysql_query ( "select * from havetechnology where Code='".$Code."' and TechnologyID='Minion'",$clandata);
$infoMinion = mysql_fetch_array($sqlMinion);
$sqlPekka = mysql_query ( "select * from havetechnology where Code='".$Code."' and TechnologyID='Pekka'",$clandata);
$infoPekka = mysql_fetch_array($sqlPekka);
$sqlPoison = mysql_query ( "select * from havetechnology where Code='".$Code."' and TechnologyID='Poison'",$clandata);
$infoPoison = mysql_fetch_array($sqlPoison);
$sqlRage = mysql_query ( "select * from havetechnology where Code='".$Code."' and TechnologyID='Rage'",$clandata);
$infoRage = mysql_fetch_array($sqlRage);
$sqlSkeleton = mysql_query ( "select * from havetechnology where Code='".$Code."' and TechnologyID='Skeleton'",$clandata);
$infoSkeleton = mysql_fetch_array($sqlSkeleton);
$sqlValkyrie = mysql_query ( "select * from havetechnology where Code='".$Code."' and TechnologyID='Valkyrie'",$clandata);
$infoValkyrie = mysql_fetch_array($sqlValkyrie);
$sqlWallBreaker = mysql_query ( "select * from havetechnology where Code='".$Code."' and TechnologyID='WallBreaker'",$clandata);
$infoWallBreaker = mysql_fetch_array($sqlWallBreaker);
$sqlWitch = mysql_query ( "select * from havetechnology where Code='".$Code."' and TechnologyID='Witch'",$clandata);
$infoWitch = mysql_fetch_array($sqlWitch);
$sqlWizard = mysql_query ( "select * from havetechnology where Code='".$Code."' and TechnologyID='Wizard'",$clandata);
$infoWizard = mysql_fetch_array($sqlWizard);

$sqlCannon = mysql_query ( "select * from havedefense where Code='".$Code."' and DefenseID='Cannon'",$clandata);
$infoCannon = mysql_fetch_array($sqlCannon);
$sqlAirBombs = mysql_query ( "select * from havedefense where Code='".$Code."' and DefenseID='AirBombs'",$clandata);
$infoAirBombs = mysql_fetch_array($sqlAirBombs);
$sqlAirDefense = mysql_query ( "select * from havedefense where Code='".$Code."' and DefenseID='AirDefense'",$clandata);
$infoAirDefense = mysql_fetch_array($sqlAirDefense);
$sqlAirSweeper = mysql_query ( "select * from havedefense where Code='".$Code."' and DefenseID='AirSweeper'",$clandata);
$infoAirSweeper = mysql_fetch_array($sqlAirSweeper);
$sqlAncientArtillery = mysql_query ( "select * from havedefense where Code='".$Code."' and DefenseID='AncientArtillery'",$clandata);
$infoAncientArtillery = mysql_fetch_array($sqlAncientArtillery);
$sqlArcherTower = mysql_query ( "select * from havedefense where Code='".$Code."' and DefenseID='ArcherTower'",$clandata);
$infoArcherTower = mysql_fetch_array($sqlArcherTower);
$sqlBombTower = mysql_query ( "select * from havedefense where Code='".$Code."' and DefenseID='BombTower'",$clandata);
$infoBombTower = mysql_fetch_array($sqlBombTower);
$sqlGiantBombs = mysql_query ( "select * from havedefense where Code='".$Code."' and DefenseID='GiantBombs'",$clandata);
$infoGiantBombs = mysql_fetch_array($sqlGiantBombs);
$sqlInferno = mysql_query ( "select * from havedefense where Code='".$Code."' and DefenseID='Inferno'",$clandata);
$infoInferno = mysql_fetch_array($sqlInferno);
$sqlMortar = mysql_query ( "select * from havedefense where Code='".$Code."' and DefenseID='Mortar'",$clandata);
$infoMortar = mysql_fetch_array($sqlMortar);
$sqlSeekingAirMines = mysql_query ( "select * from havedefense where Code='".$Code."' and DefenseID='SeekingAirMines'",$clandata);
$infoSeekingAirMines = mysql_fetch_array($sqlSeekingAirMines);
$sqlSkeletonTraps = mysql_query ( "select * from havedefense where Code='".$Code."' and DefenseID='SkeletonTraps'",$clandata);
$infoSkeletonTraps = mysql_fetch_array($sqlSkeletonTraps);
$sqlSmallBombs = mysql_query ( "select * from havedefense where Code='".$Code."' and DefenseID='SmallBombs'",$clandata);
$infoSmallBombs = mysql_fetch_array($sqlSmallBombs);
$sqlSpringTraps = mysql_query ( "select * from havedefense where Code='".$Code."' and DefenseID='SpringTraps'",$clandata);
$infoSpringTraps = mysql_fetch_array($sqlSpringTraps);
$sqlTesla = mysql_query ( "select * from havedefense where Code='".$Code."' and DefenseID='Tesla'",$clandata);
$infoTesla = mysql_fetch_array($sqlTesla);
$sqlWall = mysql_query ( "select * from havedefense where Code='".$Code."' and DefenseID='Wall'",$clandata);
$infoWall = mysql_fetch_array($sqlWall);
$sqlWizardTower = mysql_query ( "select * from havedefense where Code='".$Code."' and DefenseID='WizardTower'",$clandata);
$infoWizardTower = mysql_fetch_array($sqlWizardTower);
$sqlXbow = mysql_query ( "select * from havedefense where Code='".$Code."' and DefenseID='Xbow'",$clandata);
$infoXbow = mysql_fetch_array($sqlXbow);

?>
<script type="text/javascript" language="javascript">   

function ready(){
document.getElementById("clanmember").classList.add('active');

}
</script>

</head>

<body onLoad="ready()">


<?php
include("navbar.php");
?>
        
        <!-- section start -->
		<!-- ================ -->
			<div class="container">
           
            <div class="row yunyouback" data-animation-effect="fadeIn" > 
				<h1 class="text-center title">科技/防御信息/匹配值</h1>
                <h5 class="text-center title"><?php echo $infomember['VillageName'];?></h5>
					<div class="col-md-12" data-filter-group="technology">

						<!-- isotope filters start -->
						<div id="technologyfilter" class="filters center-block text-center" >
							<ul class="nav nav-tabs nav-justified navbar-inverse filter-option"  style="opacity:0.8;" >
								<li><a href="#" data-filter=".Elixir, .DarkElixir,.Spell">所有科技</a></li>
								<li><a href="#" data-filter=".Elixir">圣水兵种</a></li>
								<li><a href="#" data-filter=".DarkElixir">黑水兵种与三王</a></li>
								<li><a href="#" data-filter=".Spell">法术</a></li>
                                <li><a href="#" data-filter=".DefenseBuilding,.DefenseTrap">所有防御</a></li>
								<li><a href="#" data-filter=".DefenseBuilding">防御建筑</a></li>
								<li><a href="#" data-filter=".DefenseTrap">防御陷阱</a></li>
								<li><a href="#" data-filter=".DefenseMatch">防御匹配值</a></li>
							</ul>
						</div>
                        <br>
        
						<!-- isotope filters end -->


  <?php if($infoexist1){
	  ?>
          
						<!-- portfolio items start -->
						<div id="technologyfilter" class="isotope-container row grid-space-20">

              
              <div class="col-sm-4 col-md-2 isotope-item  Elixir">       
              <label class="control-label" style="font-family:Supercell-Magic_5;" data-hide-disabled="true" data-live-search="true">野蛮人：<?php echo $infoBar['TechnologyLevel'];?>&nbsp;级</label>
					</div>
                    
                           <div class="col-sm-4 col-md-2 isotope-item  Elixir">       
              <label class="control-label" style="font-family:Supercell-Magic_5;" data-hide-disabled="true" data-live-search="true">弓箭手：<?php echo $infoArc['TechnologyLevel'];?>&nbsp;级</label>
					</div>
                    
                    <div class="col-sm-4 col-md-2 isotope-item  Elixir">       
              <label class="control-label" style="font-family:Supercell-Magic_5;" data-hide-disabled="true" data-live-search="true">巨人：<?php echo $infoGiant['TechnologyLevel'];?>&nbsp;级</label>
					</div>
                    
                    <div class="col-sm-4 col-md-2 isotope-item  Elixir">       
              <label class="control-label" style="font-family:Supercell-Magic_5;" data-hide-disabled="true" data-live-search="true">哥布林：<?php echo $infoGoblin['TechnologyLevel'];?>&nbsp;级</label>
					</div>
                    
                    <div class="col-sm-4 col-md-2 isotope-item  Elixir">       
              <label class="control-label" style="font-family:Supercell-Magic_5;" data-hide-disabled="true" data-live-search="true">炸弹人：<?php echo $infoWallBreaker['TechnologyLevel'];?>&nbsp;级</label>
					</div>
                    
                    <div class="col-sm-4 col-md-2 isotope-item  Elixir">       
              <label class="control-label" style="font-family:Supercell-Magic_5;" data-hide-disabled="true" data-live-search="true">气球兵：<?php echo $infoBalloon['TechnologyLevel'];?>&nbsp;级</label>
					</div>
                    
                    <div class="col-sm-4 col-md-2 isotope-item  Elixir">       
              <label class="control-label" style="font-family:Supercell-Magic_5;" data-hide-disabled="true" data-live-search="true">法师：<?php echo $infoWizard['TechnologyLevel'];?>&nbsp;级</label>
					</div>
                    
                    <div class="col-sm-4 col-md-2 isotope-item  Elixir">       
              <label class="control-label" style="font-family:Supercell-Magic_5;" data-hide-disabled="true" data-live-search="true">天使：<?php echo $infoHealer['TechnologyLevel'];?>&nbsp;级</label>
					</div>
                    
                    <div class="col-sm-4 col-md-2 isotope-item  Elixir">       
              <label class="control-label" style="font-family:Supercell-Magic_5;" data-hide-disabled="true" data-live-search="true">龙：<?php echo $infoDragon['TechnologyLevel'];?>&nbsp;级</label>
					</div>
                    
                    <div class="col-sm-4 col-md-2 isotope-item  Elixir">       
              <label class="control-label" style="font-family:Supercell-Magic_5;" data-hide-disabled="true" data-live-search="true">皮卡超人：<?php echo $infoPekka['TechnologyLevel'];?>&nbsp;级</label>
					</div>
                    
                    <div class="col-sm-4 col-md-2 isotope-item  Elixir">       
              <label class="control-label" style="font-family:Supercell-Magic_5;" data-hide-disabled="true" data-live-search="true">龙宝宝：<?php echo $infoBabyDragon['TechnologyLevel'];?>&nbsp;级</label>
					</div>
                    
                    <div class="col-sm-4 col-md-2 isotope-item  Elixir">       
              <label class="control-label" style="font-family:Supercell-Magic_5;" data-hide-disabled="true" data-live-search="true">掘地矿工：<?php echo $infoMiner['TechnologyLevel'];?>&nbsp;级</label>
					</div>
                    
                    <div class="col-sm-4 col-md-2 isotope-item  Spell">       
              <label class="control-label" style="font-family:Supercell-Magic_5;" data-hide-disabled="true" data-live-search="true">闪电法术：<?php echo $infoLightning['TechnologyLevel'];?>&nbsp;级</label>
					</div>
                    
                    <div class="col-sm-4 col-md-2 isotope-item  Spell">       
              <label class="control-label" style="font-family:Supercell-Magic_5;" data-hide-disabled="true" data-live-search="true">治疗法术：<?php echo $infoHealing['TechnologyLevel'];?>&nbsp;级</label>
					</div>
                    
                    <div class="col-sm-4 col-md-2 isotope-item  Spell">       
              <label class="control-label" style="font-family:Supercell-Magic_5;" data-hide-disabled="true" data-live-search="true">狂暴法术：<?php echo $infoRage['TechnologyLevel'];?>&nbsp;级</label>
					</div>
                    
                    <div class="col-sm-4 col-md-2 isotope-item  Spell">       
              <label class="control-label" style="font-family:Supercell-Magic_5;" data-hide-disabled="true" data-live-search="true">弹跳法术：<?php echo $infoJump['TechnologyLevel'];?>&nbsp;级</label>
					</div>
                    
                    <div class="col-sm-4 col-md-2 isotope-item  Spell">       
              <label class="control-label" style="font-family:Supercell-Magic_5;" data-hide-disabled="true" data-live-search="true">冰霜法术：<?php echo $infoFreeze['TechnologyLevel'];?>&nbsp;级</label>
					</div>
                    
                    <div class="col-sm-4 col-md-2 isotope-item  Spell">       
              <label class="control-label" style="font-family:Supercell-Magic_5;" data-hide-disabled="true" data-live-search="true">镜像法术：<?php echo $infoClone['TechnologyLevel'];?>&nbsp;级</label>
					</div>
                    
                    <div class="col-sm-4 col-md-2 isotope-item  Spell">       
              <label class="control-label" style="font-family:Supercell-Magic_5;" data-hide-disabled="true" data-live-search="true">毒药法术：<?php echo $infoPoison['TechnologyLevel'];?>&nbsp;级</label>
					</div>
                    
                    <div class="col-sm-4 col-md-2 isotope-item  Spell">       
              <label class="control-label" style="font-family:Supercell-Magic_5;" data-hide-disabled="true" data-live-search="true">地震法术：<?php echo $infoEarthQuake['TechnologyLevel'];?>&nbsp;级</label>
					</div>
                    
                    <div class="col-sm-4 col-md-2 isotope-item  Spell">       
              <label class="control-label" style="font-family:Supercell-Magic_5;" data-hide-disabled="true" data-live-search="true">急速法术：<?php echo $infoHaste['TechnologyLevel'];?>&nbsp;级</label>
					</div>
                    
                    <div class="col-sm-4 col-md-2 isotope-item  Spell">       
              <label class="control-label" style="font-family:Supercell-Magic_5;" data-hide-disabled="true" data-live-search="true">骷髅法术：<?php echo $infoSkeleton['TechnologyLevel'];?>&nbsp;级</label>
					</div>
                    
                    <div class="col-sm-4 col-md-2 isotope-item  DarkElixir">       
              <label class="control-label" style="font-family:Supercell-Magic_5;" data-hide-disabled="true" data-live-search="true">亡灵：<?php echo $infoMinion['TechnologyLevel'];?>&nbsp;级</label>
					</div>
                    
                    <div class="col-sm-4 col-md-2 isotope-item  DarkElixir">       
              <label class="control-label" style="font-family:Supercell-Magic_5;" data-hide-disabled="true" data-live-search="true">亡灵：<?php echo $infoMinion['TechnologyLevel'];?>&nbsp;级</label>
					</div>
                    
                    <div class="col-sm-4 col-md-2 isotope-item  DarkElixir">       
              <label class="control-label" style="font-family:Supercell-Magic_5;" data-hide-disabled="true" data-live-search="true">野猪骑士：<?php echo $infoHogRider['TechnologyLevel'];?>&nbsp;级</label>
					</div>
                    
                    <div class="col-sm-4 col-md-2 isotope-item  DarkElixir">       
              <label class="control-label" style="font-family:Supercell-Magic_5;" data-hide-disabled="true" data-live-search="true">瓦里基女武神：<?php echo $infoValkyrie['TechnologyLevel'];?>&nbsp;级</label>
					</div>
                    
                    <div class="col-sm-4 col-md-2 isotope-item  DarkElixir">       
              <label class="control-label" style="font-family:Supercell-Magic_5;" data-hide-disabled="true" data-live-search="true">石头人：<?php echo $infoGolem['TechnologyLevel'];?>&nbsp;级</label>
					</div>
                    
                    <div class="col-sm-4 col-md-2 isotope-item  DarkElixir">       
              <label class="control-label" style="font-family:Supercell-Magic_5;" data-hide-disabled="true" data-live-search="true">女巫：<?php echo $infoWitch['TechnologyLevel'];?>&nbsp;级</label>
					</div>
                    
                    <div class="col-sm-4 col-md-2 isotope-item  DarkElixir">       
              <label class="control-label" style="font-family:Supercell-Magic_5;" data-hide-disabled="true" data-live-search="true">熔岩猎犬：<?php echo $infoLavaHound['TechnologyLevel'];?>&nbsp;级</label>
					</div>
                    
                    <div class="col-sm-4 col-md-2 isotope-item  DarkElixir">       
              <label class="control-label" style="font-family:Supercell-Magic_5;" data-hide-disabled="true" data-live-search="true">巨石投手：<?php echo $infoBowler['TechnologyLevel'];?>&nbsp;级</label>
					</div>

					<div class="col-sm-4 col-md-2 isotope-item  DarkElixir">       
              <label class="control-label" style="font-family:Supercell-Magic_5;" data-hide-disabled="true" data-live-search="true">野蛮人之王：<?php echo $infoBarKing['TechnologyLevel'];?>&nbsp;级</label>
					</div>

					<div class="col-sm-4 col-md-2 isotope-item  DarkElixir">       
              <label class="control-label" style="font-family:Supercell-Magic_5;" data-hide-disabled="true" data-live-search="true">弓箭女皇：<?php echo $infoArcQueen['TechnologyLevel'];?>&nbsp;级</label>
					</div>

					<div class="col-sm-4 col-md-2 isotope-item  DarkElixir">       
              <label class="control-label" style="font-family:Supercell-Magic_5;" data-hide-disabled="true" data-live-search="true">大守护者：<?php echo $infoGrandWarden['TechnologyLevel'];?>&nbsp;级</label>
					</div>

            </div>
            <?php
  }else{
	  ?>
      <h3 class="text-center title">该位成员尚未登记科技信息。</h3>
      <?php
  }if($infoexist2){
  ?>
            
            <div id="defensefilter" class="isotope-container row grid-space-20" >

                       <div class="col-sm-4 col-md-2 isotope-item  DefenseBuilding">       
              <label class="control-label" style="font-family:Supercell-Magic_5;" data-hide-disabled="true" data-live-search="true">加农炮<?php echo $infoCannon['DefenseLevel'];?>&nbsp;级：<?php echo $infoCannon['DefenseNum'];?>&nbsp;个</label>
			           </div> 
                       
                        <div class="col-sm-4 col-md-2 isotope-item  DefenseBuilding">       
              <label class="control-label" style="font-family:Supercell-Magic_5;" data-hide-disabled="true" data-live-search="true">箭塔<?php echo $infoArcherTower['DefenseLevel'];?>&nbsp;级：<?php echo $infoArcherTower['DefenseNum'];?>&nbsp;个</label>
			           </div>
                       
                       <div class="col-sm-4 col-md-2 isotope-item  DefenseBuilding">       
              <label class="control-label" style="font-family:Supercell-Magic_5;" data-hide-disabled="true" data-live-search="true">迫击炮<?php echo $infoMortar['DefenseLevel'];?>&nbsp;级：<?php echo $infoMortar['DefenseNum'];?>&nbsp;个</label>
			           </div>
                       
                       <div class="col-sm-4 col-md-2 isotope-item  DefenseBuilding">       
              <label class="control-label" style="font-family:Supercell-Magic_5;" data-hide-disabled="true" data-live-search="true">空气炮<?php echo $infoAirSweeper['DefenseLevel'];?>&nbsp;级：<?php echo $infoAirSweeper['DefenseNum'];?>&nbsp;个</label>
			           </div>
                       
                       <div class="col-sm-4 col-md-2 isotope-item  DefenseBuilding">       
              <label class="control-label" style="font-family:Supercell-Magic_5;" data-hide-disabled="true" data-live-search="true">防空火箭<?php echo $infoAirDefense['DefenseLevel'];?>&nbsp;级：<?php echo $infoAirDefense['DefenseNum'];?>&nbsp;个</label>
			           </div>
                       
                       <div class="col-sm-4 col-md-2 isotope-item  DefenseBuilding">       
              <label class="control-label" style="font-family:Supercell-Magic_5;" data-hide-disabled="true" data-live-search="true">天鹰火炮<?php echo $infoAncientArtillery['DefenseLevel'];?>&nbsp;级：<?php echo $infoAncientArtillery['DefenseNum'];?>&nbsp;个</label>
			           </div>
                       
                       <div class="col-sm-4 col-md-2 isotope-item  DefenseBuilding">       
              <label class="control-label" style="font-family:Supercell-Magic_5;" data-hide-disabled="true" data-live-search="true">地狱塔<?php echo $infoInferno['DefenseLevel'];?>&nbsp;级：<?php echo $infoInferno['DefenseNum'];?>&nbsp;个</label>
			           </div>
                       
                       <div class="col-sm-4 col-md-2 isotope-item  DefenseBuilding">       
              <label class="control-label" style="font-family:Supercell-Magic_5;" data-hide-disabled="true" data-live-search="true">特斯拉电磁塔<?php echo $infoTesla['DefenseLevel'];?>&nbsp;级：<?php echo $infoTesla['DefenseNum'];?>&nbsp;个</label>
			           </div>
                       
                       <div class="col-sm-4 col-md-2 isotope-item  DefenseBuilding">       
              <label class="control-label" style="font-family:Supercell-Magic_5;" data-hide-disabled="true" data-live-search="true">城墙<?php echo $infoWall['DefenseLevel'];?>&nbsp;级：<?php echo $infoWall['DefenseNum'];?>&nbsp;个</label>
			           </div>
                       
                       <div class="col-sm-4 col-md-2 isotope-item  DefenseBuilding">       
              <label class="control-label" style="font-family:Supercell-Magic_5;" data-hide-disabled="true" data-live-search="true">法师塔<?php echo $infoWizardTower['DefenseLevel'];?>&nbsp;级：<?php echo $infoWizardTower['DefenseNum'];?>&nbsp;个</label>
			           </div>
                       
                       <div class="col-sm-4 col-md-2 isotope-item  DefenseBuilding">       
              <label class="control-label" style="font-family:Supercell-Magic_5;" data-hide-disabled="true" data-live-search="true">X连弩<?php echo $infoXbow['DefenseLevel'];?>&nbsp;级：<?php echo $infoXbow['DefenseNum'];?>&nbsp;个</label>
			           </div>
                       
                       <div class="col-sm-4 col-md-2 isotope-item  DefenseTrap">       
              <label class="control-label" style="font-family:Supercell-Magic_5;" data-hide-disabled="true" data-live-search="true">空中炸弹<?php echo $infoAirBombs['DefenseLevel'];?>&nbsp;级：<?php echo $infoAirBombs['DefenseNum'];?>&nbsp;个</label>
			           </div>
                       
                       <div class="col-sm-4 col-md-2 isotope-item  DefenseTrap">       
              <label class="control-label" style="font-family:Supercell-Magic_5;" data-hide-disabled="true" data-live-search="true">巨型炸弹<?php echo $infoGiantBombs['DefenseLevel'];?>&nbsp;级：<?php echo $infoGiantBombs['DefenseNum'];?>&nbsp;个</label>
			           </div>
                       
                       <div class="col-sm-4 col-md-2 isotope-item  DefenseTrap">       
              <label class="control-label" style="font-family:Supercell-Magic_5;" data-hide-disabled="true" data-live-search="true">搜空炸弹<?php echo $infoSeekingAirMines['DefenseLevel'];?>&nbsp;级：<?php echo $infoSeekingAirMines['DefenseNum'];?>&nbsp;个</label>
			           </div>
                       
                       <div class="col-sm-4 col-md-2 isotope-item  DefenseTrap">       
              <label class="control-label" style="font-family:Supercell-Magic_5;" data-hide-disabled="true" data-live-search="true">骷髅陷阱<?php echo $infoSkeletonTraps['DefenseLevel'];?>&nbsp;级：<?php echo $infoSkeletonTraps['DefenseNum'];?>&nbsp;个</label>
			           </div>
                       
                       <div class="col-sm-4 col-md-2 isotope-item  DefenseTrap">       
              <label class="control-label" style="font-family:Supercell-Magic_5;" data-hide-disabled="true" data-live-search="true">小型炸弹<?php echo $infoSmallBombs['DefenseLevel'];?>&nbsp;级：<?php echo $infoSmallBombs['DefenseNum'];?>&nbsp;个</label>
			           </div>
                       
                       <div class="col-sm-4 col-md-2 isotope-item  DefenseTrap">       
              <label class="control-label" style="font-family:Supercell-Magic_5;" data-hide-disabled="true" data-live-search="true">隐形弹簧<?php echo $infoSpringTraps['DefenseLevel'];?>&nbsp;级：<?php echo $infoSpringTraps['DefenseNum'];?>&nbsp;个</label>
			           </div>

			           <?php
$matchdata=0;
mysql_select_db($database_clandata, $clandata);
$memberdefense = mysql_query ( "select * from havedefense where Code='".$Code."'",$clandata);

while($infodefense = mysql_fetch_array($memberdefense))
{
	$defensematch = mysql_query ( "select * from rawdata where lookup='".$infodefense['DefenseID'].$infodefense['DefenseLevel']."'",$clandata);
	$infomatch = mysql_fetch_array($defensematch);
	$matchdata=$matchdata+$infomatch['weight']*$infodefense['DefenseNum'];
}
?>
       <div class="col-md-12 text-center isotope-item  DefenseMatch">       
              <label class="control-label" style="font-family:Supercell-Magic_5;" data-hide-disabled="true" data-live-search="true">防御匹配值:&nbsp;<?php echo $matchdata;?>&nbsp;</label>
			           </div>

					</div>	
                    <?php
  }else{
  ?>
  <h3 class="text-center title">该位成员尚未登记防御信息。</h3>
  <?php
  }
  ?>


						</div>
					</div>
				</div>
		<!-- section end -->
<br>
<div class="container">
            <div class="row yunyouback" data-animation-effect="fadeIn" > 
				<h1 class="text-center title">基本信息</h1>
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
          <th ><div align="center">匹配值</div></th>
          <th ><div align="center">所属部落</div></th>
          </tr>
          <?php  
            $sqlmember=mysql_query("select * from clanmember where Code='".$Code."'",$clandata);
			$infomember=mysql_fetch_array($sqlmember);
		  ?>
        <tr style="font-family:'Supercell-Magic_5';FONT-WEIGHT:bold;">

          <td height="30"><div align="center"><?php echo $infomember['Code'];?></div></td>
          <td ><div align="center" ><a href="clanmemberinfo.php?ClanCode=<?php echo $infomember['Code'];?>" style="font-weight:bold;"><?php echo $infomember['VillageName'];?></a></div></td>
          <td ><div align="center"><?php if($infomember['ClanCode']!=""){
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
          <td ><div align="center"><?php if($infomember['ClanCode']!=""){ echo $infomember['ClanCode'];}else echo "无";?></div></div></td>       
          </tr>
   </table>
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