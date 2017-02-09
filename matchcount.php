<?php require_once('Connections/clandata.php'); ?>
<?php
$matchdata=0;
mysql_select_db($database_clandata, $clandata);
$memberdefense = mysql_query ( "select * from havedefense where Code='".$_SESSION['MM_Username']."'",$clandata);

while($infodefense = mysql_fetch_array($memberdefense))
{
	$defensematch = mysql_query ( "select * from rawdata where lookup='".$infodefense['DefenseID'].$infodefense['DefenseLevel']."'",$clandata);
	$infomatch = mysql_fetch_array($defensematch);
	$matchdata=$matchdata+$infomatch['weight']*$infodefense['DefenseNum'];
}
$sqltownlevel = mysql_query ( "select * from clanmember where Code='".$_SESSION['MM_Username']."'",$clandata);
$infotownlevel = mysql_fetch_array($sqltownlevel);

	$townmatch = mysql_query ( "select * from rawdata where lookup='TownHall".$infotownlevel['TownHallLevel']."'",$clandata);
	$infotownmatch = mysql_fetch_array($townmatch);
	$matchdata=$matchdata+$infotownmatch['weight'];

	$INSERTmatch = mysql_query ( "update clanmember set PKMatch=".$matchdata." where Code='".$_SESSION['MM_Username']."'",$clandata);

?>