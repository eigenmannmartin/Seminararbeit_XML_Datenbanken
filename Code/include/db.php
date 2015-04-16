<?php

include ('include/eXist.php');
include ('include/settings.php');

class DB
{
    public function __construct(){
        $this->db = new eXist("admin", "admin");
		$this->db->connect() or die ($db->getError());
    }

    public function readstate( $Region ){
    	$query = '
    		(for $checks in doc("'._DB_.'")//areas/area[areaname="'.$Region.'"]//Check
    		order by $checks/Date descending
    		return $checks)[1]';

    	$result = $this->db->xquery($query) or die ($this->db->getError()); //Execute query

    	$xml = simplexml_load_string( $result["XML"] );
		$json = json_encode($xml);
		$array = json_decode($json,TRUE);

    	return $array;
    }

    public function readpaststate( $Region ){
    	$date = date('U', strtotime('-2 day'));
    	//where Service[State>0]
    	$query = '
    		(for $checks in doc("'._DB_.'")//areas/area[areaname="'.$Region.'"]//Check[Date>'.$date.']//Service[State>0]
    		order by $checks/Date descending
    		return $checks)';

    	$result = $this->db->xquery($query) or die ($this->db->getError()); //Execute query

    	$ret = array();
    	
    	foreach ($result['XML'] as $value) {
    		$xml = simplexml_load_string( $value );
			$json = json_encode($xml);
			$array = json_decode($json,TRUE);


			if( !isset($ret[$array['Servicename']]) || $ret[$array['Servicename']] < $array['State'] ){
				$ret[$array['Servicename']] = [ 'State' => $array['State'], 'Performance' => $array['Performance'] ];
				$ret[$array['Servicename']]['Date'] = $array['Date'];
			}

    	}

    	return $ret;
    }

    public function insert($data, $Region){

    	$query = 'update insert ' . $this->insert_helper( $data ) . ' into doc("'._DB_.'")//areas/area[areaname="'.$Region.'"]';
    	return $this->db->xquery($query) or die ($this->db->getError()); //Execute query
    }

    private function insert_helper( $data ){
    	$r = "";
    	foreach( $data as $key => $val ){
    		if( is_array($val) ){
    			if( is_numeric( $key ) ){
    				$r .= $this->insert_helper( $val );
    			} else {
    				$r .= "<".$key.">".$this->insert_helper( $val )."</".$key.">";
    			}
    		} else {
    			$r .= "<".$key.">".$val."</".$key.">";
    		}
    	}
    	return $r;
    }


    public function close(){
    	$this->db->disconnect() or die ($this->db->getError());
    }
}


?>