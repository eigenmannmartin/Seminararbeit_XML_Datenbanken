<?php

$username = "";
$password = "+";

$_Servers_ = array(
	"Datacenter" => [	
		"wet", 
		"http://wetsrvmgt01/thruk/cgi-bin/status.cgi?dfl_s0_type=service&dfl_s0_value=bp_DataCenter01&view_mode=json", $username, $password, 
		function( $r ){
			return [ 	
				"performance" => "ok",
				"state" => $r[0]['state'] 
			];
		}
	],

	"SAP" => [	
		"wet", 
		"http://wetsrvmgt01/thruk/cgi-bin/status.cgi?dfl_s0_type=service&dfl_s0_value=bp_SAP&view_mode=json", $username, $password, 
		function( $r ){
			return [ 	
				"performance" => "ok",
				"state" => $r[0]['state'] 
			];
		}
	],

	"Fileserver" => [	
		"wet", 
		"http://wetsrvmgt01/thruk/cgi-bin/status.cgi?dfl_s0_type=service&dfl_s0_value=bp_Filer&view_mode=json", $username, $password, 
		function( $r ){
			return [ 	
				"performance" => "ok",
				"state" => $r[0]['state'] 
			];
		}
	],

	"Netzwerk" => [	
		"wet", 
		"http://wetsrvmgt01/thruk/cgi-bin/status.cgi?dfl_s0_type=service&dfl_s0_value=ps_WetNet01&view_mode=json", $username, $password, 
		function( $r ){
			return [ 	
				"performance" => "ok",
				"state" => $r[0]['state'] 
			];
		}
	],

	"SVN-Server" => [	
		"wet", 
		"http://wetsrvmgt01/thruk/cgi-bin/status.cgi?dfl_s0_type=service&dfl_s0_value=bp_SVN&view_mode=json", $username, $password, 
		function( $r ){
			return [ 	
				"performance" => "ok",
				"state" => $r[0]['state'] 
			];
		}
	],

	"Entwicklung-Server" => [	
		"wet", 
		"http://wetsrvmgt01/thruk/cgi-bin/status.cgi?dfl_s0_type=service&dfl_s0_value=bp_Entwicklung&view_mode=json", $username, $password, 
		function( $r ){
			return [ 	
				"performance" => "ok",
				"state" => $r[0]['state'] 
			];
		}
	],

	"Energy Consumption" => [
		"wet",
		"http://wetsrvmgt01/thruk/cgi-bin/status.cgi?s0_op=~&s0_type=search&hidesearch=2&s0_value=wetusv&view_mode=json", $username, $password,
		function( $r ){
			$performance = 0;

			foreach ($r as $value) {
				if($value['description'] == "SNMP: FW Output Power"){
					preg_match('/([a-zA-Z ]* - )([0-9]*)$/', $value['plugin_output'], $t);
					$performance += $t[2];
				}
			}

			return [
				"performance" => $performance,
				"state" => 0
			];
		}
	]
);


?>