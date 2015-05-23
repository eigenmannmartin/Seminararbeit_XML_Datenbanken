<?php 


define( "_DB_Collection_", "/db/test/" );
define( "_DB_Document", "test.xml" );
define( "_DB_", _DB_Collection_._DB_Document );



$username = "";
$password = "";

$_Servers_ = array(
	"Datacenter" => [	
		"wet", 
		"http://wetsrvmgt01/thruk/cgi-bin/status.cgi?dfl_s0_type=service&dfl_s0_value=bp_DataCenter01&view_mode=json", $username, $password, 
		function( $r ){
			return [ 	
				"performance" => "ok",
				"infotext" => "",
				"state" => $r[0]['state'] 
			];
		}
	],

	"SAP" => [	
		"wet", 
		"http://wetsrvmgt01/thruk/cgi-bin/status.cgi?dfl_s0_type=service&dfl_s0_value=bp_SAP&view_mode=json", $username, $password, 
		function( $r ){
			if($r[0]['state'] == 0 || $r[0]['acknowledged'] == 1){
				$performance = "ok";
				$state = 0;
			} else {
				$performance = $r[0]['long_plugin_output'];
				$state = $r[0]['state'];
			}
			return [ 	
				"performance" => $performance,
				"infotext" => "",
				"state" => $state
			];
		}
	],

	"Fileserver" => [	
		"wet", 
		"http://wetsrvmgt01/thruk/cgi-bin/status.cgi?dfl_s0_type=service&dfl_s0_value=bp_Filer&view_mode=json", $username, $password, 
		function( $r ){
			if($r[0]['state'] == 0){
				$performance = "ok";
			} else {
				$performance = $r[0]['long_plugin_output'];
			}
			return [ 	
				"performance" => $performance,
				"infotext" => "",
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
				"infotext" => "",
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
				"infotext" => "",
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
				"infotext" => "",
				"state" => $r[0]['state'] 
			];
		}
	],

	"SAP-Users" => [	
		"wet", "http://wetsrvmgt01/thruk/cgi-bin/status.cgi?dfl_s0_value_sel=5&dfl_s0_servicestatustypes=31&dfl_s0_op=%3D&dfl_s0_op=%3D&style=detail&dfl_s0_serviceprops=0&dfl_s0_type=host&dfl_s0_type=service&hidetop=&dfl_s0_hoststatustypes=15&hidesearch=2&dfl_s0_val_pre=&dfl_s0_val_pre=&dfl_s0_hostprops=0&dfl_s0_value=WETSRVSAP11&dfl_s0_value=SAP%3A+Users&nav=&view_mode=json", $username, $password, 
		function( $r ){

			$performance = preg_match('/([a-zA-Z ]*=)([0-9])*/', $r[0]["plugin_output"], $t);

			return [ 	
				"performance" => $t[2],
				"infotext" => " Benutzer eingeloggt",
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
				"infotext" => " W/h",
				"state" => 0
			];
		}
	]
);

?>