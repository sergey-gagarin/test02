<?PHP
/*
	Sample of perfomance logging cross-cutting concern decomposition 
*/
include("aop.lib.php");
$aspect1 = new Aspect();
$pc1 = $aspect1->pointcut("call Sample::Sample  or call Sample::Sample2");
$pc1->_before("\$AspectObj->env['trace/timestamp'] = SystemFunc::getMicrotime();");
$pc1->_after("\$AspectObj->env['trace/info'][] = SystemFunc::getProcessTime(\$AspectObj->env['trace/timestamp'], \$backtrace[1]);");
$pc1->destroy();
Aspect::apply($aspect1);

// Pointcut functions
Class SystemFunc {
	function getMicrotime() { 
  		list($usec, $sec) = explode(" ",microtime()); 
   		return ((float)$usec + (float)$sec); 
	}
	function getProcessTime($LastTimeStamp, $backtrace) { 
		return "Function ".($backtrace["class"]?$backtrace["class"]."::":"").$backtrace["function"].", execution time: ".sprintf('%.4f', SystemFunc::getMicrotime() - $LastTimeStamp)." sec";
	}
}

// Tracing function
function d($varDump=false) {?><pre style="font-size: 11px;  color: Maroon; font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;"><?print_r($varDump)?></pre><?} 


// Components

Class Sample {
	function Sample() {
		Advice::_before($this);
		print 'Some business logic of Sample<br />';
		Advice::_after($this);
	}
	function Sample2() {
		Advice::_before($this);
		print 'Some business logic of Sample2<br />';
		Advice::_after($this);
	}
	
}

$Sample = new Sample();
$Sample->Sample2();
print "<br />Perfomance log:<br />";
d($aspect1->env["trace/info"]);
?>