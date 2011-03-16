<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=windows-1250">
  <meta name="generator" content="PSPad editor, www.pspad.com">
  <title></title>
  
  <script src="calendar.js" type="text/javascript"></script>
  <link href="calendar.css" type="text/css" rel="stylesheet" />
  
  </head>
  <body>
  
<!-- picker:  http://www.openjs.com/scripts/ui/calendar/  -->

  <form method="POST" action="picker5.php">
    <input type="text" name="date" id="date" value="17-06-2009" />
      <script type="text/javascript">
      calendar.set("date");
      </script>
    <input type ="submit" name="select_d" value ="select_date">
  </form>

<?
  if(isset($_POST['select_d'])){
    
    $d=$_POST['date'];
    
    echo "<br> date selected   ".$d." <br>";
     // http://phpclub.ru/detail/article/date_stuff
     echo time()."<br><br>";
     
     $access_date = '2000/05/27';

// ???????  explode()?????????  ?????? ?????? ???????. ? ?????? ?????? 
// $access_date ?????? ?? ??????? / 
 
$date_elements  = explode("/",$access_date);

// ?????
// $date_elements[0] = 2000
// $date_elements[1] = 5
// $date_elements[2] = 27

 $dd=mktime(0,0,0,$date_elements[1],$date_elements[2],$date_elements[0]);
 echo $dd."<br>";

$date = date("Y",$dd);
echo $date."year";
    
  }




?>



  </body>
</html>
