<?php
  if( isset($_REQUEST[login]) && ($_REQUEST['password']=='') ){
    header("Location:start_forms.php");
    }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=windows-1250">
  <title>goForm</title>
  <link rel="stylesheet" type="text/css" href="../main.css"/>
  </head>
  <body>
  
  <h3>$_POST pre print_r</h3>
   <pre>
<?php
    print_r($_POST);
?>
   </pre>
   
   
</body>
</html>