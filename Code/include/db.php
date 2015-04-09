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