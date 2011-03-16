<?php


/*   Check _POST vars when login form submited */

function loginCheck(){
if($_POST['login']){
    global $db;
  
    $sql= "SELECT * FROM users WHERE status = '1'";
    $db->execute($sql);
    $_inf = $db->get_array();
    
    while($_inf){
      if($_POST['username']==$_inf['name']&& md5($_POST['password'])==$_inf['password'])
        {
             $_SESSION['username'] = $_inf['name'];
              header("Location: index.php");
            
            // The following is good as well
           //  echo "<script>window.location='index.php';</script>";
        }
      $_inf = $db->get_array();
    }
    
    if($_SESSION['username']==''){
        header("Location: ../index.php");
       
       // The following is good as well
       // echo "<script>window.location='index.php';</script>";
      }

    }
}    


/*  loginCheck22() return true in case a user is logged in
    false - if not
*/

function loginCheck22(){

    global $db;
  
    $sql= "SELECT * FROM users WHERE status = '1'";
    $db->execute($sql);
    $_inf = $db->get_array();
    
    while($_inf){
      if($_SESSION['username']==$_inf['name'])
        {
             return true;
         }
      $_inf = $db->get_array();
    }
    
    return false;

}     

function loginForm(){
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>
       Title
  </title>
  
  <link rel="stylesheet" type="text/css" href="styles.css"/>
  
  
</head>

<body>
      
      
      <form action='index.php' method='post'>
      <table class='login' border='1' cellspacing='1' cellpadding='5'>
        <tr>
          <td align='right'>Username:</td>
          <td><input type='text' name='username'></td>
        </tr>
        <tr>
          <td align='right'>Password:</td>
          <td><input type='password' name='password' class='input_text'></td>
        </tr>
        <tr align='center'>
          <td colspan='2'><input type='submit' name='login' value='Login'></td>
        </tr>
      </table>
      </form>

</body>
</html>
   
<?
 }
// NO Blank lines after php content or header will be send !!!!!!!!!!!
?>