<?php
/**
 * Select specific records in the awstutorial domain.
 */
require_once 'example_setup.php';

// load the service
$sdb = new Amazon_SimpleDB_Client(
    $creds['access_key'], 
    $creds['secret_key']
);

// Get items with a specific tag
$req = new Amazon_SimpleDB_Model_QueryWithAttributesRequest();
$req->setDomainName('awstutorial')
    ->withQueryExpression("['tags' = 'apple']");

$response = $sdb->queryWithAttributes($req);

if ($response->isSetQueryWithAttributesResult()) {

    $result = $response->getQueryWithAttributesResult();
    $list   = $result->getItem();
    
    foreach ($list as $item) {
        echo "Item Name: " . $item->getName() . "\n";
        
        $attlist = $item->getAttribute();
        foreach ($attlist as $attribute) {
            echo $attribute->getName() . ": ";
            echo $attribute->getValue() . "\n";
        }
    }
}