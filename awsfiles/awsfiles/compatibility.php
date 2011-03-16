<?php
/**
 * Compatibility check for examples in this article.
 */

// AWS libs require 5.1.2+
if (version_compare(PHP_VERSION, '5.1.2', '<')) {
    die("PHP 5.1.2 or greater required.\n");
}

// hash_hmac check
if (! function_exists('hash_hmac')) {
    die("hash_hmac function required.\n");
}

// sha1 algos
$algos = hash_algos();
if (! in_array('sha1', $algos)) {
    die("sha1 algo missing from ext/hash.\n");
}

// XSL and DOM required by AWS libs
if (! extension_loaded('xsl')) {
    die("XSL extension is required by AWS libs.\n");
}
if (! extension_loaded('dom')) {
    die("DOM extension is required by AWS libs.\n");
}
if (! extension_loaded('xmlreader')) {
    die("XMLReader extension is required by S3 Wrapper.\n");
}

// Optional: ready for the SOAP portions?
if (! extension_loaded('soap') ||
    ! extension_loaded('mcrypt')) {
    echo "!!\n";
    echo "!! You won't be able to run the SOAP examples.\n";
    echo "!!\n";
}

// you're good!
echo "OK! This system is compatible with the examples.\n";