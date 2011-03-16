<?php


$rows = $this->_db->fetch_all();
            return $this->fillObjects("Movies", $rows);




//to use in assets ?
SELECT * FROM `ops_event` order by `dt_scheduled`, `installer_agency_id`, `installer_team_id` 

Find last day of the last day   
select LAST_DAY(DATE_SUB(curdate(), INTERVAL 1 MONTH))


$comments = $w->db->get("sales_comments")->where("est_id",$w->ctx('id'))->order_by("dt_created")->fetch_all(); // returns not objects but 2D-array
	$w->ctx("comments",$comments);
	
	$sss = "select period_diff(date_format(now(), '%Y%m'), DATE_FORMAT(`acquired_date`,'%Y%m')) as months from asset where `id`=".$r->id;
	
//--------------------------------------------------------------------------------------------	
// select cancelled or not cancelled events:

	if($_SESSION['filter_canceled'])
		{
			$andCanceled = " AND DATE_FORMAT(`dt_cancelled`, '%Y-%m-%d') <> '0000-00-00' ";
		}else{
			$andCanceled = " AND DATE_FORMAT(`dt_cancelled`, '%Y-%m-%d')  = '0000-00-00' ";
		}
		
		
//------------------------------------------------------------example can be seen in class MoviesService extends DbService -----------------		
	function getFilteredEvents($dStamp)
	{
		
		if(!$dStamp) return null;
		
		// ok $sql = "SELECT * FROM test_events WHERE DATE_FORMAT(`dt_started`,'%Y-%m-%d') > '".$dSQL."'";
		$sql = "SELECT * FROM test_events WHERE DATE_FORMAT(`dt_started`,'%Y-%m-%d') > '".date('Y-m-d', $dStamp)."'";
		
		$eventsArray = $this->w->db->sql($sql)->fetch_all(); // array
		// or $this->_db-> ...
		
		//aDebug($eventsArray);
		
		$eventsObjs = $this->fillObjects("TestEvent", $eventsArray);
		
		return  $eventsObjs;
	
	}		
	
	//------------------------------------------------------
	//   Data-Time String OR   Stamp !!!
	//
	//------------------------------------------------------
	
	//Case 1:
		$eventsArray = $this->_db->sql($sql)->fetch_all(); // array
		return $eventsArray;
		
	// then  $e['duration_hrs'] will contain string ==  2011-01-06 18:00:00
	// threfore list($h,$i) = explode('-',date('h-i', $e['dt_scheduled'])); - invalidsss
	
	// Case 2:
		eventsArray = $this->_db->sql($sql)->fetch_all(); // array
		
		$eventsObjs = $this->fillObjects("OpsEvent", $eventsArray);
		
		return $eventsObjs;
		
	// then $e->dt_scheduled wil contain stamp  == 1294297200  !!
	// and list($h,$i) = explode('-',date('h-i', $e->dt_scheduled));    Ok!
	
		
INSERT INTO `flow`.`ops_team_blocked_dates` (
`id` ,
`team_id` ,
`date` ,
`description` ,
`is_deleted`
)
VALUES (
NULL , '1', '2011-04-22', 'Easter', '0'
);


GOOD for COMMENTS Update:

INSERT INTO
flow_comment
( obj_table,obj_id, comment, creator_id, dt_created, is_deleted )
SELECT
'ops_job', id as obj_id, comment, user_id as creator_id, dt_created, is_deleted
FROM
ops_comment

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	