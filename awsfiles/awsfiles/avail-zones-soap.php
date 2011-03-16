<?php
// use the AWS-aware extension of PHP 5's SoapClient
require_once 'AWSforPHP/AWSSoapClient.php';

// use the EC2 WSDL
$wsdl = 'http://s3.amazonaws.com/ec2-downloads'
      . '/2008-05-05.ec2.wsdl';

$ec2 = new AWSSoapClient($wsdl);

// call a method
$result = $ec2->DescribeAvailabilityZones();
foreach ($result->availabilityZoneInfo->item as $z) {
    echo "{$z->zoneName}: {$z->zoneState}\n";
}

