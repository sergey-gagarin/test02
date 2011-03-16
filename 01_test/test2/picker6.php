<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=windows-1250">
  <meta name="generator" content="PSPad editor, www.pspad.com">
  <title></title>
  
  <script src="calendar6.js" type="text/javascript"></script>
  <link href="calendar.css" type="text/css" rel="stylesheet" />
  
  </head>
  <body>
  
<!-- picker:  http://www.openjs.com/scripts/ui/calendar/  -->

 
    <input type="text" name="date" focus="infocus" id="date" value=<?= date("Y-m-d");?> />
      <script type="text/javascript">
        calendar.set("date");
      </script>
    <input type ="submit" name="select_d" value ="select_date">

    


  </body>
</html>
