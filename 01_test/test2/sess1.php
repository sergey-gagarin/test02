<?php

if($_POST['login']){
session_start();
echo "username to check = ".$_POST['username'];
echo "<br> pw to check = ".$_POST['password'];
/// if checking is ok:
$_SESSION['username'] = $_POST['username'];
echo "<br> Your username is ".$_SESSION['username'].". Session ok Download the content of the page";
}


if(!$_SESSION['username']){
  $f="<form action='sess1.php' method='post'>
      <table border='1' cellspacing='1' cellpadding='5'>
        <tr>
          <td align='right'>Username:</td>
          <td><input type='text' name='username'></td>
        </tr>
        <tr>
          <td align='right'>Password:</td>
          <td><input type='password' name='password' class='input_text'></td>
        </tr>
        <tr align='right'>
          <td colspan='2'><input type='submit' name='login' value='Login'></td>
        </tr>
      </table>
      </form>";
    print $f;
}




if($_SESSION['username']){

echo "<br>Your username is ".$_SESSION['username'].". Session ok Download the content of the page";

}


if($_POST['logout']){
    session_destroy();
    }

$f="<form action='sess1.php' method='post'>
     <input type='submit' name='logout' value='Logout'>
      </form>";
    print $f;







?>













