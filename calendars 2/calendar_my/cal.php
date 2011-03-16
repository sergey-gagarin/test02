<?php
/**
 * Enter description here ...
 * 
 */
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="content-type"
	content="text/html; charset=windows-1250">
<link rel="stylesheet" type="text/css" href="style.css" />
<title></title>
</head>
<body>
<h1>Jobs Calendar</h1>

<?
if(isset($_GET['date']) == TRUE) {
	$explodeddate = explode("-", $_GET['date']);
	$month = $explodeddate[0];
	$year = $explodeddate[1];
	$numdays = date("t", mktime(0, 0, 0, $month,  1, $year)); // mktime( 1st of the given month)
	// echo " num days = ".$numdays."<br><br>";
} else {
	$month = date("n", mktime());
	$numdays = date("t", mktime());
	$year = date("Y", mktime());
	//   echo " num days = ".$numdays."<br><br>";
}

$displaydate = date("F Y", mktime(0, 0, 0, $month, 1, $year));

if($month == 1) {
	$prevdate = "12-" . ($year-1);
}else {
	$prevdate = ($month-1) . "-" . $year;
}
if($month == 12) {
	$nextdate = "1-" . ($year+1);
} else {
	$nextdate = ($month+1) . "-" . $year;
}


// --- < date > -----------------
print "<br><a href='cal.php?date=".$prevdate."'>
          <img src='img/arrowleft.gif' width='15' height='15' border='0'></a> ".$displaydate.
        " <a href='cal.php?date=".$nextdate."'><img src='img/arrowright.gif' border='0' width='15' height='15'></a>";

?>


<?php

$cols = 7;
$weekday = date("w", mktime(0, 0, 0, $month, 1, $year));
$numrows = ceil(($numdays + $weekday) / $cols);
echo "<br />";
echo "<table class='cal' cellspacing=0 cellpadding=5 border=0>";
print "<tr> <th class='cal'>Sunday</th> <th class='cal'>Monday</th>";
print "<th class='cal'>Tuesday</th> <th class='cal'>Wednesday</th> <th class='cal'>Thursday</th>";
print "<th class='cal'>Friday</th> <th class='cal'>Saturday</th> </tr>";
$counter = 1;  // current day-date for dates cells
$newcounter = 1; // current day-date for job cells

################### The first DATES row  ####################
echo "<tr>";
$daysleft = 7-(7-$weekday);

// previous month days - no dates
for($f=0;$f<$daysleft;$f++) {
	echo "<td class='cal_date' width='110' height='10'>";
	echo "</td>";
}

// this month days start Dates:

for($f=$daysleft;$f<=($cols-1);$f++) {
	echo "<td class='cal_date' width='100' height='10'>";
	$display = date("jS", mktime(0, 0, 0, $month, $counter, $year));
	$todayday = date("d");
	$todaymonth = date("n");
	$todayyear = date("Y");
	if($counter == $todayday AND $month == $todaymonth AND $year == $todayyear) {
		echo "<strong>TODAY " . $display . "</strong>";
	}else {
		echo $display;
	}
	echo "</td>";
	$counter++;
}
echo "</tr>";

################### The first JOBS row  ####################
// empty cells - previous month days - no jobs
echo "<tr>";
for($f=0;$f<$daysleft;$f++) {
	echo "<td class='cal' width='110' height='10'>";

	echo "</td>";
}

// this month - the first row

for($f=$daysleft;$f<=($cols-1);$f++) {
	echo "<td class='cal' width='110' height='40'>";
	$date = $year . "-" . $month . "-" . $newcounter;

	$ddd = $date;
	echo "<a href='' > Install</a>";
	echo "</td>";

	$newcounter++;
}
echo "</tr>";

################### The REST OF THE ROWS  ####################

for($i=1;$i<=($numrows-1);$i++) {
	echo "<tr>";
	// --- dates row --------------------------------------------
	for($a=0;$a<=($cols-1);$a++) {
		echo "<td class='cal_date' width='110' height='10'>";
		$display = date("jS", mktime(0, 0, 0, $month, $counter,$year));
		$todayday = date("d");
		$todaymonth = date("n");
		$todayyear = date("Y");

		if($counter <= $numdays) {
			if($counter == $todayday AND $month == $todaymonth AND $year == $todayyear) {
				echo "<strong>TODAY " . $display . "</strong>";
			}else {
				echo $display;
			}
		}
		echo "</td>";

		$counter++;
	}
	echo "</tr>";

	// ---------------- jobs row ----------------------------------
	echo "<tr>";
	for($aa=1;$aa<=$cols;$aa++) {
		echo "<td class='cal' width='110' height='100'>";
		if($newcounter<=$numdays) {
			$date = $year . "-" . $month . "-" . $newcounter;
			// SELECT all jobs for this $date for all crews
			$_h = 100;
			$cr1 = array('id'=>1,'load'=>8); $h1 = ($_h/8)*8;
			$cr2 = array('id'=>2,'load'=>2); $h2 = ($_h/8)*2;
			$cr3 = array('id'=>3,'load'=>6); $h3 = ($_h/8)*6;
			$cell_w = 110;
			//rect width for 1 crew // rect height = 40
			$r_w = 10;

			echo "<div id='".$cr1['id']."' style=\"width:10px; height:".$h1."px; background: green; float:left;\"></div>";
			echo "<div id='".$cr2['id']."' style=\"width:10px; height:".$h2."px; background: #3399cc; float:left;\"></div>";
			echo "<div id='".$cr3['id']."' style=\"width:10px; height:".$h3."px; background: #ff9999; float:left;\"></div>";
			echo "<div id='".$cr3['id']."' style=\"width:10px; height:50px; background: red; float:left;\"></div>";
			echo "<div id='".$cr3['id']."' style=\"width:10px; height:80px; background: #ff9999; float:left;\"></div>";
			//echo "<a href=''> Install</a>";

			echo "</td>";
		}


		$newcounter++;
		//echo "  newcounter =".$newcounter;
	}
	echo "</tr>";
}


echo "</table>";



?>
<div
	style="width: 100px; height: 100px; background: green; float: left;"></div>
<div style="width: 100px; height: 100px; background: red; float: left;"></div>