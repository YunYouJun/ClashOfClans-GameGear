<?php require_once('Connections/clandata.php'); ?>

<?php
session_start();

mysql_select_db($database_clandata, $clandata);

$sql = mysql_query ( "select * from havetechnology where Code='".$_SESSION['MM_Username']."'",$clandata);
$exist = mysql_fetch_array($sql);
if($exist)
{
	$result = mysql_query ( "DELETE FROM havetechnology WHERE Code='".$_SESSION['MM_Username']."'",$clandata);
	$insert = mysql_query ( "insert into havetechnology (Code,TechnologyID,TechnologyLevel) values 
	('".$_SESSION['MM_Username']."','Bar','".$_POST['Bar']."'),
	('".$_SESSION['MM_Username']."','Arc','".$_POST['Arc']."'),
	('".$_SESSION['MM_Username']."','Giant','".$_POST['Giant']."'),
	('".$_SESSION['MM_Username']."','Goblin','".$_POST['Goblin']."'),
	('".$_SESSION['MM_Username']."','WallBreaker','".$_POST['WallBreaker']."'),
	('".$_SESSION['MM_Username']."','Balloon','".$_POST['Balloon']."'),
	('".$_SESSION['MM_Username']."','Wizard','".$_POST['Wizard']."'),
	('".$_SESSION['MM_Username']."','Healer','".$_POST['Healer']."'),
	('".$_SESSION['MM_Username']."','Dragon','".$_POST['Dragon']."'),
	('".$_SESSION['MM_Username']."','Pekka','".$_POST['Pekka']."'),
	('".$_SESSION['MM_Username']."','BabyDragon','".$_POST['BabyDragon']."'),
	('".$_SESSION['MM_Username']."','Miner','".$_POST['Miner']."'),
	('".$_SESSION['MM_Username']."','Minion','".$_POST['Minion']."'),
	('".$_SESSION['MM_Username']."','HogRider','".$_POST['HogRider']."'),
	('".$_SESSION['MM_Username']."','Valkyrie','".$_POST['Valkyrie']."'),
	('".$_SESSION['MM_Username']."','Golem','".$_POST['Golem']."'),
	('".$_SESSION['MM_Username']."','Witch','".$_POST['Witch']."'),
	('".$_SESSION['MM_Username']."','LavaHound','".$_POST['LavaHound']."'),
	('".$_SESSION['MM_Username']."','Bowler','".$_POST['Bowler']."'),
	('".$_SESSION['MM_Username']."','Lightning','".$_POST['Lightning']."'),
	('".$_SESSION['MM_Username']."','Healing','".$_POST['Healing']."'),
	('".$_SESSION['MM_Username']."','Rage','".$_POST['Rage']."'),
	('".$_SESSION['MM_Username']."','Jump','".$_POST['Jump']."'),
	('".$_SESSION['MM_Username']."','Freeze','".$_POST['Freeze']."'),
	('".$_SESSION['MM_Username']."','Clone','".$_POST['Clone']."'),
	('".$_SESSION['MM_Username']."','Poison','".$_POST['Poison']."'),
	('".$_SESSION['MM_Username']."','EarthQuake','".$_POST['EarthQuake']."'),
	('".$_SESSION['MM_Username']."','Haste','".$_POST['Haste']."'),
	('".$_SESSION['MM_Username']."','Skeleton','".$_POST['Skeleton']."'),
	('".$_SESSION['MM_Username']."','BarKing','".$_POST['BarKing']."'),
	('".$_SESSION['MM_Username']."','ArcQueen','".$_POST['ArcQueen']."'),
	('".$_SESSION['MM_Username']."','GrandWarden','".$_POST['GrandWarden']."');
	",$clandata);
}
else{
	$insert = mysql_query ( "insert into havetechnology (Code,TechnologyID,TechnologyLevel) values 
	('".$_SESSION['MM_Username']."','Bar','".$_POST['Bar']."'),
	('".$_SESSION['MM_Username']."','Arc','".$_POST['Arc']."'),
	('".$_SESSION['MM_Username']."','Giant','".$_POST['Giant']."'),
	('".$_SESSION['MM_Username']."','Goblin','".$_POST['Goblin']."'),
	('".$_SESSION['MM_Username']."','WallBreaker','".$_POST['WallBreaker']."'),
	('".$_SESSION['MM_Username']."','Balloon','".$_POST['Balloon']."'),
	('".$_SESSION['MM_Username']."','Wizard','".$_POST['Wizard']."'),
	('".$_SESSION['MM_Username']."','Healer','".$_POST['Healer']."'),
	('".$_SESSION['MM_Username']."','Dragon','".$_POST['Dragon']."'),
	('".$_SESSION['MM_Username']."','Pekka','".$_POST['Pekka']."'),
	('".$_SESSION['MM_Username']."','BabyDragon','".$_POST['BabyDragon']."'),
	('".$_SESSION['MM_Username']."','Miner','".$_POST['Miner']."'),
	('".$_SESSION['MM_Username']."','Minion','".$_POST['Minion']."'),
	('".$_SESSION['MM_Username']."','HogRider','".$_POST['HogRider']."'),
	('".$_SESSION['MM_Username']."','Valkyrie','".$_POST['Valkyrie']."'),
	('".$_SESSION['MM_Username']."','Golem','".$_POST['Golem']."'),
	('".$_SESSION['MM_Username']."','Witch','".$_POST['Witch']."'),
	('".$_SESSION['MM_Username']."','LavaHound','".$_POST['LavaHound']."'),
	('".$_SESSION['MM_Username']."','Bowler','".$_POST['Bowler']."'),
	('".$_SESSION['MM_Username']."','Lightning','".$_POST['Lightning']."'),
	('".$_SESSION['MM_Username']."','Healing','".$_POST['Healing']."'),
	('".$_SESSION['MM_Username']."','Rage','".$_POST['Rage']."'),
	('".$_SESSION['MM_Username']."','Jump','".$_POST['Jump']."'),
	('".$_SESSION['MM_Username']."','Freeze','".$_POST['Freeze']."'),
	('".$_SESSION['MM_Username']."','Clone','".$_POST['Clone']."'),
	('".$_SESSION['MM_Username']."','Poison','".$_POST['Poison']."'),
	('".$_SESSION['MM_Username']."','EarthQuake','".$_POST['EarthQuake']."'),
	('".$_SESSION['MM_Username']."','Haste','".$_POST['Haste']."'),
	('".$_SESSION['MM_Username']."','Skeleton','".$_POST['Skeleton']."'),
	('".$_SESSION['MM_Username']."','BarKing','".$_POST['BarKing']."'),
	('".$_SESSION['MM_Username']."','ArcQueen','".$_POST['ArcQueen']."'),
	('".$_SESSION['MM_Username']."','GrandWarden','".$_POST['GrandWarden']."');
	",$clandata);
}
echo "<script>window.history.back();</script>";
?>
