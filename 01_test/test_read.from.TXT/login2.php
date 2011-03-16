<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=windows-1250">
    <meta name="generator" content="PSPad editor, www.pspad.com">
    <title>
    </title>
  </head>
  <body>
<?php
  $passwd = $_POST['passwd'];
  $user = $_POST['user'];
  $action = $_POST['action'];
  
  function readArray(){
    $arr = array();  
    if($fh = fopen("passwd.txt", "r")) 
    { 
      while(!feof($fh))
        {
          $line = trim(fgets($fh));
          if ($line != "")
           {
             $up = explode(':',$line);
             $arr[$up[0]]=$up[1];
           }
        }
    
      fclose($fh);
    }
      return $arr;
  }
  
  function writeArray($arr){ 
    //to be completed ... 
     if($fh = fopen("passwd.txt", "w")) 
     {
        foreach($arr as $u=>$p)
         {
           fputs($fh, "$u:$p\n");
         }
        fclose($fh);
     }
  } 
   
  if($action == "del"){

     $arr = readArray(); 
     if(array_key_exists($user,$arr)){
       unset($arr[$user]);
       writeArray($arr);
       echo "User $user deleted from the database";
     }else{
            echo "No user called $user detected!";
          }
  }
  
  if($action == "add"){
     $arr = readArray();
     if(array_key_exists($user,$arr)){
       echo "User $user exists!";
     }
     else
      {
       $arr[$user] = $passwd;
       echo "User $user added to databese";
       writeArray($arr);
      }
  }
  
?>
  </body>
</html>
