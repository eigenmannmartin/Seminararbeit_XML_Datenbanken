<?php 

include ('include/db.php');
include ('include/servers.php');
$DB = new DB();

$state = $DB->readstate( "wet" );

$paststate = $DB->readpaststate( "wet" );



$statetable = "<h3>Überprüft am ".date('D d. M Y, G:i ', $state['Date'])."</h3>";
$statetable .= "<table class=\"table\">";

foreach ($state['Service'] as $value) {
	if($value['Infotext'] !== array()){ $Infotext = $value['Infotext']; }else{ $Infotext = ""; }

	if( $value['State'] == 0) $statetable .= "<tr><td>";
	if( $value['State'] == 1) $statetable .= "<tr class=\"warning\"><td>";
	if( $value['State'] == 2) $statetable .= "<tr class=\"danger\"><td>";
	$statetable .= $value['Servicename']."</td><td>".str_replace('\n', '<br>',$value['Performance']).$Infotext."</td></tr>";
}

$statetable .= "</table>";

$paststatetable = "<h3>Fehlerfälle</h3>";
$paststatetable .= "<table class=\"table\">";

foreach ($paststate as $key => $value) {
	if($value['Infotext'] !== array()){ $Infotext = $value['Infotext']; }else{ $Infotext = ""; }

	if( $value['State'] == 0) $paststatetable .= "<tr><td>";
	if( $value['State'] == 1) $paststatetable .= "<tr class=\"warning\"><td>";
	if( $value['State'] == 2) $paststatetable .= "<tr class=\"danger\"><td>";
	$paststatetable .= $key." <small>".date('D d. M Y, G:i ',$value['Date'])."</small></td><td>".str_replace('\n', '<br>',$value['Performance']).$Infotext."</td></tr>";
}
$paststatetable .= "</table>"

?>

<?php  include("head.php");?>

<div class="container">
<?php echo($statetable);?>

<?php echo($paststatetable);?>
</div>

<?php  include("tail.php");?>