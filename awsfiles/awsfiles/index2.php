<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>AWS Tutorial File Upload</title>
</head>
<body>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
ini_set('log_errors', 'on');
ini_set('error_log', '/tmp/php.log');

// Embedded PHP is a bad habit. Don't do what I'm doing here.
// Use a framework! 
$upload_dir = dirname(__FILE__) . "/uploads";
if (! is_dir($upload_dir) || ! is_writable($upload_dir)) {
    echo "<pre>\n";
    echo "$upload_dir doesn't exist, or is not writable!\n";
    echo "</pre><hr />\n";   
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && ! empty($_FILES)) {
    
    
    $upload_name = basename($_FILES['userfile']['name']);
    $upload_file = $upload_dir . '/' . $upload_name;
    echo "<pre>\n";
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $upload_file)) {
        echo "File uploaded successfully: {$upload_name}\n";
    } else {
        echo "File upload failed: {$upload_name}\n";
    }
    echo "</pre><hr />\n";
    
    // queue up this file for conversion
    include dirname(dirname(__FILE__)).'/awsfiles/sqs-queue-conversion.php';
    
}
?>
<form enctype="multipart/form-data" action="index.php" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" vaule="10240">
    <span>Upload this:</span> <input name="userfile" type="file" /> <br />
    <input type="submit" value="Upload" />
</form>



</body>
</html>
