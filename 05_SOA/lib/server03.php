<?php
require_once("nusoap.php");
 
//Create a new soap server
$server = new nusoap_server();
 
//Configure our WSDL
$server->configureWSDL('HelloWorld', 'http://localhost/05_SOA/lib/server01.php'); // name of service, namespase URL
  
 
// Register our method
// with this registration
// http://localhost/05_SOA/lib/server02.php?wsdl will give XML
$server->register('HelloWorld',
                  array("name"=>"xsd:string"),   // input    ?? XSD syntax
                  array("result"=>"xsd:string"), // output
                  'http://localhost/05_SOA/lib/server02.php'); // namespace
 
function HelloWorld($name)
{
return "Web Service think that ".$name." can benefit from WS. All the best!";
}
 

// Use the request to (try to) invoke the service
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';

// pass our posted data (or nothing) to the soap service
$server->service($HTTP_RAW_POST_DATA);

exit();


// http://osdir.com/ml/php.nusoap.general/2008-01/msg00026.html
<?php
// Pull in the NuSOAP code
require_once('../lib/nusoap.php');
// Create the server instance
$server = new soap_server;
// Initialize WSDL
$server->configureWSDL('getfile1', 'urn:getfile1');
// Register the method to expose
$server->register(
'getFile', // method name
array('filename' => 'xsd:string'), // input parameters
array('return' => 'xsd:base64Binary'), // output parameters
'urn:getfile1', // namespace
'urn:getfile1/getFile', // SOAPAction
'rpc', // style
'encoded' // use
);
// Define the method as a PHP function
function getFile($filename) {
global $HTTP_SERVER_VARS;
if ($filename != 'php.gif' && $filename != 'getfile1.php') {
return new soap_fault('SOAP-ENV:Client', 'getfile1', 'Unsupported file
name', array('filename' => $filename));
}
$handle = fopen(dirname($HTTP_SERVER_VARS['PATH_TRANSLATED']) . '/' .
$filename, "rb");
$contents = fread($handle, filesize($filename));
fclose($handle);
return base64_encode($contents);
}
// Use the request to (try to) invoke the service
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA :
'';
$server->service($HTTP_RAW_POST_DATA);


// From http://osdir.com/ml/php.nusoap.general/2004-11/msg00058.html

function UploadFile($bytes, $filename) {
> > // Save file to specified directory using filename
> > $fp = fopen("upload_directory/$filename", "w");
> > fwrite($fp, base64_decode($bytes));
> > fclose($fp);
> > return true;
> > }
