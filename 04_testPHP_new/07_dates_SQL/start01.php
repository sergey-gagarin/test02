<?php
############################
## PHP framework: http://codeigniter.com/user_guide/
## DB flow-class Crystal : http://crystal-project.net/
##
##
############################




// check http://www.nusphere.com/products/library/script_peardb.pdf
 ###################################
 ##      Connect and read all    ###
 ###################################  
 require_once 'DB.php';

  $dsn = "mysql://root:@localhost/04_test";
  $conn = DB::connect ($dsn);
  if (DB::isError ($conn))
  {
    die ("Cannot connect: " . $conn->getMessage () . "\n");
  }
  
    $sql = "INSERT INTO events 
          (d_start, t_start, dt_end, job_id, title) 
          VALUES('2010-11-16', '22:00:00', '2010-11-16 23:00:00', 5, 'Good Event Title' ) ";
  for($i=1; $i<200; $i++)
  {
    $result = $conn->query ($sql);
  }
  
 // $sql = "select * from events";
 $d = "2010-11-14"  ;
    $sql = "select * from events where `d_start`>'2010-11-14'";   // Ok!!
    $sql = "select * from events where `d_start`>'".$d."'";         // Ok!!
    $sql = "select * from events "; 
    
  $result = $conn->query ($sql);
  if (DB::isError ($result))
  {
    die ("query failed " . $result->getMessage () . "\n");
  }
  

  
  $events = array();
  while ($row = $result->fetchRow ())
  {
    array_push($events, $row);  
  }
  $result->free ();

  $conn->disconnect();

  ########################################
  #     Time  table                    ###
  ########################################

    $buf = "<table border='1'><td>Id</td> <td>Title</td>  <td>Date start</td>  <td>Time start</td>  <td>DT end</td>  <td>Job ID</td>";
  
   foreach($events as $e)
   {
        
        $title   = $e[5];
        $d_start = $e[1];
        $t_start = $e[2];
        $dt_end  = $e[3];
        $job_id  = $e[4];
       
       
        $buf .= "<tr> <td>".$e[0]."</td> <td>".$title."</td><td>".$d_start."</td><td>".$t_start."</td><td>".$dt_end."</td><td>".
                $job_id."</td></tr>";
   
   
   }    

   $buf .= "</table>";
   print $buf;
   
   
  ########################################
  #     Dates  Comparison              ###
  ########################################
   
   print "<h3>Dates Comparison 1</h3>";
   
   $date = '2010-11-14';
   
   foreach($events as $e)
   {
    if($e[1] > $date)
    {
      print " Start date of Event: ".$e[5]." s_date - ".$e[1]."  >  ".$date."<br>";
    }
   }
   
  // comparison 
  // if($e[3] > $date) whre $e[3]-datetime is always TRUE.
  // so it doesn't work this way
  //
  //Then to compare date and date in datetime:
  //1. get date from datetime:
  //   two ways:
  //    1.substring; 
  //    2. apply $d=strtotime(datetime) - get Unix timestamp, then to str with date('Y-m-d', $d);
  //2.  compare str representation in SQL format(yyyy-mm-dd) again.  
  //

   $e = $events[2];
   var_dump($e);
   $dateFromSQL = substr($e[3],0,10);
   print "<h3> Converting SQL datetime into date</h3>" ;
   print "1. No convertion of SQL datetime into Unix timestamp, just substring: ".$dateFromSQL ;
   print "<br>";
   print "<br>";
  
  // strtotime — work with Strings - Parse about any English textual datetime description (string)
  // into a Unix timestamp
  //
  //  mktime(0, 0, 0, 7, 1, 2000) - mktime — Get Unix timestamp for a date
  // The DIFFERENCE is - arguments 
  
  $dateFromSQL = strtotime($e[3]);
   print "2. <br> 2.1. From mySQL string to Unix timestamp with strtotime:  ".$dateFromSQL ;
   
   print "<br>";
   print "2.2. Then from timestamp to formatted date with date(): ".date('Y-m-d', $dateFromSQL);
   print "<br>";
   print "2.3. Time from timestamp to formatted date with date(): ".date('h:m:s', $dateFromSQL);
   
   
   print "<br>";
   
   //----------------------------------------------------
   //--   Building date or datetime for given
   //--    given y,m,d, h,min values    h,min,s, month, day,year
   //----------------------------------------------------
   
    $stamp = mktime(15,10,00, 11,15,2010);
    $dateSQL = date('Y-m-d', $stamp);
    print " SQL date = ".$dateSQL;
    print "<br>"; 
    
    
     $buf = "<table border='1'><td>Id</td> <td>Title</td>  <td>Date start</td>  <td>Time start</td>  <td>DT end</td>  <td>Job ID</td>";
  
    
   $date = '2010-11-14'; 
   foreach($events as $e)
   {
      $dateSQL = date('Y-m-d',strtotime($e[3]));
      if($dateSQL > $date)
      {
        $title   = $e[5];
        $d_start = $e[1];
        $t_start = $e[2];
        $dt_end  = $e[3];
        $job_id  = $e[4];
       
       
       $buf .= "<tr> <td>".$e[0]."</td> <td>".$title."</td><td>".$d_start."</td><td>".$t_start."</td><td>".$dt_end."</td><td>".
                $job_id."</td></tr>";
   
   
      }    
   }
      
    $buf .= "</table>";
    print $buf;
    
    
    #########################
    FROM FLOW
    
    ############################
  //   in DB stamp only is recorded, so retrieve date from it: 	
  //  print "<br> date() date-time canceled=".date('d/m/Y', ($j->dt_cancelled));
//    	print "<br> date-time canceled=".$j->dt_cancelled;
    
    
    
    
    
    
    
    
    
   
   
  ########################################
  #     Dates difference               ###
  ######################################## 
    
    // days difference: http://www.prettyscripts.com/code/php/php-date-difference-in-days
    // 1. gregoriantojd(12, 25, 2010) - gregoriantojd(2, 19, 2010);
    // 2. strtotime('2010-12-25') - strtotime('2010-2-19') / 
    // and /( 60 * 60 * 24) // seconds in a day
 
#
# Get current time
#
#$date1 = time();
#
#
# Get the timestamp of 2006 October 20
#
#$date2 = mktime(0,0,0,10,20,2006);
#
#$dateDiff = $date1 - $date2;
#
#$fullDays = floor($dateDiff/(60*60*24));
#
#echo "Differernce is $fullDays days";
/**
 *http://www.plus2net.com/php_tutorial/date-diff.php - with more reading
 *$d1=mktime(22,0,0,1,1,2007);
$d2=mktime(0,0,0,1,2,2007);
echo "Hours difference = ".floor(($d2-$d1)/3600) . "<br>";
echo "Minutes difference = ".floor(($d2-$d1)/60) . "<br>";
echo "Seconds difference = " .($d2-$d1). "<br>";


echo "Month difference = ".floor(($d2-$d1)/2628000) . "<br>";
echo "Days difference = ".floor(($d2-$d1)/86400) . "<br>";
echo "Year difference = ".floor(($d2-$d1)/31536000) . "<br>";
 * **/ 
  
  
  