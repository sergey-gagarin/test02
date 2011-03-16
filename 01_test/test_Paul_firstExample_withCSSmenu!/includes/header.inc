<?

$include  = str_replace("\\", '/', dirname(__FILE__));
$site_url = 'http://localhost/Paul/test/';

include_once ($include.'/settings.inc');
//include_once ($include.'/DataBase.inc');
include_once ($include.'/db2.php');
$db = new Database();

list($d,$m,$y) = split('/',date('d/m/Y'));
$start_of_day = mktime(0,0,0,$m,$d,$y);

//-----------------------------------------------------------------------------
//Load site settings
//-----------------------------------------------------------------------------
//$sitesettings = new DatabaseObject($db_prefix.'site_settings', 'id');
//$sitesettings->load(1);
//include_once ($include.'/sessions.inc');
//-----------------------------------------------------------------------------
//$db->execute('select id from '.$db_prefix.'visits where ip="'.$_SERVER['REMOTE_ADDR'].'" and time>'.$start_of_day.' order by time desc');
//if ($db->row_count()==0)
//{
//   $db->execute_nr('insert into '.$db_prefix.'visits (ip, time) values ("'.$_SERVER['REMOTE_ADDR'].'", '.$current_time.')');
//   $sitesettings->counter++;
//   $sitesettings->save();
//}
?>


