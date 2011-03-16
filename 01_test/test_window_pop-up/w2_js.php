<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=windows-1250">
  <meta name="generator" content="PSPad editor, www.pspad.com">
  <title></title>
  
  <script src="js.js" type="text/javascript"></script>
  
  </head>
  <body>

<?php

echo" WITH js.sj <br>
<FORM>
chose the first job PN9001: <INPUT type='checkbox' name='job_pid' value='PN 9001'> 
</FORM>

<FORM>
chose the first job PN9002: <INPUT type='checkbox' name='job_pid' value='PN9002'> 
</FORM>

<FORM>
chose the first job PN9003: <INPUT type='checkbox' name='job_pid' value='PN9003'> 
</FORM>

<INPUT type='button' value='Go_Get_Button' onClick=\"setIDs();\">

<form target='_blank' method='post' action='user.php'>
<input type='hidden' name='post_ids' id='hidden_ids'>
<INPUT type='submit' value='GoGoHiddenPostForm' 
  onClick=\"goHiddenPost();\"> //
</form>

// function one(); open new window but can't pass any POST values because it is still on the client side !! -
<!--form target='_blank' method='post' action='user.php' onSubmit=\"one();\"-->

<form  method='post' action='user.php'>
<input type='hidden' name='post_ids' id='hidden_ids2'>
<INPUT type='submit' value='GoGoHiddenPostForm With pop-up' 
      
      onClick=\"goHiddenPost2();
      window.open('user.php','DailyNotification','width=800,height=600,toolbar=no,location=no,directories=no,status=no,menubar=yes,scrollbars=yes,copyhistory=no,resizable=yes');
      \"> // put different id !
</form>

";
?>

  </body>
</html>
