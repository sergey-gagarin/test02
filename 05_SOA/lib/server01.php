<?php


// video - http://www.slideshare.net/fulvio.corno/web-services-in-php-using-the-nusoap-library
require_once("nusoap.php");
 
//Create a new soap server
$server = new nusoap_server();
 
//Define our namespace 
/*
$namespace = "http://localhost/05_SOA/lib/server01.php";
$server->wsdl->schemaTargetNamespace = $namespace;
  */
//Configure our WSDL
$server->configureWSDL('HelloWorld', 'http://localhost/05_SOA/lib/server01.php'); // name of service, namespase URL
  
 
// Register our method
// with this registration
// http://localhost/05_SOA/lib/server01.php?wsdl will give XML
$server->register('HelloWorld',
                  array("name"=>"xsd:string"),   // input    ?? XSD syntax
                  array("result"=>"xsd:string"), // output
                  'http://localhost/05_SOA/lib/server01.php'); // namespace
 
function HelloWorld($name)
{
return "Web Service think that ".$name." can benefit from WS. All the best!";
}
 
// Get our posted data if the service is being consumed
// otherwise leave this data blank.
//$POST_DATA = isset($GLOBALS['HTTP_RAW_POST_DATA']) ? $GLOBALS['HTTP_RAW_POST_DATA'] : '';

// Use the request to (try to) invoke the service
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';

$server->service($HTTP_RAW_POST_DATA);

 
// pass our posted data (or nothing) to the soap service
//$server->service($POST_DATA);
exit();