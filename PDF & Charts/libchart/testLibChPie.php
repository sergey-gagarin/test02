<?php

	include "libchart/classes/libchart.php";

	$chart = new PieChart();

	$dataSet = new XYDataSet();
	$dataSet->addPoint(new Point("Mozilla Firefox (80)", 80));
	$dataSet->addPoint(new Point("Konqueror (75)", 75));
	$dataSet->addPoint(new Point("Opera (50)", 50));
	$dataSet->addPoint(new Point("Safari (37)", 37));
	$dataSet->addPoint(new Point("Dillo (37)", 37));
	$dataSet->addPoint(new Point("Other (72)", 70));
	$chart->setDataSet($dataSet);

	$chart->setTitle("User agents for www.example.com");
	$chart->render("testlibChPie.png");
	
	
	$chart = new VerticalBarChart();

	$dataSet = new XYDataSet();
	$dataSet->addPoint(new Point("Jan 2005", 273));
	$dataSet->addPoint(new Point("Feb 2005", 421));
	$dataSet->addPoint(new Point("March 2005", 642));
	$dataSet->addPoint(new Point("April 2005", 800));
	$dataSet->addPoint(new Point("May 2005", 1200));
	$dataSet->addPoint(new Point("June 2005", 1500));
	$dataSet->addPoint(new Point("July 2005", 2600));
	$chart->setDataSet($dataSet);

	$chart->setTitle("Monthly usage for www.example.com");
	$chart->render("testBarChart.png");
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Test Libchart</title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
</head>
<body>
	<img alt="Pie chart"  src="testlibChPie.png" style="border: 1px solid gray;"/>
	<br /><br />
	<img alt="Pie chart"  src="testBarChart.png" style="border: 1px solid gray;"/>
</body>
</html>

