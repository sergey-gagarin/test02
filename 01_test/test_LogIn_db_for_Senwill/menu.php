<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>
       Title
  </title>
  
  <link rel="stylesheet" type="text/css" href="styles.css"/>
  
  
</head>

<body>



<?php

echo "<a href='index.php?page=page'>Home - page.php</a>     <a href='index.php?page=page2'>Page2.php</a>";

   print "User:  ".$_SESSION['username']."<br><br>";
   
?>


  <form action='index.php' method='post'>
            <input type='submit' name='logout' value='Logout'>
          </form>

</body>
</html>
