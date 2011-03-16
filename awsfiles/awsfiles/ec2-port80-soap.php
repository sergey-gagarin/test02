<?php
/**
 * filename: ec2-port80-soap.php
 */
require_once 'example_setup.php';

// use the EC2 WSDL
$wsdl = 'http://s3.amazonaws.com/ec2-downloads'
      . '/2008-05-05.ec2.wsdl';

$ec2 = new AWSSoapClient($wsdl);

// try { 
//     echo "Types:\n"; 
//     if ($types = $ec2->__getTypes()) { 
//         foreach ($types AS $type) { 
//             echo $type."\n\n"; 
//         } 
//     } 
//     echo "Functions:\n"; 
//     if ($funcs = $ec2->__getFunctions()) { 
//         foreach ($funcs AS $func) { 
//             echo $func."\n\n"; 
//         } 
//     } 
// } catch (SoapFault $e) { 
//     var_dump($e); 
// } 

$set = array(
    'securityGroupSet' => array(
        'item' => array(
            'groupName' => 'default'
    ))
);

$result = $ec2->DescribeSecurityGroups($set);
var_dump($result);