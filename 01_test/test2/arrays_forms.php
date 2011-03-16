<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=windows-1250">
  <meta name="generator" content="PSPad editor, www.pspad.com">
  <title> Arrays & Form Processing</title>
  </head>
  <body>
  <b>Choose topics from the list: </b><br>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <input type="checkbox" name="topic[]" value="cp1"> Computer Programming 1 <br>
  <input type="checkbox" name="topic[]" value="cp2"> Computer Programming 2 <br>
  <input type="checkbox" name="topic[]" value="ita2"> IT Applications <br>
  <input type="checkbox" name="topic[]" value="ic"> Internet Computing <br>
  <input type="submit" name="confirm" value="Confirm">
  </form>
  <?php
  if (isset($_POST['confirm'])){
    if (is_array($_POST['topic'])){
      echo 'You selected: <br>';
      foreach ($_POST['topic'] as $i){
        echo "<b><li>$i</b><br>";
      }
     }
     else{
       echo 'Warning: no topic selected yet';
     }
  }
  else{
    echo 'Form not submitted';
  } 
    ?>
  </body>
</html>
