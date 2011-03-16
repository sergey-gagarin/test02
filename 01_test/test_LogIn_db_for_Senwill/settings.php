<?php

/////////////////////////////
 
$include  = str_replace("\\", '/', dirname(__FILE__));


    
$db_host          = 'localhost';
$db_user          = 'root';
$db_password      = '';
$db_database      = '4senwill';

//echo " include == ".$include; == C:/xampp/htdocs/01_test/test_LogInPage

include_once ($include.'/db2.php');
$db = new Database();

?>
