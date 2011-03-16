<!doctype html>
<html>
  <head>
  <link href="styles10.css" rel="stylesheet" type="text/css">
  <!--
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js" type="text/javascript"></script>
 -->
   <script src="jquery.min.js" type="text/javascript"></script>
   <script type="text/javascript">


    $(document).ready(function(){

          $('#go_9').click(function(event){

          $('#forRed').css('background','green');
          if(true){$('#forRed').css('background','red');}
           });
           
         // if(true){$('#forRed').css('background','red');};
         
         for(i=0; i<100; i++){$('#forRed').slideDown(3000); $('#forRed').slideUp(3000);};
         
         
       //      $('.choice').toggle(    // No tick is showen when it has been clicked - Not Good
      //                      function(event){ $(this).next().next().css('display','block');},
      //                      function(event){ $(this).next().next().css('display','none');}
        
       // );
         

     }); // final end ready

    </script>
    
  </head>
  <body>

   <!--    9   -->   

    
      <div class="topDiv">
          <div class="control">
              9 <input type="button" id="go_9" value="css ">
          </div>
          <div class="result" id="forRed">
               <p> Resalt field  </p>
          </div>
          <div class="code">
               <p> Code: 9   </p>
          </div> 
      </div>



    
     <br><br>
    <div class="clear"></div>
     <hr>
    <br><br><br><br><br><br><br>






 


    
  </body>
</html>

