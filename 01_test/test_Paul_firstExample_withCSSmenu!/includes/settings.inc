<?
//-----------------------------------------------------------------------------
//Following 3 lines allow for POST-submitted pages to be cached
//-----------------------------------------------------------------------------
session_cache_limiter('must-revalidate');
Header('Cache-control: public');
Header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
//-----------------------------------------------------------------------------
// Database Connection Information
//-----------------------------------------------------------------------------
$db_host          = 'localhost';
$db_user          = 'root';
$db_password      = '';
$db_database      = 'test';
$db_prefix        = 'test_';

//////////////////////////////////////


//-----------------------------------------------------------------------------
//Site URL & Directory Information
//-----------------------------------------------------------------------------

/////////////////// real /////////////////////////////////////////
//$livesite_url     = 'http://aate.webcraft/';
//$sitemanager_url  = $livesite_url.'sitemanager/';

//$livesite_root    = '/home/sites/www.aate.org.au/web/';
//$sitemanager_root = $livesite_root.'sitemanager/';

//////////////////////////////////////////////////////////

/////////////////// 04-Jun-09 ////////////////////////////
//$livesite_url     = 'http://localhost/Paul/aate/web/';
//$sitemanager_url  = $livesite_url.'sitemanager/';

//$livesite_root    = 'http://localhost/Paul/aate/web/';
//$sitemanager_root = $livesite_root.'sitemanager/';

/////////////////////////////////////////////////////////


//-----------------------------------------------------------------------------
//Other Site-Specific Settings
//-----------------------------------------------------------------------------
//setlocale (LC_TIME, 'en_AU');
//set_magic_quotes_runtime(0);
//$current_time = time();
//-----------------------------------------------------------------------------
?>
