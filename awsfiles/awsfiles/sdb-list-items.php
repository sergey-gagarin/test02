<?php
/**
 * List test records in the awstutorial domain.
 */
require_once 'example_setup.php';

// load the service
$sdb = new Amazon_SimpleDB_Client(
    $creds['access_key'], 
    $creds['secret_key']
);

/**
 * 
 * A query just returns the name of the items in a domain,
 * which means you need to send another query for
 * attributes relating to each item.
 * 
 */
$req = new Amazon_SimpleDB_Model_QueryRequest();
$req->setDomainName('awstutorial');

$response = $sdb->query($req);

if ($response->isSetQueryResult()) {
    
    echo "Amazon_SimpleDB_Model_QueryRequest result\n";
    echo "-----------------------------------------\n";
    
    $result = $response->getQueryResult();
    $list   = $result->getItemName();
    
    foreach ($list as $item_name) {
        echo "ItemName: {$item_name}\n\n";
    }
}

/**
 * 
 * Query with Attributes returns item names and their attributes
 * in a single query.
 * 
 */
$req = new Amazon_SimpleDB_Model_QueryWithAttributesRequest();
$req->setDomainName('awstutorial');

$response = $sdb->queryWithAttributes($req);

if ($response->isSetQueryWithAttributesResult()) {

    echo "Amazon_SimpleDB_Model_QueryWithAttributesRequest result\n";
    echo "-------------------------------------------------------\n";

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