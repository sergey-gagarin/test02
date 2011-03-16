<?php
session_start();

include_once('settings.php');  // new db connection
include ('login.php');

// before any output sent header will be modified - redirect in according to login info

if($_POST['logout']){
    session_destroy();
    header("Location: index.php");
    }
    
if($_POST['login']){
    loginCheck();
    }
    


// in case other session is open For example you are logged in SenWill page
// (isset($_SESSION['username'])) will give true 


if (loginCheck22()){

//  include ($include.'/PageContentTest.php');

      include ('menu.php');

      if(isset($_GET['page'])){
        $page = $_GET['page'];
        include("$page.php");
      }
  
  

 } else { 
          loginForm();
           }
    
    

?>
