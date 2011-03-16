<?php
/**
 * Check to see if sqs-queue-conversion.php tasks
 * actually put a file on S3 and a message in SQS.
 */
require_once 'example_setup.php';

// Register S3 wrapper
Killersoft_Wrapper_S3::selfRegister();

// Fetch a job from SQS
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

// - we know all 'awstutorial' jobs are videos to convert.
// - hide job from others while we're working on it.
$msg = new Amazon_SQS_Model_ReceiveMessageRequest();
$msg->withQueueUrl($queue_url)
    ->withMaxNumberOfMessages(1)
    ->withVisibilityTimeout(20);

$resp = $sqs->receiveMessage($msg);
if (!$resp->isSetReceiveMessageResult()) {
    echo "Couldn't retrieve a message.\n";
    exit;
}

$msg = $resp->getReceiveMessageResult()
            ->getMessage();

if (!isset($msg[0])) {
    echo "Message not fully retrieved:\n";
    var_dump($msg);
    exit;
}

// Now we've got a job. Let's check to see if the 
// file to work on is still present.
$source = $msg[0]->getBody();

if (! file_exists($source)) {
    // source is gone, so kill the job and exit
    echo "Deleting orphaned job from queue.\n";
    $del = new Amazon_SQS_Model_DeleteMessageRequest();
    $del->withReceiptHandle(
            $msg[0]->getReceiptHandle()
          )
        ->withQueueUrl($queue_url);
    $sqs->deleteMessage($del);
    exit;
}

// file is present, let's convert it!
$localin = '/tmp/'.basename($source);
file_put_contents(
    $localin,
    file_get_contents($source)
);
$localout = substr($localin, 0, -3) . 'flv';

// ffmpeg command for transformation
$cmd = '/usr/bin/ffmpeg -i '
     . escapeshellcmd($localin)
     . ' -ar 22050 '
     . '-acodec mp3 -ab 32k -r 25 -s 320x240 '
     . '-vcodec flv -qscale 9.5 '
     . escapeshellcmd($localout);

// run the conversion
// you'd probably want exec() or proc_open()
// in production, but we use passthru() 
// for this tutorial so you can watch!
passthru($cmd);

// check for expected output
if (!file_exists($localout)) {
    die("Conversion failed, exiting.\n");
}

echo "Conversion complete!\n"
   . "Deleting completed job from queue.\n";
   
$del = new Amazon_SQS_Model_DeleteMessageRequest();
$del->withReceiptHandle(
        $msg[0]->getReceiptHandle()
      )
    ->withQueueUrl($queue_url);
$sqs->deleteMessage($del);

// Clean up
$bucket = parse_url($source, PHP_URL_HOST);
$cbucket = 's3://' . $bucket . '/converted';
if (! is_dir($cbucket)) {
    mkdir($cbucket);
}
echo "Uploading converted file back to S3\n";
file_put_contents(
    $cbucket . '/' . basename($localout), 
    file_get_contents($localout)
);
echo "Deleting original since we no longer need it\n";
unlink($source);