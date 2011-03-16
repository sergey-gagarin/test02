<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=windows-1250">
    <meta name="generator" content="PSPad editor, www.pspad.com">
    <title>
    </title>
  </head>
  <body>
<?php
  $passwd = $_POST['passwd'];
  $user = $_POST['user'];
  
  if (!checkPasswd($passwd,$user)){
    echo "<h2> Wrong password $user . Try again.</h2>";
    include('login.html');
  }
  else{
      echo "<h2> Welcome on board $user !</h2>";
  }
  
  function checkPasswd($passwd,$user){
    if(!$fh = fopen("passwd.txt", "r")) return false;
    while(!feof($fh)){
       $line = trim(fgets($fh));
       //to be completed
       $up = explode(':',$line);
       if($up[0]==$user && $up[1]==$passwd)
        {
          fclose($fh);
          return true;
       } 
    }
    fclose($fh);
    return false;
   } 
    ?>
  </body>
</html>
