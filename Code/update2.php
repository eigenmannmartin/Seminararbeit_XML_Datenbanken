<?php
include ('include/db.php');


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
		$Services[ $data[0] ][ $Service ] = $data[4]( $obj );
	}
	

	$DB = new DB();
	$date = time();

	foreach ($Services as $Region => $serv) {
		$q = [
			"Check" => [
				"Date" => $date,
			]
		];

		foreach ($serv as $S => $s) {
			array_push($q["Check"], array(
				"Service" => [
					"Servicename" => $S,
					"Performance" => $s['performance'],
					"State" => $s['state']
				]
			));
		}
	}

	
	$DB->insert($q, $Region);
	$DB->close();

}
catch( Exception $e )
{
	die($e);
}
?>
