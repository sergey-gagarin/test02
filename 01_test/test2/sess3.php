<?php
session_start();


// If no previous session, has the user submitted the form?

if($_POST['logout']){
    session_destroy();
    header("Location: sess3.php");
    }

if ($_SESSION['username']!=''){

    
    echo "Session has been started <br>";
    echo "<br> Your username is !!! ".$_SESSION['username'].". Session ok Download the content of the page";
    echo "<form action='sess3.php' method='post'>
     <input type='submit' name='logout' value='Logout'>
      </form>";
  }else{
  print "1111 content !!!";
  include ('login.php');
  }

  print "content !!!";
//  include ('login.php');

?>













