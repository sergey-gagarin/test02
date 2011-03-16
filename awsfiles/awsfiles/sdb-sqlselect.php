<?php
/**
 * Select specific records in the awstutorial domain using
 * the SQL SELECT style interface.
 */
require_once 'example_setup.php';

// load the service
$sdb = new Amazon_SimpleDB_Client(
    $creds['access_key'], 
    $creds['secret_key']
);

// Craft a SQL-like SELECT expression
$q = "SELECT * FROM awstutorial WHERE tags LIKE 'app%'";


$req = new Amazon_SimpleDB_Model_SelectRequest();
$req->setSelectExpression($q);

$response = $sdb->select($req);

if ($response->isSetSelectResult()) {

    $result = $response->getSelectResult();
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