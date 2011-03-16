<?PHP

include("aop.lib.php");


function callBefore($pointcutN=null)
{
    print "<br><div style=\"color: green;\">$pointcutN, CallBefore result: It looks like you are the manager! </div>";
}

function callAfter($pointcutN=null)
{
    print "<div style=\"color: grey;\">$pointcutN, CallAfter results = any time </div>";
}

$aspect1 = new Aspect();
$pc1 = $aspect1->pointcut("call Sample::Sample  or call Sample::Sample2");
$pc1->_before("callBefore('aspect1 Preprocessor');");
$pc1->_after("callAfter('aspect1 Postprocessor');");
$pc1->destroy();


Aspect::apply($aspect1);


Class Sample {
	var $env_var1 = "value1";
	function Sample() {
		Advice::_before($this);
		Advice::_event("SomeEvent", $this);
		print 'Some business logic of Sample<br />';
		Advice::_after($this);
		return $this;
	}
	function Sample2() {
		Advice::_before($this);
		print 'Some business logic of Sample2<br />';
		Advice::_after($this);
	}
	
}

$Sample = new Sample();
$Sample->Sample2();
?>
