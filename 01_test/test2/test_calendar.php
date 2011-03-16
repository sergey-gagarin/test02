
<div class='jobs'>
<h1>     Jobs  Calendar   </h1>


<?php

//////////////////////////////////////////////////////////////////
  
 // $today = date("d F Y");
  $t_day = date("Y-m-d");
   echo "DATE:    ".$t_day."<br><br>";
//   echo "DATE:    ".(date("d F Y")+1)."<br>";  // for calendar
//   echo "     DATE 2:    ".date("Y-m-d")."<br>"; 
//   echo "  33 DATE:  ".(date("m-d")-1)."<br>";
   $t_w =  mktime ( 0 , 0 , 0 ,  date ( "m" ) ,  date ( "d" )+ 1 ,  date ( "Y" )); 
   echo "tomorrow   ".date("Y-m-d",$t_w)."<br>";
   
   $y_day = mktime ( 0 , 0 , 0 ,  date ( "m" ) ,  date ( "d" )- 1 ,  date ( "Y" )); 
   echo "yesterday   ".date("Y-m-d",$y_day)."<br>";
   
   //$ddd = mktime($t_day);  // - no way
   $ddd = strtotime($t_day); // timestamp
   
   echo "strtotime, then date from t_day  == today again ".date("Y-m-d",$ddd)."<br>";
   
  // 1 - read day from current $ddd 
   echo "current day = t_day  ".date("d",$ddd)."<br>";
  // 1 - read day from current $ddd
   $cur_d = date("d",$ddd);
  // 2 - add 1 day
   $tom_d = $cur_d+1;
  // 3 - make timestamp of new date
   $tomor = mktime ( 0 , 0 , 0 ,  date ( "m" ) ,  $tom_d ,  date ( "Y" ));
  // 4 - convert timestamp of new date to normal format 
   echo "day tomor = ".date("Y-m-d",$tomor)."<br>";
   

///////////////////////////////  to do ////////////////////////////////////////
if(isset($_POST['next'])){
    $c=$_POST['current'];
    
    $day=mktime ( 0 , 0 , 0 ,  date ( "m" ) ,  date ( "d" )+ 1 ,  date ( "Y" ));
    $current = date("Y-m-d",$day);
    show_all($current);
    }
    
if(isset($_POST['prev'])){
  $c=$_POST['current'];
  
  $day=mktime ( 0 , 0 , 0 ,  date ( "m" ) ,  date ( "d" )- 1 ,  date ( "Y" ));
  $current = date("Y-m-d",$day);
  show_all($current);
  }


////////////////////////////////////////////////////////////////////////////

// --------------- show ----------------------------------------
if(!isset($_POST['prev'])&&!isset($_POST['next'])){show_all();}

//----------------------------------------------------------------------------

// -------------------------------------------------------
function show_all($d=''){

  if($d==''){$d=date("Y-m-d");}
  //$d = '2009-06-25';  // testing
/////////////////////////////  reset date form ///////////////////////////////

  print "<form method='POST' action='test_calendar.php'>";
  print "<input type ='submit' name='prev' value ='<' > 
                  DATE: ".$d."
        <input type ='submit' name='next' value ='>' >  
        
        <input type='hidden' name='current' value='$d'>
        </form>   <br><br>";
  
  
  
  echo "<br><br>  Current date from show_all()  :     ".$d."<br>";

}
//------------------------------------------------------------------------------
?>


</div>
