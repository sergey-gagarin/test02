<?php
/**
 * Script to launch a small EC2 instance with Amazon's
 * Fedora Core 8 AMI.
 * 
 * The script will loop during the launch, waiting 
 * for the instance to obtain a public DNS name.
 */
require_once 'example_setup.php';

// load the service
$ec2 = new Amazon_EC2_Client(
    $creds['access_key'], 
    $creds['secret_key']
);

// set up the request with nice fluent interface
$req = new Amazon_EC2_Model_RunInstancesRequest();

// ami-2b5fba42 is Amazon's Fedora Core 8 image
$req->setImageId('ami-2b5fba42')
    ->withMinCount(1)
    ->withMaxCount(1)
    ->withKeyName('awstutorial')
    ->withSecurityGroup('awstutorial');

// run the request
echo "Launching awstutorial instance.\n";
$response = $ec2->runInstances($req);

// this can take a few minutes
$start = microtime(true);
set_time_limit(0);

// get the pending instance id
$reservation = $response->getRunInstancesResult()
                        ->getReservation();
$instances = $reservation->getRunningInstance();
$runningInstance = $instances[0];

// output instance id and state
$id = $runningInstance->getInstanceId();
echo $id
    . ' is ' 
    . $runningInstance->getInstanceState()
                        ->getName()."\n";
// save example instance id
@file_put_contents(
    $creds['tutorial_file_path']
    . DIRECTORY_SEPARATOR
    . 'awstutorial-instance.txt',
    $id
);

// set up DescribeInstances request to fetch status on new
// instance in a loop.
$desc = new Amazon_EC2_Model_DescribeInstancesRequest();
$desc->setInstanceId($id);

echo 'Waiting for public hostname';
while (1) {
    // output progress
    echo '.';
    
    $response = $ec2->describeInstances($desc);
    $res = $response->getDescribeInstancesResult()
                    ->getReservation();
                   
    $ri = $res[0]->getRunningInstance();
    $runningInstance = $ri[0];
    
    if ($runningInstance->isSetPublicDnsName()) {
        $end = microtime(true);
        break;
    }
    
    sleep(2);
}
echo "\n";

// now we're ready to set up our server
echo $id
    . ' is ' 
    . $runningInstance->getInstanceState()->getName()
    . ' at '
    . $runningInstance->getPublicDnsName()
    . "\n";
    
// save hostname for later
@file_put_contents(
    $creds['tutorial_file_path']
    . DIRECTORY_SEPARATOR
    . 'awstutorial-hostname.txt',
    $runningInstance->getPublicDnsName()
);

$span = $end - $start;
echo "Instance booted in {$span} seconds.\n";
exit;