<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>Creating a PHP-based image randomizer</title>
<style type="text/css" title="text/css">
    /* <![CDATA[ */
    @import url(randomizer.css);
    /* ]]> */
</style>
</head>
<body>
<?php
$picarray = array("stream" => "A photo of a stream", "river" => "A photo of a river", "road" => "A photo of a road");
$randomkey = array_rand($picarray);

echo '<img src="assets/random-images/'.$randomkey.'.jpg"  alt="'.$picarray[$randomkey].'" width="300" height="300" class="addBorder" />';
echo '<p>'.$picarray[$randomkey].'</p>';
?>
</body>
</html>
