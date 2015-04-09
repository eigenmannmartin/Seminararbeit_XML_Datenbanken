<?php
include ('include/eXist.php');

try
{
	$db = new eXist("admin", "admin");

	# Connect
	$db->connect() or die ($db->getError());

	// http://cdi.uvm.edu/exist/update_ext.xml
	//update insert <employee><code>5</code></employee> into doc("/db/test/test2.xml")//company[companyname="Harryson"]
	//update insert <name>Martin Eigenmann</name> into doc("/db/test/test2.xml")//company[companyname="Harryson"]/employee[code="5"]
	//update replace //name[. = "Martin Eigenmann"] with <name>Maddin</name>
	//update delete //name[. = "Maddin"]
	$query = ' 
		
		update delete //name[. = "Maddin"]
	';

	print "<p><b>XQuery:</b></p><pre>$query</pre>";

	# XQuery execution
	$db->setDebug(False);
	$db->setHighlight(TRUE);
	$result = $db->xquery($query) or die ($db->getError());


	$db->disconnect() or die ($db->getError());
}
catch( Exception $e )
{
	die($e);
}
?>
