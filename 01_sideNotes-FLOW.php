<?php

/*  Read request line  */
	list($aid,$tid,$viewType) = $w->pathMatch(0,1,2);
	
/*  Number  */	
	number_format($number, 2, '.', '');
	
/*  Redirect with parameters normally passed by POST from form */
	$url = $w->localUrl("/operations-schedule/scheduleJobToTeam?form_dateSQL=$dSQL&form_event_type=$type&form_agency_id=$installer_id");
	$w->redirect($url);

//	 $dotw = date('w', $date);
//	 $start = ($dotw == 6 /* Saturday */) ? $date : strtotime('last Saturday', $date);
//	 $end = ($dotw == 5 /* Friday */) ? $date : strtotime('next Friday', $date);

	
	// SQL datetime can keep timeStamp 
	
	// jobs->dt_cancelled is populated as  jobs->dt_cancelled = time()
	// So it will contain timeStamp
		
/*  Substract one array from another */
	// $resArray = $time_hrsArray  - $array_busy  :
			$time_hrs = array_diff($time_hrs, $array_busy);
	
	//The function expects to be given a string containing an English date format 
	//and will try to parse that format into a Unix timestamp 
	//relative to the timestamp given in now, or the current time if now is not supplied.
	$pastdate = strtotime("-45 days");
	echo date("F d, Y", $pastdate); 
	
	
	
	###############################################
	####		DATES							###
	####										###
	####  FROM GIT/test/ sheduleEvent.tpl.php   ###
	####										###
	###############################################
	
	
	$additionalDate = $w->pathMatch('addD');
	$additionalDate = $additionalDate['addD'];
	
	//$w->ctx('additionalDate',$additionalDate);
	aDebug('addDate = '.$additionalDate);
	
	aDebug($_POST);
	
	//read date from the Form field:
	list($day,$month,$year) = explode('/',$w->request('d_start'));
	// read time info from the Form fields:  
	$hrs = $w->request('time_hrs');
	$min = $w->request('time_min');

	// create start date-time:
	aDebug(array('startDateTime:'=>'d_start','$hrs'=>$hrs,'$min'=>$min,'$month'=>$month,'$day'=>$day,'$year'=>$year));
		
	
	// case 1:
	$stampStartDateTime = mktime($hrs, $min, 0, $month, $day, $year);
	// Unreadable stamp on the screen:
	aDebug('$stampStartDateTime = '.$stampStartDateTime);


	//case 2: 
	//with function date() - returns a string formatted according to the given format string using the given integer timestamp 
	//or the current time if no timestamp is given. 
	//So timestamp is optional and defaults to the value of time(). 
	$mysqlStartDateTime = date('Y-m-d',$stampStartDateTime);
	// readable format on the screen:
	aDebug('$mysqlStartDateTime = '.$mysqlStartDateTime);
		
	
	// case 3:
	// String representation:
	$strStartDateTime = $year."-".$month."-".$day." ".$hrs.":".$min;
	aDebug('$strStartDateTime = '.$strStartDateTime);
	
	// building event
	$e = new TestEvent($w);
		
	 $e->fill($_REQUEST);
	 
	 /**
	 * All Cases - 1, 2, 3:
	 * 2010-12-20 08:10:00 - readable format in phpMyAdmin view
	 * BUT
	 * dateStamp representation in output html table:
	 *  [$e->title] => Event 02
     *	[$e->dt_started] => 1292793000
	 *
	 * so $tableLine = date('Y-m-d', $e->dt_started);
	 * shuld be applyed
	 * **/
	 // case 1:
	 // put timeStamp in DB:
	 //$e->dt_started = $stampStartDateTime;
	 
	 // case 2;
	 // put date() string in DB:
	 $e->dt_started = $mysqlStartDateTime;
	 
	 // case 3:
	 // put manually built string in DB:
	 $e->dt_started = $strStartDateTime;
	 	
	 $e->insert();

	 //------------------------------------------------------
	//   Data-Time String OR   Stamp !!!
	//
	//------------------------------------------------------
	
	//Case 1:
		$eventsArray = $this->_db->sql($sql)->fetch_all(); // array
		return $eventsArray;
		
	// then  $e['duration_hrs'] will contain string ==  2011-01-06 18:00:00   !!!!!!!!!!!!!!!!!!
	// threfore list($h,$i) = explode('-',date('h-i', $e['dt_scheduled'])); - invalidsss
	
	// Case 2:
		eventsArray = $this->_db->sql($sql)->fetch_all(); // array
		
		$eventsObjs = $this->fillObjects("OpsEvent", $eventsArray);
		
		return $eventsObjs;
		
	// then $e->dt_scheduled wil contain stamp ! == 1294297200          !!!!!!!!!!!!!!!!!!!!!!!
	// and list($h,$i) = explode('-',date('h-i', $e->dt_scheduled));    Ok!
	
		
###############################################################################################		
	
		##   Automatic DATETIME converting:
		
		
		//in operations/job/editJob_POST  :

		$j->fill($_REQUEST);
		
		// As fill function will try format the $_REQUEST [dt_completed] => No typing 
		//into  DATETIME format of dt_completed field for $j->dt_completed,
		// the $j->dt_completed will have '' in case 'No typing' passed and timestamp elsewhere:
		
		aDebug(array('$j->dt_completed'=>$j->dt_completed,'$j->dt_canceled'=>$j->dt_canceled));
// Display:
//		
// Array
//(
//    [$j->dt_completed] => 
//    [$j->dt_canceled] => 1295442000
//)
//		
		
		$j->dt_completed = $j->dt_completed == '' ? '0000-00-00 00:00:00' : $j->dt_completed;
		$j->dt_canceled = $j->dt_canceled == '' ? '0000-00-00 00:00:00' : $j->dt_canceled;
		
     	$j->update();
     	
     	aDebug($_REQUEST);
     	
     	/**
     	 * 
     	 * Dispaly:
     	 * Array
(
    [type] => GC
    [ident] => GC002002
    [utilities_ident] => 
    [dt_canceled] => 20/01/2011
    [dt_completed] => No typing
    [status] => scheduled
    [extra_tile_roof_aud] => tile_roof
    [extra_enclosure_aud] => enclosure
    [extra_long_cable_aud] => long_cable
    [extra_cable_length] => cable_length
    [FLOW_SID] => jhsj0pri4ip2rms3ov5t5fpfq7
)
**/
		
		
#######################################################################################		
		
		
		
		
		
		
