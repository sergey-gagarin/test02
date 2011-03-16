<?php
session_start();

$f="<form action='login.php' method='post'>
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

    if($_POST['login']){

    //// check the pw

    $_SESSION['username'] = $_POST['username'];
    header("Location: sess3.php");

    } else {
            echo "<br> from login 222 !<br>";
            print $f;}




   

?>
