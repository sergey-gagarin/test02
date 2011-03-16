<?php
/**
 * Script to list an account's SQS queues
 */
require_once 'example_setup.php';

// load the service
$sqs = new Amazon_SQS_Client(
    $creds['access_key'], 
    $creds['secret_key']
);

try {
    // get the list of queues
    $req = new Amazon_SQS_Model_ListQueuesRequest();
    
    $resp = $sqs->listQueues($req);
    $list = $resp->getListQueuesResult()
                 ->getQueueUrl();

    echo "Existing SQS Queues:\n";
    foreach ($list as $url) {
        echo $url . "\n";
    }
} catch (Amazon_SQS_Exception $e) {
    echo $e->getErrorMessage() . "\n";
    echo $e->getXML() . "\n";
    exit;
}