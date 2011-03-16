<?php
/**
 * Script to check that awstutorial exists
 */
require_once 'example_setup.php';

// load the service
$sdb = new Amazon_SimpleDB_Client(
    $creds['access_key'], 
    $creds['secret_key']
);

// make sure the domain is active
$req = new Amazon_SimpleDB_Model_ListDomainsRequest();

$result = $sdb->listDomains($req);

if ($result->isSetListDomainsResult()) {
    $list = $result->getListDomainsResult()
                   ->getDomainName();
                   
    foreach ($list as $domain) {
        echo "DomainName {$domain}\n";
    }
}
