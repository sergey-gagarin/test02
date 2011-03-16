<?php
require_once("nusoap.php");
$server = new nusoap_server();
//Configure WSDL
$server->configureWSDL('Hello', 'http://localhost/05_SOA/lib/server02.php'); 
// name of service, namespase URL

// Register the method with this registration
// http://localhost/05_SOA/lib/server02.php?wsdl will give XML
$server->register('Hello',
                  array("name"=>"xsd:string"),   // input    ?? XSD syntax
                  array("result"=>"xsd:string"), // output
                  'http://localhost/05_SOA/lib/server02.php'); // namespace
 
function Hello($name)
{
return "Web Service think that ".$name." can benefit from WS. All the best!";
}
// Use the request to (try to) invoke the service
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';

// pass our posted data (or nothing) to the soap service
$server->service($HTTP_RAW_POST_DATA);

exit();