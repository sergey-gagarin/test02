<?php
// Pull in the NuSOAP code
require_once('nusoap.php');

// Create the client instance

//$client = new nusoap_client('http://localhost/05_SOA/lib/server01.php?wsdl', true); // use wsdl
$client = new nusoap_client('http://test01.com/05_SOA/lib/server01.php?wsdl', true); // use wsdl
 
//$client = new soapclient('server01.php');

// Call the SOAP method
$param = 'Flow Develpers';
print "String '".$param."' - will be passed as a parameter for Web Service <br><br>";
$result = $client->call('HelloWorld',array('name'=>$param));
//$result = $client->HelloWorld;

// Display the result
print($result);

//print_r($result);

$err = $client->getError();
    if ($err) {
        // Display the error
        echo '<p><b>Error: ' . $err . '</b></p>';
    }
    
  // Check for a fault
if ($client->fault) {
    echo '<p><b>Fault: ';
    print_r($result);
    echo '</b></p>';
}

 /*
// Display the request and response
echo '<h2>Request</h2>';
echo '<pre>' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
echo '<h2>Response</h2>';
echo '<pre>' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>';
   */

// Display the request and response
echo '<h2>Request</h2>';
echo '<pre>' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
echo '<h2>Response</h2>';
echo '<pre>' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>';
