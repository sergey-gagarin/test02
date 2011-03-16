<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=windows-1250">
  <title>PCRE result1</title>
  <link rel="stylesheet" type="text/css" href="../main.css"/>
  </head>
  <body>
<?php
   
   $res = filter_var($_POST['item'],FILTER_VALIDATE_INT);
   
   if(!$res){print "<script type='text/javascript'> alert('value in item should be INT type!'); window.history.go(-1); </script>";
            }
            
  $text = trim($_POST['description']);
  $text.="<br> <br> Filtered text: <br>".filter_var($text,FILTER_SANITIZE_STRING);
  
  // flow example
 // $param = array("description","A-Za-z.,?!;:\"\'\\ \]\}\&,\%\$","Description contains invalid chers");
  $param = array(array("description","[\(\)\-\?\>\<\[\]\%\&,!]","Description contains invalid chars"));
  
  $errors = validate($param);
  
  if (sizeof($errors) != 0) {
  
         $rr = implode("\n",$errors);
         print $rr."<br>";
          print "<script type='text/javascript'> alert('$rr'); window.history.go(-1); </script>";
            }
             
  
  function validate($valarray) {
        if (!$valarray || !sizeof($valarray)) return null;
        $error = array();
  
        foreach ($valarray as $rule) {
            $param = $rule[0];
            $regex = $rule[1];
            $message = $rule[2];
            
            $val = $_REQUEST[$param];
            //echo " <br> val to check = ".$val."\n";
            if (!preg_match("/".$regex."/", $val)) {
            //print "ERRORS!!!<br>";
                $error[]=$message;
            }
        }
         print_r($error);
        return $error;
    }
    
    
    /*$errors = $w->validate(array(
            array("homephone","^[0-9+\- ]*$","Not a valid home phone number"),
            array("workphone","^[0-9+\- ]*$","Not a valid work phone number"),
            array("mobile","^[0-9+\- ]*$","Not a valid  mobile phone number"),
            array("priv_mobile","^[0-9+\- ]*$","Not a valid  mobile phone number"),
            array("fax","^[0-9+\- ]*$","Not a valid fax number"),
    ));
    if (sizeof($errors) != 0) {
        $w->error(implode("<br/>\n",$errors),"/contact/new");
    }
	*/ 
  
  
?>



<a href="start.php">Go back link</a>
<pre>
<?
   
   echo "res = ".$res."\n";
   var_dump($res);
   echo "text = ".$text."\n";
   var_dump($text);
   
   
   
   print_r($_POST);
   var_dump($_POST);
?>  
</pre>
</body>
</html>