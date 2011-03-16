<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=windows-1250">
  <meta name="generator" content="PSPad editor, www.pspad.com">
  <title></title>
  
  <!--script type="text/javascript" src="datepicker.js"></script-->
   <link rel="stylesheet" type="text/css" href="main.css"/>
  
  </head>
  <body>


<h1> The very first page  11111 </h1>

<a href=>Home</a><br>
<a href=p2.php>lint to page 2</a><br>
<a href=p3.php>lint to page 3</a> <br>


<form action="sample13_3.php" method="post">
<p>Example:</p>
<input type="hidden" name="submitted" value="yes" />
Your Name: <input type="text" name="yourname"?
maxlength="150" /><br /><br />
Selection:
<!-- DROP DOWN menu 05_PHP5 p. 515 validation ++ echo "Your Selection: " . $_POST['myselection'] . "<br />"; -->
<select name="myselection">
<option value="nogo">make a selection...</option>
<option value="1">Choice 1</option>
<option value="2">Choice 2</option>
<option value="3">Choice 3</option>
</select><br /><br />
Your Email: <input type="text" name="youremail" maxlength="150" /><br />
<input type="submit" value="Submit" style="margin-top: 10px;" />
</form>

<?php
$num = cal_days_in_month(CAL_GREGORIAN, 8, 2003); // 31
echo "There was $num days in August 2003";
?>


<!------------------------------------------------------------>

<script type="text/javascript">
$(function()
{
	$('#strDateStartedText').datepicker(
	{
		dateFormat: 'd MM yy',
		altField: '#strDateStarted',
		altFormat: 'yy-mm-dd'
	});
});
</script>

<!---------------------------------------------------------------->


<?
if(isset($prm) and $prm > 0){
$m=$prm+$chm;}else{
$m= date("m");}

$d= date("d");     // Finds today's date
$y= date("Y");     // Finds today's year

$no_of_days = date('t',mktime(0,0,0,$m,1,$y)); // This is to calculate number of days in a month

$mn=date('M',mktime(0,0,0,$m,1,$y)); // Month is calculated to display at the top of the calendar

$yn=date('Y',mktime(0,0,0,$m,1,$y)); // Year is calculated to display at the top of the calendar

$j= date('w',mktime(0,0,0,$m,1,$y)); // This will calculate the week day of the first day of the month

for($k=1; $k<=$j; $k++){ // Adjustment of date starting
$adj .="<td>&nbsp;</td>";
}

/// Starting of top line showing name of the days of the week

echo " <table border='1' bordercolor='#FFFF00' cellspacing='0' cellpadding='0' align=center>

<tr><td>";

echo "<table cellspacing='0' cellpadding='0' align=center width='100' border='1'><td align=center bgcolor='#ffff00'><font size='3' face='Tahoma'> <a href='php_calendar.php?prm=$m&chm=-1'><</a> </td><td colspan=5 align=center bgcolor='#ffff00'><font size='3' face='Tahoma'>$mn $yn </td><td align=center bgcolor='#ffff00'><font size='3' face='Tahoma'> <a href='php_calendar.php?prm=$m&chm=1'>></a> </td></tr><tr>";

echo "<td><font size='3' face='Tahoma'><b>Sun</b></font></td><td><font size='3' face='Tahoma'><b>Mon</b></font></td><td><font size='3' face='Tahoma'><b>Tue</b></font></td><td><font size='3' face='Tahoma'><b>Wed</b></font></td><td><font size='3' face='Tahoma'><b>Thu</b></font></td><td><font size='3' face='Tahoma'><b>Fri</b></font></td><td><font size='3' face='Tahoma'><b>Sat</b></font></td></tr><tr>";

////// End of the top line showing name of the days of the week//////////

//////// Starting of the days//////////
for($i=1;$i<=$no_of_days;$i++){
echo $adj."<td valign=top><font size='2' face='Tahoma'>$i<br>"; // This will display the date inside the calendar cell
echo " </font></td>";
$adj='';
$j ++;
if($j==7){echo "</tr><tr>";
$j=0;}

}

echo "<tr><td colspan=7 align=center><font face='Verdana' size='2'><a href='http://www.plus2net.com'><b>plus2net.com Calendar</b></a></font></td></tr>";
echo "</tr></table></td></tr></table>";
echo "<center><font face='Verdana' size='2'><a href=php_calendar.php>Reset PHP Calendar</a></center></font>";

?>



<div class="picker">
  <select class="month">
    <option>Month</option>
    <option>January</option>
    <option>February</option>
    <option>March</option>
    <option>April</option>
    <option>May</option>
    <option>June</option>
    <option>July</option>
    <option>August</option>
    <option>September</option>
    <option>October</option>
    <option>November</option>
    <option>December</option>
  </select>

  <select class="year">
    <option>Year</option>
    <option>2000</option>
    <option>2001</option>
    <option>2002</option>
    <option>2003</option>
    <option>2004</option>
    <option>2005</option>
    <option>2006</option>
    <option>2007</option>
    <option>2008</option>
    <option>2009</option>
  </select>
  
<a href="" class="datelive">1</a><a href=""
class="datelive">2</a><a href="" class="datelive">3</a><a href=""
class="datelive">4</a><a href="" class="datelive">5</a><a href=""
class="datelive">6</a>
  <a href="" class="datelive">7</a><a href=""
class="datelive">8</a><a href="" class="datelive">9</a><a href=""
class="datelive">10</a><a href="" class="datelive">11</a><a
href="" class="datelive">12</a>
  <a href="" class="datelive">13</a><a href=""
class="datelive">14</a><a href="" class="datelive">15</a><a
href="" class="datelive">16</a><a href="" class="datelive">17</a><a href="" class="datelive">18</a>
  <a href="" class="datelive">19</a><a href=""
class="datelive">20</a><a href="" class="datelive">21</a><a
href="" class="datelive">22</a><a href="" class="datelive">23</a><a href="" class="datelive">24</a>
  <a href="" class="datelive">25</a><a href=""
class="datelive">26</a><a href="" class="datelive">27</a><a href="" class="datelive">28</a><a href=""
class="datelive">29</a><a href="" class="datelive">30</a>
  <a href="" class="datelive">31</a><a href=""
class="dateunlive"></a><a href="" class="dateunlive"></a><a
href="" class="dateunlive"></a><a href="" class="dateunlive"></a>

</div>







  </body>
</html>
