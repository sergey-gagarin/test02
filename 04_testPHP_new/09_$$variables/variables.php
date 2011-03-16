<?php
echo "<h3> $$  variables </h3>";
// book First

#On occasion, you may want to use a variable whose contents can be treated dynamically as a
#variable in itself. Consider this typical variable assignment:

$recipe = "spaghetti";

#Interestingly, you can then treat the value spaghetti as a variable by placing a second
#dollar sign in front of the original variable name and again assigning another value:

$$recipe = "  & meatballs";

#This in effect assigns & meatballs to a variable named spaghetti.
#Therefore, the following two snippets of code produce the same result:

print '$recipe = '.$recipe.'  $spaghetti'. $spaghetti."<br>";
print $recipe."   ". ${$recipe};


#The result of both is the string spaghetti & meatballs.

aDebug('$_SERVER[REQUEST_URI]:,',$_SERVER[REQUEST_URI]);

aDebug ($_SERVER);




function aDebug($info=null)
{
	if(is_array($info))
	{
		print "<pre>";
		print_r($info);
		print "</pre>";

		return null;
	}
	
	$result = "<br>";
	
	if(func_num_args()>1)
	{
	    for ($i = 0;$i < func_num_args();$i++) {

	    if(is_array(func_get_arg($i)))
	    {
	    	print "<pre>";
			print_r(func_get_arg($i));
			print "</pre>";
	    }
	    else {
	      $result .= "<br>".func_get_arg($i) . " ";
	    }
	      
	    }
	}
	else 
	{
		$strArray = explode(',' , $info);
		$result .= implode('<br>' , $strArray);
	
	}
    
    
    print $result;
    
}