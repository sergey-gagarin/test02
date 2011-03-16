<?php
require_once 'AWSforPHP/AWSSoapClient.php';

// use the EC2 WSDL
$wsdl = 'http://s3.amazonaws.com/ec2-downloads'
      . '/2008-05-05.ec2.wsdl';

$ec2 = new AWSSoapClient($wsdl);

// you should really check for SoapFaults here
$result = $ec2->DescribeInstances();
$items = $result->reservationSet->item;

// find our image id
$ami = 'ami-c8ac48a1';

// this loop would be the same for a Tarzan response body
foreach ($items as $item) {
    if (property_exists($item->instancesSet, 'item')) {        
        $instance = $item->instancesSet->item;
        if (is_array($instance)) {
            // multiple instances launched in this case
            foreach ($instance as $i) {
                if (property_exists($i, 'imageId') &&
                    $i->imageId == $ami) {
                        echo $i->dnsName."\n";
                }
            }
        } elseif (is_object($instance)) {
            if (property_exists($instance, 'imageId') &&
                $instance->imageId == $ami) {
                echo $instance->dnsName."\n";
            }
        }
    }
}