<?php
/**
 * Insert a test record into the awstutorial domain.
 */
require_once 'example_setup.php';

// load the service
$sdb = new Amazon_SimpleDB_Client(
    $creds['access_key'], 
    $creds['secret_key']
);

// Let's call this item1 -- acts as the "id" column
// in our table graphic.
$req = new Amazon_SimpleDB_Model_PutAttributesRequest();
$req->withDomainName('awstutorial')
    ->withItemName('item1');

// create a sample record for the table structure we're 
// working with
$att = new Amazon_SimpleDB_Model_ReplaceableAttribute();
$att->withName('userid')
    ->withValue('clay');
$req->withAttribute($att);

$att = new Amazon_SimpleDB_Model_ReplaceableAttribute();
$att->withName('category')
    ->withValue('tutorials');
$req->withAttribute($att);

$att = new Amazon_SimpleDB_Model_ReplaceableAttribute();
$att->withName('file')
    ->withValue('sample.mov');
$req->withAttribute($att);

$att = new Amazon_SimpleDB_Model_ReplaceableAttribute();
$att->withName('description')
    ->withValue('Just a sample video. Watch!');
$req->withAttribute($att);

$att = new Amazon_SimpleDB_Model_ReplaceableAttribute();
$att->withName('size')
    ->withValue('71k');
$req->withAttribute($att);

$att = new Amazon_SimpleDB_Model_ReplaceableAttribute();
$att->withName('tags')
    ->withValue('apple');
$req->withAttribute($att);


$result = $sdb->putAttributes($req);

if ($result->isSetResponseMetadata()) {
    $meta = $result->getResponseMetadata();
    if ($meta->isSetRequestId()) {
        echo 'RequestId: ' . $meta->getRequestId() . "\n";
    }
    if ($meta->isSetBoxUsage()) {
        echo 'BoxUsage: ' . $meta->getBoxUsage() . "\n";
    }
}
