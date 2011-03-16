<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=windows-1250">
  
  <title>Arrays</title>
  </head>
  <body>




  <table border='1' >
        <thead>
        <tr><td>Zebra</td></tr>
         <tr>
          <th> Check </th>
          <th> Info </th>
          <th> Item id</th>
         </tr>
        </thead>

<?php

  $Items = array(
    item1 => array('info' => 'content of the First info-item 1',
                    'id' => '11'), 
    item2 => array('info' => 'content of the Second info-item 2',
                    'id' => '22'),
  
    item3 => array('info' => 'content of the Third info-item 3',
                    'id' => '33'),
  
  );
          $r = 0;
         foreach($Items as $item) :
             echo "<tr class='class".$r."'>";
            
             echo "<td><input type='checkbox' name='checked[]' value=".$item[id]."></td>";
             
             echo "<td>   $item[info]  </td>";
             echo "<td>   $item[id]   </td>";
             echo "</tr>";
             $r=1-$r;
         endforeach
?>
          </table>
  <?   
  
   echo "<h2> Arrays 2D </h2> <pre>";
    print_r($Items);
  echo "</pre>";
?>







<?php

  echo "<h2>List it in list():</h2>";
     // from the First book !!!
     
     $line = "sJohn | onTheGo | str. No way | 0000-9999";
     print "The line was : ".$line.'; Then list() :  list($name,$s_name,$address,$contact) = explode("|",$line)'."<br>";
     list($name,$s_name,$address,$contact) = explode("|",$line);
     print "Name (UpperCase): ".ucwords($name)." <br>"; 
     print "S_Name: $s_name <br>";
     print "Address: $address <br>";
     print "Contact: $contact <br>";
   

echo "<h1>Arrays </h1>";

  $favmovies = array (
                      "Stripes",
                      "Terminator 2",
                      "Matrix",            
                      "Caddy",
                      "Big boy",
                      "Karate Kid"
                      );
  $favmovies[] = "Long kiss";

  echo "<h2> dump with pre print_r </h2>";
  
  echo "<pre>";
  print_r($favmovies);
  echo "</pre>";
  
   ///  Sort it
  echo "Unsorted :"; print_r($favmovies);
  if(is_array($favmovies)){  sort($favmovies); }
   echo "<br />Sorted :"; print_r($favmovies); 
   $index = 0;
   
   echo '<h3> WHILE $index < count($favmovies)  { echo pos($favmovies) } </h3>';
   while ($index<count($favmovies)){
   	//current — Return the current element in an array
      echo current($favmovies)."<br />";
      next($favmovies);
      $index++;
   }
   reset($favmovies);
   
   // next — Advance the internal array pointer of an array
   // This function may return Boolean FALSE, but may also return a non-Boolean value which evaluates to FALSE,
   // such as 0 or ""
   // so no "" in the array allowed!
   while ((bool)next($favmovies)){
   	//current — Return the current element in an array
      echo current($favmovies)."<br />";

   }
  
  
 
  // Sorting:
  echo "<h2>Not so Good sorting  with sort()</h2>";
   $states = array("OH" => "Ohio", "CA" => "California", "MD" => "Maryland");
    sort($states);
    print_r($states);    // Array ( [0] => California [1] => Maryland [2] => Ohio )
  echo "<h2>The better one sorting with asort()</h2>";
   $states = array("OH" => "Ohio", "CA" => "California", "MD" => "Maryland");
   asort($states);
   print_r($states);
   
   
   
////////////////////////// 2 dem /////////////////////////////////////////////   
  
  
  
  echo "Prosessing is in the forms" ;
 ///////////////////////////////////////////////////////////////////////////////
 
 
 echo "<h3> User defined sort is in First Book - Arrays</h3>"; 
 
 echo "<h3>From First Book</h1>";
   $capitals = array("Ohio" => "Columbus", "Iowa" => "Des Moines", "Arizona" => "Phoenix");
  echo "<p>Can you name the capitals of these states?</p>";
  
  // you will not enter the while if it is [0][1] - indexed array
// $key = 0, while will consider $key as false
  while($key = key($capitals)) {
    echo $key." => ";
    echo $capitals[$key]."<br />";
    next($capitals);
  }
  
  // the better one:
//	  reset($tab);
//	while (!is_null($key = key($tab) ) ) {
//	echo $tab[$key];
//	next($tab);
//	}
  
  // the other way current() return FALSE if the end is reached
  while(current($jobsInfoForMapArray))
	{
			
			$key = key($jobsInfoForMapArray);
			$val = $jobsInfoForMapArray[$key];
			print "<input type='hidden' size='200' class='jobsInfoForMap' name='$key' id='$key' value='$val' >";
			print "<input type='text' size='200' class='AjobsInfoForMap' name='$key' id='$key' value='$val' >";
			next($jobsInfoForMapArray);  // return FALSE if no more elements
		}
  
  
  foreach($capitals as $c)
  {
      print $c."<br>";
  }
  

?>
