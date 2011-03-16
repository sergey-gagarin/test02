<?php


	print "<h3>1. print array() results </h3>";

	$a = array("array-1","array-2","array-3","array-4","array-5");
	assetDeb($a);
	

	print "<h3>2. print arg1, arg2, arg3  results </h3>";

	$a1 = "string1";
	$a2 = "string2";
	$a3 = "string3";

	assetDeb($a1, $a2, $a3);
	
//	print "<h3> 3. reflection </h3>";
//	
//	reflect($a1, $a2, $a3);
//	reflect(array($a1, $a2, $a3));


function assetDeb($info=null)
{
	if(is_array($info))
	{
		print "<pre>";
		print_r($info);
		print "</pre>";
		
//	while ($i = current($info)) 
//	{
//	    
//	        echo key($info)." = ".$info[$i].'<br />';
//
//	        next($info);
//	}
		return null;
	}
	
	$result = "";
    for ($i = 0;$i < func_num_args();$i++) {
      $result .= "<br>".func_get_arg($i) . " ";
      
      
    }
    print $result;
    
}

//function reflect($args)
//{
//	$result = array();
//	$reflection = new ReflectionFunction(__FUNCTION__);
//	
//	foreach ($reflection->getParameters() as $param) {
//		print "param = ".$param->getName()."  value=".$param->getValue()."<br>";
//	$result[$param->getName()] = ${$param->getName()};
//	}
//		
//	print "<pre>";
//	print_r($result);
//	print "</pre>";
//}




