<?php
// keep ourselves honest
error_reporting(E_ALL);
ini_set('display_errors', 'on');
ini_set('log_errors', 'on');
ini_set('error_log', '/tmp/php.log');

// use the config that we set up previously
$creds = parse_ini_file('/etc/aws.conf');
if (! isset($creds['tutorial_file_path'])) {
    $creds['tutorial_file_path'] = sys_get_temp_dir();
}

// set include_path for article's bundled AWS libraries
ini_set('include_path', dirname(__FILE__) 
        . DIRECTORY_SEPARATOR
        . 'AWSforPHP'
        . PATH_SEPARATOR
        . ini_get('include_path'));

// make loading simple
function __autoload($class_name) 
{
    if (class_exists($class_name, false) || 
        interface_exists($class_name, false)) {
        return;
    }
    // AWS and Killersoft classes follow PEAR
    // file naming conventions
    $file = str_replace('_', 
                DIRECTORY_SEPARATOR,
                $class_name
            ) . '.php';
    @include_once $file;
}
