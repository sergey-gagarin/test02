* @version $Id: readme.txt,v 1.2 2006/01/15 15:58:15 sheiko Exp $ 

Aspect-Oriented Programming PHP API
===================

Version 1.2 - Febrary 2006
---------------------------
http://www.phpclasses.org/browse/package/2633.html

Copyright (C) 2005-2006 Dmitry Sheiko

Requirements:
	PHP version 4.1.x+ (http://www.php.net) 
	Works with UNIX and Windows both
	

Introducion
	
Aspect-oriented programming allows developers to organize cross-cutting concerns into individual declarations - aspects. It provides possibilities to define functionality for specified program execution points JoinPoints (method activation , class construction, access to a class field etc.). Languages that support aspect-oriented programming (AOP) more commonly employ functions for a set of points - Pointcut. The functionality at those points is determined by the program code which is politely referred to as Advice (AspectJ). Thus, aspects describe crosscutting concerns for a specific set of system components. The components themselves include only business logic that they are supposed to implement. During compilation of the program the components are associated with aspects (Weave).

To better grasp the basics of aspect-oriented programming, let us once again consider the example, which involves defining the productivity monitoring aspect. (see Figure 2). Suppose, we want to take the timer readings at entry and exit points of all the methods within such classes as Model, Document, Record and Dispatcher. So, we have to introduce into the Logging aspect a Pointcut with the listing of all the required functions. To cover all of the methods of a certain class, most AOP-supporting languages employ a special mask. Now it is possible to define the needed Pointcut. We set up Advice at the entry (Before) and exit (After) points to the methods listed in the Pointcut. Usually, Advice in AOP-supporting languages is available for such events as Before, After and Around, though sometimes other events are also present.

Thus, the following basic AOP declarations may be singled out:

Aspect is a definition of a certain set of cross-cutting concerns performing a specific task;
Pointcut is a code of an Aspect&#65533;s applicability: defines when and where the functionality of a given aspect may be applied (see Figure 3)
Advice is a code of an object&#65533;s functionality: a direct functionality code for the specified events. In other words, this is what is going to be executed for the objects listed in the Pointcut.

Still too complicated? Well, I think everything will become clear once we introduce some practical examples. Let us begin with the simplest of them: http://www.phpclasses.org/browse/package/2633.html. I wrote this small library with a view to demonstrate both the advantages and availability of AOSD. Besides, you don&#65533;t need to know every detail of PHP or custom software to be able to use this library. It is sufficient just to enable aop.lib.php in your scripts in PHP 4 (or later version) in its standard configuration.

It is possible to define a certain aspect for crosscutting concerns (let&#65533;s say, for keeping transaction log), through initiating the Aspect class:

$aspect1 = new Aspect();

Then we set up a Pointcut and specify the methods it affects:
$pc1 = $aspect1->pointcut("call Sample::Sample  or call Sample::Sample2");

The only thing remaining is to specify the program code for entry and exit points for the methods of the current pointcut:

$pc1->_before("print 'Aspect1 preprocessor<br />';"); 
$pc1->_after("print 'Aspect1 postprocessor<br />';");

In the same way we can define an additional aspect, for example:

$aspect2 = new Aspect();
$pc2 = $aspect2->pointcut("call *::Sample2");
$pc2->_before("print 'Aspect2 preprocessor<br />';"); 
$pc2->_after("print 'Aspect2 postprocessor<br />';");

In order to enable one or several aspects just use the Aspect:::apply() function:

Aspect::apply($aspect1);
Aspect::apply($aspect2);


As you probably know, before PHP 5 emerged handling method and class events was somewhat of a problem. Whereas for global events - for instance, PHP errors, - one can develop a specific handler, for handling events at entry and exit points of methods it is necessary to "manually" insert some kind of "notifiers". In our case we'd need to insert special Advice::_before($this); and Advice::_after($this); functions:

class Sample {
	function Sample() {
		Advice::_before($this);
		print 'Class initilization<br />';
		Advice::_after($this);
		return $this;
	}
	function Sample2() {
		Advice::_before($this);
		print 'Business logic of Sample2<br />';
		Advice::_after($this);	
		return true;
	}	
}

As it is clear from the above example, inserted before and after method's business logic code are "notifiers" for these events. When PHP processor finds such a &#65533;notifier&#65533;, it checks for the active aspects. In case there is one, PHP checks for the current function specified in the Pointcut. If the function is there, it is activated for the given event (for example, for Advice::_before()). As you see, it is quite simple. But what is the practical value of this approach?

Suppose, we have inserted "notifiers" into all the class methods of our scripts and enabled aop.lib.php library. Then one day a need arises to obtain a detailed report on the distribution of workload among the functions of our project. We set up an aspect and define its Pointcut, which includes all functions within the project:

$Monitoring = new Aspect();
$pc3 = $Monitoring->pointcut("call *::*");

As it is clear from the example, it&#65533;s possible to use *::* mask. Then in Advice we can employ a conventional function for the calculation of exact time in milliseconds (ms):

function getMicrotime() { 
  		list($usec, $sec) = explode(" ",microtime()); 
   		return ((float)$usec + (float)$sec); 
	}

With its help we can take time readings at entry points of each of the project&#65533;s functions and compare it with the readings at the functions&#65533; exit points; the obtained time of business logic operations within the body of the function is stored in global report variable. The only thing remaining is to display the report at the end of the program cycle. An example of employing productivity monitoring aspect is presented in the sample_trace.php script found in the archive of the distribution kit.

Lest you should get an impression that AOSD can only be used for certain specific tasks, let us consider another example.

PHP is quite tolerant towards various types of variables. On the one hand, this is a very positive feature for it means that there&#65533;s no need to constantly check for compliance with the specified types and waste time for the declaration. On the other, this could lead to errors.
In case a project contains a huge number of functions, it is hardly possible to remember the syntax we have devised for them. Yet misplacing even one single argument can cause unpredictable changes in a function&#65533;s behaviour. Can AOSD be of help in such situation? Definitely! Let us recall the diagram in Figure 3. As you see, classes Document and Record contain similar methods add, update, delete, copy, get. A well-organized program architecture presupposes similar syntax for these methods: add($id, $data), update($id, $data),  delete($id), copy($id1,$id2), get($id). AOSD can help us to organize the program architecture &#65533; as well as our own activities. We can set up input data validation aspect and define the Pointcut for the Document and Record class methods. The add, update, delete, copy and get entry event function can check for the type of the first argument. If the latter is not integer, an error has surely occurred. It is also possible to set up the second Pointcut for the add and update methods. What is going to be checked in this case is the type of the second argument, which obviously has to correspond to the array type.

In this way we can place transactions logging outside the project business logic; now it is possible at any time to define functions, which require additional checks for security etc.

Of particular interest is the fact that with the help of AOSD we can provide for a specific system error warning to be displayed for a specified set of functions. Suppose, a number of our functions participate in setting up WML (WAP), WSDL (SOAP), RSS/ATOM or SVG mark-up code. Obviously, in this case it is unacceptable to display HTML-code with the error message. The &#65533;notifier&#65533; in PHP error processor will make the system display the message either in XML, or use non-visual means (for example, send a notification via e-mail).

Anyone who at least once participated in the development of commercial software, knows how difficult it is to solve the issue of updating the final product. Certainly, we are all aware of the existence of the version control software &#65533; for instance, CVS (Concurrent Versions System, http://en.wikipedia.org/wiki/Concurrent_Versions_System ).Yet the problem is that every new product, based on the previous one, requires certain customization, and more often than not it is not at all easy to find out whether the update is going to affect areas customized for a specific project. Some of you have surely encountered cases when after an update you had to restore the whole project from back-up copies. And now just try to imagine a case when &#65533;disappearance&#65533; of customized features is noticed only a long time after the update! &#65533;Well, where does AOSD come in?&#65533; you may ask. The thing is that AOSD can exactly enable us to address this issue: the whole customization code can be placed outside the project&#65533;s business logic as crosscutting concerns. You only have to define the Aspect of interest, specify the area of its application (Pointcut) and elaborate the corresponding functionality code. It is worthwhile trying to imagine how exactly this is going to work.

Let us recall my favourite example featuring content management software. Such product is sure to contain a function for displaying recordsets Record::getList() and developing code for these sets View::applyList(). Within arguments Record::getList() receives a recordset indicator and data selection parameters. This function produces an array with data on the results of selection. View::applyList() function receives this array at the input point and generates the format code &#65533; for example, HTML code for a table. Suppose, in our product a goods catalogue is presented as such recordsets. This is a universal solution for a commercial product, yet for every specific project based on this product it is necessary to introduce into the sets an additional column. For instance, tables in the original product have Stock Number and Item fields, while we need to add one more, Customer Rating field. In order to do this, we write Advice for the function Record::getList(), which establishes that an additional column is inserted into the returned array at the end of the runtime. 
If the View::applyList() function is incapable of adjusting itself automatically for the changes in the input array, then we shall have to write Advice for this function as well.
Let us assume that later on the client demands that we should mark out all the entries in the sets, which include goods not found in store at the moment. In this case we add Advice for the View::applyList() function, in which we check for the value of the Available in store attribute. Notice that we may set up a separate Plugins folder for aspects declarations and scripts that include their funcyionality. Thus, we shall have a complete set of customization features for any sort of a project stored in one specified folder, and there will be no upgrading problems whatsoever. We&#65533;ll be able to easily upgrade any system scripts, except for those stored in the Plugins folder.



Yours sincerely,
Dmitry Sheiko,
http://www.cmsdevelopment.com,
senior web developer at Red Graphic Systems (www.redgraphic.com) 



    * http://en.wikipedia.org/wiki/Aspect-oriented_programming
    * http://eclipse.org/aspectj/
    * http://phpaspect.org/
    * http://www.aophp.net/
    * http://www.seasar.org/en/php5/index.html
    * http://www.phpclasses.org/browse/package/2633.html
    * http://www.informit.com/articles/article.asp?p=375541&rl=1
    * http://www.devx.com/Java/Article/28422
    * http://www.scriptol.org/history.php
    * http://www.ercim.org/publication/Ercim_News/enw58/mens.html
    * http://www.cs.ucl.ac.uk/staff/C.Courbis/papers/12jan04Board.ppt
    * http://www.computerworld.com/developmenttopics/development/story/0,10801,85621,00.html


WWW:   http://dsheiko.com/weblog/aspect-oriented-software-development-and-php 


