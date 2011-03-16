<?php
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
 
 /* 
    $sql = "INSERT INTO events 
          (d_start, t_start, dt_end, job_id, title) 
          VALUES('2010-11-16', '22:00:00', '2010-11-16 23:00:00', 5, 'Good Event Title' ) ";
  for($i=1; $i<200; $i++)
  {
    $result = $conn->query ($sql);
  }
 */ 
  // http://www.phpjabbers.com/php--mysql-select-data-and-split-on-pages-php25.html
  
 if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
  $start_from = ($page-1) * 20; 
  $sql = "SELECT * FROM events LIMIT $start_from, 20"; 
  
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
   
   $sql = "SELECT COUNT(title) FROM events"; 
  //$rs_result = mysql_query($sql,$connection); 
  
  $result = $conn->query ($sql);
  
  //$row = mysql_fetch_row($rs_result);
  $row = $result->fetchRow ();
   
  $total_records = $row[0]; 
  $total_pages = ceil($total_records / 20); 
 
  for ($i=1; $i<=$total_pages; $i++) { 
            echo "<a href='start02_pagination.php?page=".$i."'>page ".$i."</a> <br>"; 
}; 


$conn->disconnect();

?>
