<?php
/**
 * Script to check for an 'awstutorial' queue, and create
 * one if necessary.
 */
require_once 'example_setup.php';

// load the service
$sqs = new Amazon_SQS_Client(
    $creds['access_key'], 
    $creds['secret_key']
);

try {
    // get the list of queues
    $newqueue = 'awstutorial';
    $req = new Amazon_SQS_Model_ListQueuesRequest();
    $req->withQueueNamePrefix($newqueue);
    
    $resp = $sqs->listQueues($req);
    $list = $resp->getListQueuesResult()
                 ->getQueueUrl();

    $exists = false;
    foreach ($list as $url) {
        if (strpos($url, $newqueue) !== false) {
            $exists = true;
            break;
        }
    }
    
    if ($exists) {
        echo "Queue $newqueue exists!\n";
    } else {
        // create it
        echo "Creating $newqueue...\n";
        $req = new Amazon_SQS_Model_CreateQueueRequest();
        $req->withQueueName($newqueue)
            ->withDefaultVisibilityTimeout(30);

        $resp = $sqs->createQueue($req);
        if ($resp->isSetCreateQueueResult()) {
            $result = $resp->getCreateQueueResult();
            if ($result->isSetQueueUrl()) {
                echo "Queue {$newqueue} created "
                     . "at "
                     . $result->getQueueUrl()
                     . "\n";
            }
        } else {
            // cope with non-exceptional abject failure
        }
    }

} catch (Amazon_SQS_Exception $e) {
    echo $e->getErrorMessage() . "\n";
    echo $e->getXML() . "\n";
    exit;
}