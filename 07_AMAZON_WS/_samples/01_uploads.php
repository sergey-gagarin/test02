<?php

/*%******************************************************************************************%*/
// SETUP

	// Enable full-blown error reporting. http://twitter.com/rasmus/status/7448448829
	error_reporting(-1);

	// Set plain text headers
	//header("Content-type: text/plain; charset=utf-8");

	// Include the SDK
	require_once '../sdk.class.php';


/*%******************************************************************************************%*/
	


$target_path = "uploads/";

$target_path = $target_path . basename( $_FILES['up_file']['name']); 

if(move_uploaded_file($_FILES['up_file']['tmp_name'], $target_path)) {
    echo "The file ".  basename( $_FILES['up_file']['name']). 
    " has been uploaded Localy"."<br>";
} else{
    echo "There was an error uploading the file, please try again!";
}

define("UPLOADS_ROOT", str_replace("\\", "/", dirname(__FILE__)."/uploads/"));

echo '1. UPLOADS_ROOT.basename '.UPLOADS_ROOT.basename( $_FILES['up_file']['name'])."<br>";

$ff = glob('./uploads/'.basename( $_FILES['up_file']['name']));

echo '2. basename '.basename( $_FILES['up_file']['name'])."<br>";

print_r($ff);

foreach ($ff as $f1)
{
	echo '3. realpath($f1) '.realpath($f1)."<br>";
}

echo "<a href='#'>The Link! </a><br>";

//exit();
	

	
// UPLOAD FILES TO S3

	// Instantiate the AmazonS3 class
	$s3 = new AmazonS3();

	// Determine a completely unique bucket name (all lowercase)
	$bucket = '01-upload-'.time();

	// Create our new bucket in the US-West region.
	$create_bucket_response = $s3->create_bucket($bucket, AmazonS3::REGION_US_W1);

	// Provided that the bucket was created successfully...
	if ($create_bucket_response->isOK())
	{
		/* Since AWS follows an "eventual consistency" model, sleep and poll
		   until the bucket is available. */
		$exists = $s3->if_bucket_exists($bucket);
		while (!$exists)
		{
			// Not yet? Sleep for 1 second, then check again
			sleep(1);
			$exists = $s3->if_bucket_exists($bucket);
		}

		/*
			Get a list of files to upload. We'll use some helper functions we've
			defined below. This assumes that you have a directory called "test_files"
			that actually contains some files you want to upload.
		*/
		//$list_of_files = filter_file_list(glob('./test_files/*'));
		$list_of_files = filter_file_list(glob('./uploads/'.basename( $_FILES['up_file']['name'])));

		// Prepare to hold the individual filenames
		$individual_filenames = array();

		// Loop over the list, referring to a single file at a time
		//// sdk.class.php, CFRuntime class
		foreach ($list_of_files as $file)
		{
			// Grab only the filename part of the path
			$filename = explode(DIRECTORY_SEPARATOR, $file);
			$filename = array_pop($filename);

			// Store the filename for later use
			$individual_filenames[] = $filename;

			/* Prepare to upload the file to our new S3 bucket. Add this
			   request to a queue that we won't execute quite yet. */
			$s3->batch()->create_object($bucket, $filename, array(
				'fileUpload' => $file
			));
		}

		/* Execute our queue of batched requests. This may take a few seconds to a
		   few minutes depending on the size of the files and how fast your upload
		   speeds are. */
		$file_upload_response = $s3->batch()->send();	// sdk.class.php, CFRuntime class l.989

		/* Since a batch of requests will return multiple responses, let's
		   make sure they ALL came back successfully using `areOK()` (singular
		   responses use `isOK()`). */
		if ($file_upload_response->areOK())
		{
			// Loop through the individual filenames
			foreach ($individual_filenames as $filename)
			{
				/* Display a URL for each of the files we uploaded. Since uploads default to
				   private (you can choose to override this setting when uploading), we'll
				   pre-authenticate the file URL for the next 5 minutes. */
				
				// set it PUBLIC to be able to read it in 02_listFiles.php
				$s3->set_object_acl($bucket, $filename, AmazonS3::ACL_PUBLIC);
				   
				// the link is available for 5 min for public.
				// But file is public any way.
				echo $s3->get_object_url($bucket, $filename, '5 minutes');   
				echo "<br><a href='".$s3->get_object_url($bucket, $filename, '5 minutes')."' > File link </a>" . PHP_EOL . PHP_EOL;
			}
		}
	}


/*%******************************************************************************************%*/
// HELPER FUNCTIONS

	// Filters the list for only files
	function filter_file_list($arr)
	{
		return array_values(array_filter(array_map('file_path', $arr)));
	}

	// Callback used by filter_file_list()
	function file_path($file)
	{
		return !is_dir($file) ? realpath($file) : null;
	}
