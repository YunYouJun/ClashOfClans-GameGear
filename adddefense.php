<?php require_once('Connections/clandata.php'); ?>

<?php
session_start();

mysql_select_db($database_clandata, $clandata);

$sql = mysql_query ( "select * from havedefense where Code='".$_SESSION['MM_Username']."'",$clandata);
$exist = mysql_fetch_array($sql);
if($exist)
{
	$result = mysql_query ( "DELETE FROM havedefense WHERE Code='".$_SESSION['MM_Username']."'",$clandata);
	$insert = mysql_query ( "insert into havedefense (Code,DefenseID,DefenseLevel,DefenseNum) values 
	('".$_SESSION['MM_Username']."','Cannon','".$_POST['Cannon']."','".$_POST['CannonNum']."'),
	('".$_SESSION['MM_Username']."','ArcherTower','".$_POST['ArcherTower']."','".$_POST['ArcherTowerNum']."'),
	('".$_SESSION['MM_Username']."','Mortar','".$_POST['Mortar']."','".$_POST['MortarNum']."'),
	('".$_SESSION['MM_Username']."','Tesla','".$_POST['Tesla']."','".$_POST['TeslaNum']."'),
	('".$_SESSION['MM_Username']."','AirDefense','".$_POST['AirDefense']."','".$_POST['AirDefenseNum']."'),
	('".$_SESSION['MM_Username']."','AirSweeper','".$_POST['AirSweeper']."','".$_POST['AirSweeperNum']."'),
	('".$_SESSION['MM_Username']."','WizardTower','".$_POST['WizardTower']."','".$_POST['WizardTowerNum']."'),
	('".$_SESSION['MM_Username']."','BombTower','".$_POST['BombTower']."','".$_POST['BombTowerNum']."'),
	('".$_SESSION['MM_Username']."','Xbow','".$_POST['Xbow']."','".$_POST['XbowNum']."'),
	('".$_SESSION['MM_Username']."','Inferno','".$_POST['Inferno']."','".$_POST['InfernoNum']."'),
	('".$_SESSION['MM_Username']."','AncientArtillery','".$_POST['AncientArtillery']."','".$_POST['AncientArtilleryNum']."'),
	('".$_SESSION['MM_Username']."','Wall','".$_POST['Wall']."','".$_POST['WallNum']."'),
	('".$_SESSION['MM_Username']."','AirBombs','".$_POST['AirBombs']."','".$_POST['AirBombsNum']."'),
	('".$_SESSION['MM_Username']."','SmallBombs','".$_POST['SmallBombs']."','".$_POST['SmallBombsNum']."'),
	('".$_SESSION['MM_Username']."','GiantBombs','".$_POST['GiantBombs']."','".$_POST['GiantBombsNum']."'),
	('".$_SESSION['MM_Username']."','SkeletonTraps','".$_POST['SkeletonTraps']."','".$_POST['SkeletonTrapsNum']."'),
	('".$_SESSION['MM_Username']."','SeekingAirMines','".$_POST['SeekingAirMines']."','".$_POST['SeekingAirMinesNum']."'),
	('".$_SESSION['MM_Username']."','SpringTraps','".$_POST['SpringTraps']."','".$_POST['SpringTrapsNum']."');
	",$clandata);
}
else{
	$insert = mysql_query ( "insert into havedefense (Code,DefenseID,DefenseLevel,DefenseNum) values 
	('".$_SESSION['MM_Username']."','Cannon','".$_POST['Cannon']."','".$_POST['CannonNum']."'),
	('".$_SESSION['MM_Username']."','ArcherTower','".$_POST['ArcherTower']."','".$_POST['ArcherTowerNum']."'),
	('".$_SESSION['MM_Username']."','Mortar','".$_POST['Mortar']."','".$_POST['MortarNum']."'),
	('".$_SESSION['MM_Username']."','Tesla','".$_POST['Tesla']."','".$_POST['TeslaNum']."'),
	('".$_SESSION['MM_Username']."','AirDefense','".$_POST['AirDefense']."','".$_POST['AirDefenseNum']."'),
	('".$_SESSION['MM_Username']."','AirSweeper','".$_POST['AirSweeper']."','".$_POST['AirSweeperNum']."'),
	('".$_SESSION['MM_Username']."','WizardTower','".$_POST['WizardTower']."','".$_POST['WizardTowerNum']."'),
	('".$_SESSION['MM_Username']."','BombTower','".$_POST['BombTower']."','".$_POST['BombTowerNum']."'),
	('".$_SESSION['MM_Username']."','Xbow','".$_POST['Xbow']."','".$_POST['XbowNum']."'),
	('".$_SESSION['MM_Username']."','Inferno','".$_POST['Inferno']."','".$_POST['InfernoNum']."'),
	('".$_SESSION['MM_Username']."','AncientArtillery','".$_POST['AncientArtillery']."','".$_POST['AncientArtilleryNum']."'),
	('".$_SESSION['MM_Username']."','Wall','".$_POST['Wall']."','".$_POST['WallNum']."'),
	('".$_SESSION['MM_Username']."','AirBombs','".$_POST['AirBombs']."','".$_POST['AirBombsNum']."'),
	('".$_SESSION['MM_Username']."','SmallBombs','".$_POST['SmallBombs']."','".$_POST['SmallBombsNum']."'),
	('".$_SESSION['MM_Username']."','GiantBombs','".$_POST['GiantBombs']."','".$_POST['GiantBombsNum']."'),
	('".$_SESSION['MM_Username']."','SkeletonTraps','".$_POST['SkeletonTraps']."','".$_POST['SkeletonTrapsNum']."'),
	('".$_SESSION['MM_Username']."','SeekingAirMines','".$_POST['SeekingAirMines']."','".$_POST['SeekingAirMinesNum']."'),
	('".$_SESSION['MM_Username']."','SpringTraps','".$_POST['SpringTraps']."','".$_POST['SpringTrapsNum']."');
	",$clandata);

}
echo "<script>window.history.back();</script>";
?>
