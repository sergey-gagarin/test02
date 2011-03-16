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
include("aop.lib.php");

// The function which changes environment
function increment(&$obj, $param2) {
	print "<div style=\"color: gray;\">{$param2}, Environment Status: ".(++$obj->env_var1)." </div>";
}

$aspect1 = new Aspect();
$pc1 = $aspect1->pointcut("call Sample::Sample  or call Sample::Sample2");
$pc1->_before("increment(\$obj, 'aspect1 Preprocessor');");
$pc1->_after("increment(\$obj, 'aspect1 Postprocessor');");
$pc1->destroy();
$aspect2 = new Aspect();
$pc2 = $aspect2->pointcut("call *::Sample2");
$pc2->_before("increment(\$obj, 'aspect2 Preprocessor');");
$pc2->_after("increment(\$obj, 'aspect2 Preprocessor');");
$pc2->destroy();
$aspect3 = new Aspect();
$pc3 = $aspect3->pointcut("call *::*");
$pc3->_event("SomeEvent", "increment(\$obj, 'aspect3 specified event');");
$pc3->destroy();

Aspect::apply($aspect1);
Aspect::apply($aspect2);
Aspect::apply($aspect3);

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