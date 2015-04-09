<?php
include ('include/settings.php');
include ('include/eXist.php');

try
{

	$Services = array();

	foreach ($_Servers_ as $Service => $data) {
		
		$ch = curl_init();
		curl_setopt( $ch, CURLOPT_URL, $data[1] );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY );
		curl_setopt( $ch, CURLOPT_USERPWD, $data[2].":".$data[3] );
		$out = curl_exec($ch);

		$obj = json_decode( $out, true );
		$Services[ $data[0] ][ $Service ] = $obj[0];
	}
	

	//var_dump( $Services );

	$db = new eXist("admin", "admin");
	$db->connect() or die ($db->getError());

	$date = time();

	foreach ($Services as $Region => $serv) {
		$query = 'update insert <Check><Date>'.$date.'</Date>';

		foreach ($serv as $S => $s) {
			
			$query .= "<Service> 
							<Servicename>".$S."</Servicename>
							<State>".$s['state']."</State>
					   </Service>";
				
		}

		$query .= '</Check> into doc("'._DB_.'")//areas/area[areaname="'.$Region.'"]';
	}
	
	//echo( "<code>".htmlentities($query)."</code>" );

	$db->setDebug(TRUE);
	$db->setHighlight(TRUE);
	$db->xquery($query) or die ($db->getError()); //Execute query

	$db->disconnect() or die ($db->getError());
}
catch( Exception $e )
{
	die($e);
}
?>
