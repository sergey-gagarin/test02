<?PHP
/*
This package can be used to implement Aspect Oriented Programming (AOP, 
http://en.wikipedia.org/wiki/Aspect-oriented_programming) by executing 
the code of classes that enable orthogonal aspects at run-time.

The intention is to provide a means implement orthogonal aspects in separate 
classes that may be interesting add to the application, like logging, caching, 
transaction control, etc., without affecting the main business logic.

The package provides base classes for implementing defining point cuts where 
the code of advice class is called to implement actions of the orthogonal aspects 
that an application may need to enable.

Copyright (c) Dmitry Sheiko http://www.cmsdevelopment.com
*/

if($_GET["view"]) {
	print '<html> 
<head> 
<title>Source Display</title> 
</head> 
<body bgcolor="white"> 
';
   if (!$_GET["view"]) { 
       echo "<br /><b>ERROR: Script Name needed</b><br />"; 
   } else { 
       if (ereg("(\.php|\.inc)$",$_GET["view"])) { 
           echo "<h1>Source of: {$_GET["view"]}</h1>\n<hr />\n"; 
           highlight_file($_GET["view"]); 
       } else { 
           echo "<h1>ERROR: Only PHP or include script names are allowed</h1>"; 
       } 
   } 
   echo "<hr />Processed: ". date("Y/M/d H:i:s", time())."<br /><a href=\"index.php\">Return to list</a>"; 
print ' 
</body> 
</html>';
exit;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>Tutorials of AOP in PHP</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body sytle="padding: 30px; background-color: white">
<h1 style="font-size: 18px">Tutorials of AOP in PHP</h1>
<table cellpadding="5" border="0" style="border: 1px dotted Gray;">
<!--tr><td>Sample of AOP basics</td><td><a href="sample.php">Execute</a></td><td><a href="index.php?view=sample.php">Source</a></td></tr>
<tr><td>Sample of debug logging cross-cutting concern decomposition</td><td><a href="sample_debug.php">Execute</a></td><td><a href="index.php?view=sample_debug.php">Source</a></td></tr>
<tr><td>Sample of perfomance logging cross-cutting concern decomposition</td><td><a href="sample_trace.php">Execute</a></td><td><a href="index.php?view=sample_trace.php">Source</a></td></tr>
<tr><td>Readme</td><td>&nbsp;</td><td><a target="_blank" href="readme.txt">View</a></td></tr-->

<tr><td>Sample of AOP basics</td><td><a href="sample.php">Execute</a></td><td><a href="01_start.php?view=sample.php">Source</a></td></tr>
<tr><td>Sample of debug logging cross-cutting concern decomposition</td><td><a href="sample_debug.php">Execute</a></td><td><a href="01_start.php?view=sample_debug.php">Source</a></td></tr>
<tr><td>Sample of perfomance logging cross-cutting concern decomposition</td><td><a href="sample_trace.php">Execute</a></td><td><a href="01_start.php?view=sample_trace.php">Source</a></td></tr>
<tr><td>Readme</td><td>&nbsp;</td><td><a target="_blank" href="readme.txt">View</a></td></tr>
</table>
<br /><br />
<h1 style="font-size: 18px">Classes diagram</h1>
<img src="uml_aopphp.gif" />
<br /><br />
<h1 style="font-size: 18px">The AOP Way of Customization</h1>
<img src="aop_customization.gif" />
</body>
</html>