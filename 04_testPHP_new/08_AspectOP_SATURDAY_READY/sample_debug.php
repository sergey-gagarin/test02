<?PHP
/*
	Sample of debug logging cross-cutting concern decomposition 
*/
include("aop.lib.php");
$aspect1 = new Aspect();
$pc1 = $aspect1->pointcut("call Sample::Sample  or call Sample::Sample2  or call Sample::Sample3 or call Sample4::Sample4");
$pc1->_before("\SystemFunc::addLog(&\$obj, &\$AspectObj, \$backtrace);");
$pc1->destroy();
Aspect::apply($aspect1);

// Pointcut functions
Class SystemFunc {
	function addLog($obj, $AspectObj, $backtrace) { 
  		$AspectObj->env["counter"]++;
  		$AspectObj->env["debug"][$AspectObj->env["counter"]] = "";
  		for($i=count($backtrace)-1; $i>=1;$i--) {
  			$Args = array();
			if($backtrace[$i]["args"]) {
				foreach($backtrace[$i]["args"] as $arg) {
					$Args[] = gettype($arg);
				}
			}
			$AspectObj->env["debug"][$AspectObj->env["counter"]] .= $backtrace[$i]["class"]."::".$backtrace[$i]["function"]." (".@join(",",$Args).") ";
			if($i>1) $AspectObj->env["debug"][$AspectObj->env["counter"]] .= "-> ";
		}
   		return true; 
	}
}

// Tracing function
function d($varDump=false) {?><pre style="font-size: 11px;  color: Maroon; font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;"><?print_r($varDump)?></pre><?} 


// Components

Class Sample {
	function Sample() {
		Advice::_before($this);
		print 'Some business logic of Sample<br />';
		$this->Sample2();
		Advice::_after($this);
	}
	function Sample2() {
		Advice::_before($this);
		print 'Some business logic of Sample2<br />';
		$this->Sample3();
		Advice::_after($this);
	}
	function Sample3() {
		Advice::_before($this);
		print 'Some business logic of Sample3<br />';
		$Sample4 = new Sample4("a string", array(1), 10);
		Advice::_after($this);
	}
	
}

Class Sample4 {
	function Sample4($Arg1, $Arg2, $Arg3) {
		Advice::_before($this);
		print 'Some business logic of Sample4<br />';
		Advice::_after($this);
	}
}

$Sample = new Sample();
$Sample->Sample3();

d($aspect1->env["debug"]);
?>