<?php 
  session_unset();
  session_start();
  setcookie('cookie-name','Cookie+John',time()+60);
  ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=windows-1250">
  
  <title>Movies start</title>
  </head>
  <body>

<?php

    // login :
    $_SESSION['username'] = "John";
    $_SESSION['authuser'] = 1;

    $user_movie = urlencode("The God's armour");   // to allow white spaces
    echo "<a href='moviesite.php?u_movie=$user_movie'> Click to go and pass movie with GET[] </a>";


?>

</body>

</html>