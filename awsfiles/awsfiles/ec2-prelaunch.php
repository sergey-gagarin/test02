<?php
/**
 * Script to check port 80 on the 'awstutorial' security group,
 * and open it if it is not open. This will use the 'awstutorial' 
 * keypair as well, creating it if it does not exist.
 */
require_once 'example_setup.php';

// load the service
$ec2 = new Amazon_EC2_Client(
    $creds['access_key'], 
    $creds['secret_key']
);

/**
 * 
 * Use 'awstutorial' keypair
 * 
 */
$req = new Amazon_EC2_Model_DescribeKeyPairsRequest();
$kpmatch = false;

// run the request
$resp = $ec2->describeKeyPairs($req);

$pairs = $resp->getDescribeKeyPairsResult()->getKeyPair();
foreach ($pairs as $pair) {
    if ($pair->getKeyName() == 'awstutorial') {
        echo "KeyPair awstutorial exists!\n";
        $kpmatch = true;
        break;
    }
}

// create the keypair if we need to
$keypath = $creds['tutorial_file_path']
         . DIRECTORY_SEPARATOR
         . 'id_rsa-awstutorial';

if (! $kpmatch) {
    echo "Creating awstutorial keypair...\n";
    $req = new Amazon_EC2_Model_CreateKeyPairRequest();
    $req->withKeyName('awstutorial');
    
    $resp = $ec2->createKeyPair($req);
    
    if ($resp->isSetCreateKeyPairResult()) {
        $res = $resp->getCreateKeyPairResult();
        $kp = $res->getKeyPair();
        
        echo "generated fingerprint\n";
        echo $kp->getKeyFingerprint() . "\n";
        
        echo "generated material\n";
        echo $kp->getKeyMaterial() . "\n";
                
        // save private key for future use      
        @file_put_contents(
            $keypath,
            $kp->getKeyMaterial()
        );
        
        // set permissions appropriately for key
        chmod($keypath, 0600);
    }
} else {
    // emit a notice if key file isn't where we expect it
    if (! is_readable($keypath)) {
        echo "!! Couldn't read id_rsa-awstutorial file "
           . "at $keypath\n";
    }
}

/**
 * 
 * Use 'awstutorial' Security Group. Create it if
 * necessary.
 * 
 */
$req = new Amazon_EC2_Model_DescribeSecurityGroupsRequest();
$req->withGroupName('awstutorial');

// run the request
try {
    $resp = $ec2->describeSecurityGroups($req);
    echo "Security Group awstutorial exists!\n";
} catch (Amazon_EC2_Exception $e) {
    // doesn't exist, create it
    echo "Creating awstutorial security group ...";
    $new = new Amazon_EC2_Model_CreateSecurityGroupRequest();
    $new->withGroupName('awstutorial')
        ->withGroupDescription(
            'AWS for PHP Developers Tutorial Group'
        );
    $ec2->createSecurityGroup($new);
    echo "done.\n";
    
    // now fe-fetch response
    $resp = $ec2->describeSecurityGroups($req);
}

/**
 * 
 * Make sure 'awstutorial' group has ports 80 and 22 open.
 * 
 */
if ($resp->isSetDescribeSecurityGroupsResult()) {
    $list = $resp->getDescribeSecurityGroupsResult()
                 ->getSecurityGroup();

    // look for wide-open port 80
    $port80open = false;
    $port22open = false;
    foreach ($list as $securityGroup) {
        
        if (! $securityGroup->isSetIpPermission()) {
            continue;
        }
        
        $perms = $securityGroup->getIpPermission();
        foreach ($perms as $perm) {
            if ($perm->isSetIpProtocol() 
                && $perm->getIpProtocol() == 'tcp'
                && $perm->isSetFromPort()
                && $perm->getFromPort() == '80'
                && $perm->isSetToPort()
                && $perm->getToPort() == '80'
            ) {
                $port80open = true;
                continue;
            }
            if ($perm->isSetIpProtocol() 
                && $perm->getIpProtocol() == 'tcp'
                && $perm->isSetFromPort()
                && $perm->getFromPort() == '22'
                && $perm->isSetToPort()
                && $perm->getToPort() == '22'
            ) {
                $port22open = true;
                continue;
            }
        }
    }
}

if ($port80open) {
    echo "Security Group awstutorial port 80 is open!\n";
} else {
    // open port 80
    echo "Opening awstutorial port 80 ...";
    $req = new Amazon_EC2_Model_AuthorizeSecurityGroupIngressRequest();
    $req->withGroupName('awstutorial')
        ->withIpProtocol('tcp')
        ->withFromPort(80)
        ->withToPort(80)
        ->withCidrIp('0.0.0.0/0');
    $ec2->authorizeSecurityGroupIngress($req);
    echo "done.\n";
}

if ($port22open) {
     echo "Security Group awstutorial port 22 is open!\n";
} else {
    // open port 22
    echo "Opening awstutorial port 22 ...";
    $req = new Amazon_EC2_Model_AuthorizeSecurityGroupIngressRequest();
    $req->withGroupName('awstutorial')
        ->withIpProtocol('tcp')
        ->withFromPort(22)
        ->withToPort(22)
        ->withCidrIp('0.0.0.0/0');
    $ec2->authorizeSecurityGroupIngress($req);
    echo "done.\n";
}