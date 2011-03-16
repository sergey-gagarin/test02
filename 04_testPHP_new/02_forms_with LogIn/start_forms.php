<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=windows-1250">
  <title>Form start</title>
  <link rel="stylesheet" type="text/css" href="../main.css"/>
  </head>
  <body>


 <form action='go_form.php' method='post'>
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
      
      <fieldset>
      <legend> Item </legend>
      
      <form action="go_form.php" method="POST">
      <p>Text Field Item name: <input type="text" name="item_name_field" value="Item name" size="30"></p>
      <p>TextArea Item Description: 
                      <textarea name="item_descript_t_area" rows="3" cols="20">Description</textarea></p>
      
      <p><input type='checkbox' name='chech_properties[]' value="Good item">Good Item</p>
      <p><input type='checkbox' name='chech_properties[]' value="Bad item">Bad Item</p>
      <p><input type='checkbox' name='chech_properties[]' value="Reliable item">Reliable Item</p>
      <p><input type='checkbox' name='chech_properties[]' value="Tested item">Tested Item</p>
      
      
      <p><select name="Delivery"> 
         <option value="Deliver to the address">Deliver to the address</option>
         <option value="shop">Pick up in the shop</option>
         <option value="call">call you later</option>
         </select></p>
      
      <p>Happy with that? <input type="radio" name="radio" value="yes">Yes
                          <input type="radio" name="radio" value="no">No
      
      </p>
      <p><input type='reset' name='reset' value='reset'></p>
      <p><input type='submit' name='Submit_fields' value='submit'></p>
      
      </form>
      </fieldset>
<?php

?>

</body>
</html>