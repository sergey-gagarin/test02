<!doctype html>
<html>
  <head>
  <link href="styles5.css" rel="stylesheet" type="text/css">
   <script src="jquery.min.js" type="text/javascript"></script>
   <script src="click.js" type="text/javascript"></script>
    
  </head>
  
  <body>
  <?php
  echo 'ddd'.'  ssss';
  ?>
  
  <!--  target="_blank" -->
    <a href="http://jquery.com/">jQuery</a>
    
    
     <fieldset>
      <legend> Item </legend>
      
      <form action="form_target.php" method="POST" onsubmit="needToConfirm=false;">
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
 
 <!-- 
 More info and options are on
 
 http://www.knowledgesutra.com/forums/topic/38617-asking-users-to-confirm-if-they-wish-to-leave-the-page/
 
  -->   
 <script language="javascript" type="text/javascript">
        needToConfirm = false;
        window.onbeforeunload = askConfirm;
        
        function askConfirm(){
                if (needToConfirm){
                        return "You have unsaved changes.";
                        }       
                }


//		window.onbeforeunload = askConfirm;
//		function askConfirm(){
//                return "Sure that changes have been saved with Save button ?";
//                }

// this one is in use :
//	 window.onbeforeunload = checkGo;
//	 function checkGo() {  
//             return 'Sure that changes have been saved with Save button ?';  
//         } 

        
</script> 
    
    
    
    
    
    
    
    <!-- Old -->
    <p class="square" id="sq">
     Some info which should have bg
    </p>
    <br />
    
    <button>Change color</button>
    
    
    
    
    
  </body>
</html>

