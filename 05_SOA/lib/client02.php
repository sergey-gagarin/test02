<?php
require_once('nusoap.php');
$client = new nusoap_client('http://localhost/05_SOA/lib/server02.php?wsdl', true); // use wsdl

// Call the SOAP method
$param = 'Flow Develpers';
print "String '".$param."' - will be passed as a parameter for Web Service <br><br>";


$result = $client->call('Hello',array('name'=>$param));
print($result);


$err = $client->getError();
    if ($err) {
        // Display the error
        echo '<p><b>Error: ' . $err . '</b></p>';}
// Check for a fault
if ($client->fault) {
    echo '<p><b>Fault: ';
    print_r($result);
    echo '</b></p>';
}
// Display the request and response
echo '<h3>Request</h3>';
echo '<pre>'. htmlspecialchars($client->request, ENT_QUOTES).'</pre>';
echo '<h3>Response</h3>';
echo '<pre>' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>';
