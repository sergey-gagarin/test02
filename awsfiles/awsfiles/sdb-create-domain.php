<?php
/**
 * Script to create the data domain for this tutorial
 */
require_once 'example_setup.php';

// load the service
$sdb = new Amazon_SimpleDB_Client(
    $creds['access_key'], 
    $creds['secret_key']
);

// create the domain
$req = new Amazon_SimpleDB_Model_CreateDomainRequest();
$req->setDomainName('awstutorial');

$result = $sdb->createDomain($req);

if ($result->isSetResponseMetadata()) {
    $meta = $result->getResponseMetadata();
    if ($meta->isSetRequestId()) {
        echo 'RequestId: ' . $meta->getRequestId() . "\n";
    }
    if ($meta->isSetBoxUsage()) {
        echo 'BoxUsage: ' . $meta->getBoxUsage() . "\n";
    }
}

