<?php
// load in credentials
$creds = parse_ini_file('/etc/aws.conf');

// Define query string keys/values
$params = array(
    'Action' => 'DescribeAvailabilityZones',
    'AWSAccessKeyId' => $creds['access_key'],
    'Timestamp' => gmdate('Y-m-d\TH:i:s\Z'),
    'Version' => '2008-05-05',
    'ZoneName.0' => 'us-east-1a',
    'ZoneName.1' => 'us-east-1b',
    'ZoneName.2' => 'us-east-1c',
    'SignatureVersion' => 2,
    'SignatureMethod' => 'HmacSHA256'
);

// See docs
// http://tr.im/jbjd
uksort($params, 'strnatcmp');
$qstr = '';
foreach ($params as $key => $val) {
    $qstr .= "&{$key}=".rawurlencode($val);
}
$qstr = substr($qstr, 1);

// Signature Version 2
$str = "GET\n"
     . "ec2.amazonaws.com\n"
     . "/\n"
     . $qstr;

// Generate base64-encoded RFC 2104-compliant HMAC-SHA256
// signature with Secret Key using PHP 5's native 
// hash_hmac function.
$params['Signature'] = base64_encode(
    hash_hmac('sha256', $str, $creds['secret_key'], true)
);

// simple GET request to EC2 Query API with regular URL 
// encoded query string
$req = 'https://ec2.amazonaws.com/?' . http_build_query(
    $params
);
$result = file_get_contents($req);

// do something with the XML response
echo $result;