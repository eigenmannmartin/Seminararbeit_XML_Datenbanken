<?php 

include ('include/db.php');
$DB = new DB();

var_dump( $DB->readstate( "wet" ) );


?>