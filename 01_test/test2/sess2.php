<?php
session_start();

if(!$_SESSION['username']){

  echo "no session - no access";
}




if($_SESSION['username']){

echo "<br>Your username is ".$_SESSION['username'].". Session is ok - Download the content of the page";
}





?>













