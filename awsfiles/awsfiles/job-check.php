<?php
/**
 * Check to see if sqs-queue-conversion.php tasks
 * actually put a file on S3 and a message in SQS.
 */
require_once 'example_setup.php';

// Register S3 wrapper
Killersoft_Wrapper_S3::selfRegister();

// set our bucket name
$hostfile = $creds['tutorial_file_path']
    . DIRECTORY_SEPARATOR
    . 'awstutorial-hostname.txt';

if (file_exists($hostfile)) {
    $host = file_get_contents($hostfile);
} else {
    $host = file_get_contents(
        'http://169.254.169.254/latest/meta-data/public-hostname'
    );
}

$bucket = 's3://awstutorial-'
        . md5(
            $creds['access_key'] .
            $creds['secret_key'] .
            $host
        );

// change this if you want to check a different file
if (file_exists("{$bucket}/sample.mov")) {
    echo "{$bucket}/sample.mov is on S3!\n";
}

// now peek in the queue
$sqs = new Amazon_SQS_Client(
    $creds['access_key'], 
    $creds['secret_key']
);

// In a production script, you'd skip this step
// and store the URL to your queue in a config file
$req = new Amazon_SQS_Model_ListQueuesRequest();
$req->withQueueNamePrefix('awstutorial');
$resp = $sqs->listQueues($req);
$list = $resp->getListQueuesResult()
             ->getQueueUrl();
$queue_url = array_shift($list);


// UNCOMMENT IF YOU WANT TO MANUALLY INJECT A MESSAGE
// $msg = new Amazon_SQS_Model_SendMessage();
// $msg->withMessageBody("{$bucket}/sample.mov")
//     ->withQueueName('awstutorial');
// $resp = $sqs->sendMessage($msg);
// sleep(5);


// first, get the approximate number of messages
// in the queue. Why approximate? See the SQS 
// architecture documentation.
$q = new Amazon_SQS_Model_GetQueueAttributesRequest();
$q->withQueueUrl($queue_url)
  ->withAttributeName('ApproximateNumberOfMessages');
  
$resp = $sqs->getQueueAttributes($q);
$num = $resp->getGetQueueAttributesResult()
            ->getAttribute('ApproximateNumberOfMessages');

echo "Queue awstutorial has ~{$num[0]->getValue()} messages.\n";

// now take a look with a minimal VisibilityTimeout,
// so as to not interfere with other processes
// which may access the queue.
$msg = new Amazon_SQS_Model_ReceiveMessageRequest();
$msg->withQueueUrl($queue_url)
    ->withMaxNumberOfMessages(1)
    ->withVisibilityTimeout(1);

$resp = $sqs->receiveMessage($msg);
if ($resp->isSetReceiveMessageResult()) {
    $msg = $resp->getReceiveMessageResult()
                ->getMessage();

    if (isset($msg[0])) {
        echo "Found a message with a body of:\n";
        echo $msg[0]->getBody() . "\n";
    } else {
        echo "Message not fully retrieved:\n";
        var_dump($msg);
    }
} else {
    echo "Couldn't retrieve a message.\n";
}