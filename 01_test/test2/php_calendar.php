<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=windows-1250">
  <meta name="generator" content="PSPad editor, www.pspad.com">
  <title></title>
  
  <!--script type="text/javascript" src="datepicker.js"></script-->

  
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
// http://www.plus2net.com/php_tutorial/php_calendar.php
// need use of $POST to pass $prm=-1 == to change month
if(isset($prm) and $prm > 0){
$m=$prm+$chm;}else{
$m= date("m");}

$d= date("d");     // Finds today's date
$y= date("Y");     // Finds today's year

$no_of_days = date('t',mktime(0,0,0,$m,1,$y)); // This is to calculate number of days in a month

$mn=date('M',mktime(0,0,0,$m,1,$y)); // Month is calculated to display at the top of the calendar

$yn=date('Y',mktime(0,0,0,$m,1,$y)); // Year is calculated to display at the top of the calendar

$j= date('w',mktime(0,0,0,$m,1,$y)); // This will calculate the week day of the first day of the month

echo "<br> prm = ".$prm.";  month m = ".$m."; no of days =".$no_of_days.";    
           ;  Month = mn =".$mn.";  year = ".$yn." 
      <br>";


for($k=1; $k<=$j; $k++){ // Adjustment of date starting
$adj .="<td>&nbsp;</td>";
}

/// Starting of top line showing name of the days of the week

echo " <table border='1' bordercolor='#FFFF00' cellspacing='0' cellpadding='0' align=center>

<tr><td>";

echo "<table cellspacing='0' cellpadding='0' align=center width='100' border='1'>
        <td align=center bgcolor='#ffff00'><font size='3' face='Tahoma'> 
            <a href='php_calendar.php?prm=$m&chm=-1'><</a> </td>

        <td colspan=5 align=center bgcolor='#ffff00'><font size='3' face='Tahoma'>$mn $yn </td>

        <td align=center bgcolor='#ffff00'><font size='3' face='Tahoma'> 
            <a href='php_calendar.php?prm=$m&chm=1'>></a> </td>
       </tr>
       <tr>";

echo "<td><font size='3' face='Tahoma'><b>Sun</b></font></td>
      <td><font size='3' face='Tahoma'><b>Mon</b></font></td>
      <td><font size='3' face='Tahoma'><b>Tue</b></font></td>
      <td><font size='3' face='Tahoma'><b>Wed</b></font></td>
      <td><font size='3' face='Tahoma'><b>Thu</b></font></td>
      <td><font size='3' face='Tahoma'><b>Fri</b></font></td>
      <td><font size='3' face='Tahoma'><b>Sat</b></font></td></tr>
      <tr>";

////// End of the top line showing name of the days of the week//////////

//////// Starting of the days//////////
for($i=1;$i<=$no_of_days;$i++){
echo $adj."<td valign=top><font size='2' face='Tahoma'>$i<br>"; // This will display the date inside the calendar cell
echo " </font></td>";
$adj='';
$j ++;
if($j==7){echo "</tr>  
                <tr>";
$j=0;}

}

//echo "<tr><td colspan=7 align=center><font face='Verdana' size='2'><a href='http://www.plus2net.com'><b>plus2net.com Calendar</b></a></font></td></tr>";
echo "</tr></table></td></tr></table>";
echo "<center><font face='Verdana' size='2'><a href=php_calendar.php>Reset PHP Calendar</a></center></font>";

?>






  </body>
</html>
