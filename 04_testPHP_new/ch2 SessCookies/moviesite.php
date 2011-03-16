<?php
session_start();
  // check the user first
  if ($_SESSION['authuser']!=1) {
    die("No way! - die with message");
   define("SITE_NAME","Movie site");    // constants DEFINEd here are not displayed in the title/script
   
  }
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=windows-1250">
  
  <title>Movie Site - <?php echo $_REQUEST['u_movie']; ?></title>
  </head>
  <body>

<?php

    define("FAVMOVIE", 'Favorite Vanilla !!!');
        
    echo "The FAVORITE top movie was DEFINEd as ".FAVMOVIE."<br />";
    
    echo "Hi, {$_SESSION['username']}  - the name from SESSION<br />";
    
    echo "Now COOKIE : {$_COOKIE['cookie-name']}<br />";
    
    //if(isset($_REQUEST['u_movie'])){echo " uREQUEST u_movie is set ! {$_REQUEST['u_movie']} <br />";}
    // return (a>b) ? a (if true) : b (if false) 
   echo  (isset($_REQUEST['u_movie']))? " uREQUEST u_movie is set ! {$_REQUEST['u_movie']} <br />":
                                        "no u_movie was passed";   

    echo "Your movie is = The user's choice is - ".$_REQUEST['u_movie']." - the GET var from REQUEST[]";

    

  
echo "<h1> Printing </h1>";



echo "<h2>Printing long text</h2>";

$text =<<<MORETEXT
 nvolves replacing the opening bracket with a colon (:) and replacing the closing 
bracket with endif;, endwhile;,
MORETEXT;

echo $text;
 
$info = "Infor 55555";
  
$text .=<<<LONGTEXT
 <p> $info Long text of Movies description can go here. Authors' opinions; 
user's mood or what ever. - Rome's central train station, known as Roma Termini,
was built in 1867. 
Alternative enclosure syntax is available for the if, while, for, foreach, and switch control
structures. This involves replacing the opening bracket with a colon (:) and replacing the closing bracket with
endif;, endwhile;, endfor;, endforeach;, and endswitch;, respectively. There has been discussion
regarding deprecating this syntax in a future release, although it is likely to remain valid for the foreseeable
future'.
</p>
LONGTEXT;
    
echo $text;


?>
