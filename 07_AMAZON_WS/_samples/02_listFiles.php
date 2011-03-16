<?php

/*%******************************************************************************************%*/
// SETUP

	// Enable full-blown error reporting. http://twitter.com/rasmus/status/7448448829
	error_reporting(-1);

	// Include the SDK
	require_once '../sdk.class.php';
	
	$s3 = new AmazonS3();
	
	$bucketsArr = $s3->get_bucket_list();
	
	echo "<pre>";
	print_r($bucketsArr);
	echo "</pre>";
	
	foreach ($bucketsArr as $b)
	{
		$fileArr = $s3->get_object_list($b);
		
		foreach ($fileArr as $fn)
		{
			$url = $s3->get_object_url($b, $fn); 
			//$url = $s3->get_object_url($b, $fileName);
		
		echo "<br>".$b." file: <a href='$url'>".$fn."</a><br>";
		}
		
	}


/*%******************************************************************************************%*/
	
