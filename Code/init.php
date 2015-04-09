<?php

include ('include/settings.php');
include ('include/eXist.php');

try
{
	$db = new eXistAdmin("admin", "admin");
	$db->connect() or die ($db->getError());

	$db->removeDocument( _DB_ ); //Delete document
	$db->removeCollection( _DB_Collection_ ); //Delete Collection

	$db->createCollection( _DB_Collection_ ); //Create collection
	$db->store( '<areas><area><areaname>wet</areaname></area></areas>', 'UTF-8', _DB_ , true ); //Create default document

	$db->disconnect() or die ($db->getError());
}
catch( Exception $e )
{
	die($e);
}
?>
