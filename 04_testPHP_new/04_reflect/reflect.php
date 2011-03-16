<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=windows-1250">
  <title>Reflect</title>
  <link rel="stylesheet" type="text/css" href="../main.css"/>
  </head>
  <body>
  
  <h3>Reflect</h3>
   <pre>
<?php
    print_r($_POST);
    
    Reflection::export(new ReflectionClass('pdflib'));
    
    //Reflection::export(new ReflectionClass('DateTime'));
?>
   </pre>
   

   
</body>
</html>