<?php
/**
 * Script to shuttle an uploaded movie to the 'awstutorial'
 * queue so that another process can pick it up and convert
 * it.
 */
require_once 'example_setup.php';

// load the service
$sqs = new Amazon_SQS_Client(
    $creds['access_key'], 
    $creds['secret_key']
);

// Put the Uploaded File on S3
Killersoft_Wrapper_S3::selfRegister();

// establish a unique bucket name, based on 
// hash of access_key, secret_key, and public
// instance hostname.

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

if (! is_dir($bucket)) {
    mkdir($bucket);
}

// put the uploaded file on S3.
// For your YouTube-killer, you'll want to make sure this 
// filename doesn't conflict with other files.

// NOTE: This won't work until it's injected into the 
// upload script from Step 1.
file_put_contents(
    "{$bucket}/{$upload_name}", 
    file_get_contents($upload_file)
);

// now that the file to be converted is in place, put 
// a message in the queue for another server
// to pick it up

// In a production script, you'd skip this step
// and store the URL to your queue in a config file
$req = new Amazon_SQS_Model_ListQueuesRequest();
$req->withQueueNamePrefix('awstutorial');
$resp = $sqs->listQueues($req);
$list = $resp->getListQueuesResult()
             ->getQueueUrl();
$queue_url = array_shift($list);

// Send the actual message
$msg = new Amazon_SQS_Model_SendMessageRequest();
$msg->withMessageBody("{$bucket}/{$upload_name}")
    ->withQueueUrl($queue_url);

$resp = $sqs->sendMessage($msg);
