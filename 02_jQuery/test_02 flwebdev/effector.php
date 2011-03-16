<!doctype html>
<html>
  <head>
  <link href="styles8.css" rel="stylesheet" type="text/css">
  <!--
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js" type="text/javascript"></script>
 -->
   <script src="jquery.min.js" type="text/javascript"></script>
   
   <script type="text/javascript" src="lightbox/js/jquery.lightbox-0.5.js"></script>
   <link rel="stylesheet" type="text/css" href="lightbox/css/jquery.lightbox-0.5.css" media="screen" />
                                      
   <script type="text/javascript">
   
   $(function() {
	// Use this example, or...
//	$('a[@rel*=lightbox]').lightBox(); // Select all links that contains lightbox in the attribute rel
	// This, or...
//	$('#gallery a').lightBox(); // Select all links in object with gallery ID
	// This, or...
//	$('a.lightbox').lightBox(); // Select all links with lightbox class
	// This, or...
//	$('a').lightBox(); // Select all links in the page
	// ... The possibility are many. Use your creative or choose one in the examples above
	$('#go_50 a').lightBox();
});


    $(document).ready(function(){


 
 /////////////////////////////////////////




////////////////// pop-up 2 Ok! from http://jqueryfordesigners.com/coda-popup-bubbles//////////////

    $('.bubbleInfo').each(function () {
    // options
    var distance = 10;
    var time = 250;
    var hideDelay = 500;

    var hideDelayTimer = null;

    // tracker
    var beingShown = false;
    var shown = false;
    
    var trigger = $('.trigger', this);
    var popup = $('.popup', this).css('opacity', 0);

    // set the mouseover and mouseout on both element
    $([trigger.get(0), popup.get(0)]).mouseover(function () {
      // stops the hide event if we move from the trigger to the popup element
      if (hideDelayTimer) clearTimeout(hideDelayTimer);

      // don't trigger the animation again if we're being shown, or already visible
      if (beingShown || shown) {
        return;
      } else {
        beingShown = true;

        // reset position of popup box
        popup.css({
         // top: -5,
          left: -33,
          display: 'block' // brings the popup back in to view
        })

        // (we're using chaining on the popup) now animate it's opacity and position
        .animate({
          top: '-=' + distance + 'px',
          opacity: 1
        }, time, 'swing', function() {
          // once the animation is complete, set the tracker variables
          beingShown = false;
          shown = true;
        });
      }
    }).mouseout(function () {
      // reset the timer if we get fired again - avoids double animations
      if (hideDelayTimer) clearTimeout(hideDelayTimer);
      
      // store the timer so that it can be cleared in the mouseover if required
      hideDelayTimer = setTimeout(function () {
        hideDelayTimer = null;
        popup.animate({
          top: '-=' + distance + 'px',
          opacity: 0
        }, time, 'swing', function () {
          // once the animate is complete, set the tracker variables
          shown = false;
          // hide the popup entirely after the effect (opacity alone doesn't do the job)
          popup.css('display', 'none');
        });
      }, hideDelay);
    });
  });


    //////////////////////////////  - Ok! pop-up 2 /////////////////////////////////////////////////////////// 



//// pop-up     - first try not good because op-up disuppear when the cursor moved on the pop-up itself

         $(".rss-popup a").hover(
                                function() {
                                              $(this).next("em").stop(true, true).animate({opacity: "show", top: "-60"}, "slow");
                                            },
                               function() {
                                              $(this).next("em").animate({opacity: "hide", top: "-70"}, "fast");
                                          }
                              );



//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



    
    
/////// spinning - with localhost - no fun - ;oading is too fast but on the server - Ok! + http://www.ajaxload.info/ to get .tif files   
     var img = new Image();
        $(img).load(function () {
            //$(this).css('display', 'none'); // .hide() doesn't work in Safari when the element isn't on the DOM already
            $(this).hide();
            $('#loader').removeClass('loading').append(this);
            //$(this).fadeIn();
            $(this).show();
        }).attr('src', 'images/01.jpg').attr('width','500').attr('height','500');
        
        //.error(function () {
        //    // notify the user that the image could not be loaded
      //  }).attr('src', 'images/01.jpg');


/////////////////////////////////////////////////////////////////////


    
    
    
      
        $('#go_1').click(function(event){
         $(this).parent().next().hide(3000, function(){$(this).next().html('done');});
             //$('.result').hide()    ; // ok
             //$(this).parent().hide(); // ok
        });
        
        $('#go_1show').click(function(event){
         $(this).parent().next().show(2000);
        });
        
        
        $('#go_2').click(function(event){
         $(this).parent().next().html('some new text to put');
        });
        
        $('#go_3').click(function(event){
        
        var nn = $('#go_3_in').attr('value');
        var nn2 = $('#go_3_in').val(); 
         $(this).parent().next().html(nn).append(nn2);
        });
        
        $('#go_4').click(function(event){
        // $(this).parent().next().css('width','350px');
          $(this).parent().next().css('width',function(){ return $(this).width()+50+"px";  });    // p.62
        });
        
        $('#go_5').click(function(event){
           $(this).parent().next().css('width',function(){ return $(this).width()+50+"px";  });    
        });

       $('#bind_2').
                    bind('mouseover',report).
                    bind('mouseout', function(event){ 
                                                  $('#bind_2').next().html('   mouseout!'); 
                                              });
      
    
        
        $('#go_6').click(function(event){
        // $(this).parent().next().fadeOut();
         $(this).parent().next().fadeOut(1000, function(){$(this).next().html('done');});
        });
        
        $('#go_6in').click(function(event){
         $(this).parent().next().fadeIn(2000);
        });
        
        $('#go_6to').click(function(event){
         $(this).parent().next().fadeTo(2000, 0.5, function(){$(this).next().html('opacity = 0.5');});
        });
        
        $('#go_7up').click(function(event){
           $(this).parent().next().slideUp();
        });
        
        $('#go_7d').click(function(event){
         $(this).parent().next().slideDown(2000, function(){$(this).next().html('sliding !');});
        });
        
        $('#go_7t').click(function(event){
         $(this).parent().next().slideToggle(1000);
         });
         
       $('#go_8').click(function(event){
         for (x=0;x<5;x++){
      //   $(this).parent().next().fadeOut(2000);
      //   $(this).parent().next().fadeIn(2000);
      //   $(this).parent().next().fadeTo(2000, 0.3, function(){$(this).next().html('opacity = 0.3');});
         $(this).parent().next().fadeTo(3000, 0.009, function(){$(this).html('next week :');}).fadeTo(3000, 1);
         $(this).parent().next().fadeTo(3000, 0.009, function(){$(this).html('cool stuff!');}).fadeTo(3000, 1);
         };
       });
         
         
        $('#go_9').click(function(event){
          $('#forRed').css('background','green');
        //  if(true){$('#forRed').css('background','red');}
         });
        //  if(true){$('#forRed').css('background','red');};
     


///////////////////////validation  //////////////////////////////////////////////////

     $("#txt_username").blur(function() 
    { 
        var username_length; 
        username_length = $("#txt_username").val().length; 
        $("#username_warning").empty(); 
         if (username_length < 4) 
            $("#username_warning").append("Username is too short"); 
    }); 
 
    $("#txt_password").blur(function() 
    { 
        var password_length; 
 
        password_length = $("#txt_password").val().length; 
        $("#password_warning").empty(); 
 
        if (password_length < 6) 
            $("#password_warning").append("Password is too short"); 
    }); 
    
    
    ////////////
          
   
         $('#go_12').submit(function(event){
      
         var val = $('#input_12').attr('value');
         
         if ( (val=='')){   alert('please provide a contact phone number'); return false; }
         return true;
       
         }); // end submit
        
              
         
            $('#input_12').blur( function(){
           //   alert('www');
              //var  = $('#input_12');
              if ( ($('#input_12').val().length < 8) || ($('#input_12').val().length > 20) ){
                 alert('please provide a contact phone number'); 
                 }
            //  $('#input_12').focus();
        });  // end blur 
         
  
//////////////// end validation /////////////////////////////////////////////////////////


     

    
     });    //  end document function 
     
     function report(){
     $('#bind_2').next().html('mouseover over!');
     }
     
     
     
      function validateNum(sss){
              alert(sss);
              
         //return ereg("[0-9]*[[:space:]]*",sss);
         return true;

        };
          

    </script>
    
  </head>




  
  <body>

 
  
   <div class="topDiv">
      <div class="control">
               <input type="button" id="go_1" value="hide">
                <input type="button" id="go_1show" value="show">
      </div>
   
      <div class="result">
               <p> Some text  </p>
      </div>
                              
      <div class="code">
               <p> Code $(this).parent().next().hide();</p>
      </div> 
   </div>


    <div class="clear"></div>
    
      <div class="topDiv">
      <div class="control">
               <input type="button" id="go_2" value="html"> 
      </div>
   
      <div class="result">
               <p> Some text  </p>
      </div>
                              
      <div class="code">
               <p> Code .html('some new text to put'); </p>
      </div> 
   </div>
   
   
   <div class="clear"></div>
    
      <div class="topDiv">
      <div class="control">
               <input type="button" id="go_3" value="read attr() & val()">
               <input type="text" size="3" id="go_3_in" value="input"> 
      </div>
   
      <div class="result">
               <p> Resalt field  </p>
      </div>
                              
      <div class="code">
               <p> Code  $('#go_3_in').attr('value') +  .html(nn); </p>
      </div> 
   </div>
   
<!--    4   -->   
   <div class="clear"></div>
    
      <div class="topDiv">
      <div class="control">
              4 <input type="button" id="go_4" value="css(name,value)">
              
      </div>
   
      <div class="result">
               <p> Resalt field  </p>
      </div>
                              
      <div class="code">
               <p> Code: $(this).parent().next().css('width',function(){ return $(this).width()+50+"px";  });   </p>
      </div> 
   </div>

<!--    5   -->   
   <div class="clear"></div>
    
      <div class="topDiv">
      <div class="control" id="bind_2">
              5 div for mouseover & mouseout
              
      </div>
   
      <div class="result">
               <p> Resalt field  </p>
      </div>
                              
      <div class="code">
               <p> Code:   $('#bind_2').bind('mouseover',report) </p>
      </div> 
   </div>


 <!--    6   -->   
   <div class="clear"></div>
    
      <div class="topDiv">
      <div class="control">
              6 <input type="button" id="go_6" value="fadeOut 1000">
              <input type="button" id="go_6in" value="fadeIn 2000">
              <input type="button" id="go_6to" value="fadeTo 1000">
              
      </div>
   
      <div class="result">
               <p> Resalt field  </p>
      </div>
                              
      <div class="code">
               <p> Code: fadeOut(1000, function()   </p>
      </div> 
   </div>


<!--    7   -->   
   <div class="clear"></div>
    
      <div class="topDiv">
      <div class="control">
              7 <input type="button" id="go_7up" value="slideUp">
              <input type="button" id="go_7d" value="slideDown">
              <input type="button" id="go_7t" value="toggle">
              
      </div>
   
      <div class="result">
               <p> Resalt field  </p>
      </div>
                              
      <div class="code">
               <p> Code: 7   </p>
      </div> 
   </div>


<!--    8   -->   
   <div class="clear"></div>
    
      <div class="topDiv">
      <div class="control">
              8 <input type="button" id="go_8" value="fading">
              
      </div>
   
      <div class="result">
               <p> Resalt field  </p>
      </div>
                              
      <div class="code">
               <p> Code: 8   </p>
      </div> 
   </div>
   
   
   <!--    9   -->   
   <div class="clear"></div>
    
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

 <!--     10     -->

 
    <div class="clear"></div>
    
    <div class="topDiv">
        <div class="control">
              10 <input type="button" id="go_10" value="get the number ">
        </div>
   
        <div class="result" id="forRed">
               35.5
        </div>
                              
        <div class="code">
               <p> Code: 10   </p>
        </div> 
   </div>
   
   <script type="text/javascript">
         $('#go_10').click(function(event){
   //      alert('dd');
         var num = $(this).parent().next().html();
         console.log("num = ", num);
          var s = parseFloat(num, 10) + 20;
         $(this).parent().next().next().html(s);
         });
   </script>
   
   
 <!--     11     -->

 
    <div class="clear"></div>
    
    <div class="topDiv">
        <div class="control">
              11 <select id="go_11">
                     <option> 1 </option>
                     <option> 2 </option>
                     <option> 3 </option>
                     <option> 4 </option>
              </select>
        </div>
   
        <div class="result" id="forRed">
               35.5
        </div>
                              
        <div class="code">
               <p> Code: 11   </p>
        </div> 
   </div>
   
   <script type="text/javascript">
         $('#go_11').change(function(event){
      //  var val = $(this).attr('value');
        var val = $(this).children().filter(':selected').attr('value');
         alert(val);
        
        // var num = $(this).parent().next().html();
         
        // console.log("num = ", num);
         
          
       //  $(this).parent().next().next().html(s);
         });
   </script>



   <!--     12     -->

 
    <div class="clear"></div>
    
    <div class="topDiv">
        <div class="control">
          <form method="post" id="go_12" action="effector.php">
              
               <input type="text" size="5" name="result" id="input_12" value="input"/>
               <input type="text" size="5" name="result2" id="input_122" />
               <input type="submit" value="go">
               
          </form>    
        </div>
   
        <div class="result" id="forRed">
             
            <?php echo  'first = '.$_POST['result']; ?>
            <?php echo  ',  sec = '.$_POST['result2']; ?>
               
        </div>
                              
        <div class="code">
               
             
               
        </div> 
   </div>
   
   <script type="text/javascript">
   

         
   </script>



    <div class="clear"></div>
<br>


        <b>Username:</b> <i>Username must be at least 4 characters in length</i> 
<input type="text" id="txt_username" name="username"> 
<span id="username_warning" style="color:red"></span> 
<b>Password:</b> <i>Password must be at least 6 characters in length</i> 
<br><input type="password" id="txt_password" name="password"> 
<span id="password_warning" style="color:red"></span>




 <!--   end    -->
     <hr>
     <br><br><br><br><br><br><br><br><br>





<!--     bubbles - pop-ups         -->
 

  <div class="bubbleInfo">
  <img class="trigger" src="bubble.png" /> Good pop-up!
  <div class="popup">
  some text ??
  ellentesque convallis sit amet facilisis tortor. Nulla vitae turpis odio. In hac 
    <!-- your information content -->
  </div>
</div>
 Proin quis nisi leo, in eleifend nulla. Vivamus condimentum placerat orci, non ultrices justo pellentesque vel. Quisque eros purus, pulvinar tincidunt scelerisque in, feugiat et libero? Praesent non eros orci. Quisque egestas arcu id ante tempus non imperdiet nisi viverra? Pellentesque lacus turpis, sollicitudin non rutrum imperdiet, viverra vel magna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris rhoncus pretium quam, in eleifend neque gravida eu. Ut risus massa, posuere sit amet vulputate fermentum, porttitor viverra sapien! In vitae libero a enim dignissim iaculis et sed tortor. Donec nec lorem quis orci mattis dignissim ut vitae velit? Morbi pretium, ipsum quis iaculis elementum, elit leo malesuada nisl, eget sollicitudin odio justo sed eros. Suspendisse tempus scelerisque volutpat. Etiam sit amet ultrices enim. Nam congue risus eu orci condimentum at lobortis purus sodales. Donec ultrices tincidunt purus, non tincidunt massa dignissim ut. Suspendisse potenti. Vestibulum id egestas libero.

In et tellus non erat suscipit sollicitudin. Donec bibendum adipiscing varius. Quisque ut enim a lorem sodales bibendum. Sed in augue et velit pharetra luctus. In at ligula sed elit ullamcorper dignissim ut id risus. Vivamus feugiat interdum diam, ut ullamcorper odio pharetra nec. Nam ut turpis non mi eleifend mattis. Praesent pretium facilisis semper. Etiam nibh eros, gravida ac semper in, adipiscing eget ante. Integer placerat viverra lectus, venenatis sodales ligula accumsan vitae. Duis interdum blandit ligula nec pulvinar. Morbi rutrum auctor placerat. Nam eros tellus, euismod sit amet blandit nec, commodo sit amet risus. Praesent in leo et mi auctor placerat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris suscipit, ipsum varius interdum bibendum, massa libero elementum lorem, quis congue quam sapien nec velit!

Nam posuere erat vel orci sollicitudin laoreet? Nulla odio odio, convallis eu laoreet id, vehicula sit amet neque. Aenean urna sapien, vestibulum a pulvinar eget, scelerisque a justo. Duis bibendum ultricies semper! Vivamus quis malesuada elit. Pellentesque vestibulum elit at mauris pretium viverra. Aliquam sit amet sapien ipsum, ut tincidunt sapien. Morbi viverra gravida odio a lobortis. Suspendisse non dolor in nulla porttitor pellentesque id eget sem. Nunc congue ultrices ipsum, id pulvinar velit porta et. Vestibulum lobortis eleifend faucibus? Curabitur sed pulvinar diam. Vivamus ac eros est.
  <span class="bubbleInfo">
  Proin quis nisi leo, in eleifend nulla. Vivamus condimentum placerat orci, non ultrices justo pellentesque vel. Quisque eros purus, pulvinar tincidunt scelerisque in, feugiat et libero? Praesent non eros orci. Quisque egestas arcu id ante tempus non imperdiet nisi viverra? Pellentesque lacus turpis, sollicitudin non rutrum imperdiet, viverra vel magna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris rhoncus pretium quam, in eleifend neque gravida eu. Ut risus massa, posuere sit amet vulputate fermentum, porttitor viverra sapien! In vitae libero a enim dignissim iaculis et sed tortor. Donec nec lorem quis orci mattis dignissim ut vitae velit? Morbi pretium, ipsum quis iaculis elementum, elit leo malesuada nisl, eget sollicitudin odio justo sed eros. Suspendisse tempus scelerisque volutpat. Etiam sit amet ultrices enim. Nam congue risus eu orci condimentum at lobortis purus sodales. Donec ultrices tincidunt purus, non tincidunt massa dignissim ut. Suspendisse potenti. Vestibulum id egestas libero.

In et tellus non erat suscipit sollicitudin. Donec bibendum adipiscing varius. Quisque ut enim a lorem sodales bibendum. Sed in augue et velit pharetra luctus. In at ligula sed elit ullamcorper dignissim ut id risus. Vivamus feugiat interdum diam, ut ullamcorper odio pharetra nec. Nam ut turpis non mi eleifend mattis. Praesent pretium facilisis semper. Etiam nibh eros, gravida ac semper in, adipiscing eget ante. Integer placerat viverra lectus, venenatis sodales ligula accumsan vitae. Duis interdum blandit ligula nec pulvinar. Morbi rutrum auctor placerat. Nam eros tellus, euismod sit amet blandit nec, commodo sit amet risus. Praesent in leo et mi auctor placerat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris suscipit, ipsum varius interdum bibendum, massa libero elementum lorem, quis congue quam sapien nec velit!

Nam posuere erat vel orci sollicitudin laoreet? Nulla odio odio, convallis eu laoreet id, vehicula sit amet neque. Aenean urna sapien, vestibulum a pulvinar eget, scelerisque a justo. Duis bibendum ultricies semper! Vivamus quis malesuada elit. Pellentesque vestibulum elit at mauris pretium viverra. Aliquam sit amet sapien ipsum, ut tincidunt sapien. Morbi viverra gravida odio a lobortis. Suspendisse non dolor in nulla porttitor pellentesque id eget sem. Nunc congue ultrices ipsum, id pulvinar velit porta et. Vestibulum lobortis eleifend faucibus? Curabitur sed pulvinar diam. Vivamus ac eros est.
  
  how abot that? <span class="trigger"> Good pop-up!!!!!!!!!!!!!!!!!!!!!!!!!!! </span>
  <div class="popup">
  some text ??
  ellentesque convallis sit amet facilisis tortor. Nulla vitae turpis odio. In hac 
    <!-- your information content -->
  </div>
  
  Proin quis nisi leo, in eleifend nulla. Vivamus condimentum placerat orci, non ultrices justo pellentesque vel. Quisque eros purus, pulvinar tincidunt scelerisque in, feugiat et libero? Praesent non eros orci. Quisque egestas arcu id ante tempus non imperdiet nisi viverra? Pellentesque lacus turpis, sollicitudin non rutrum imperdiet, viverra vel magna. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris rhoncus pretium quam, in eleifend neque gravida eu. Ut risus massa, posuere sit amet vulputate fermentum, porttitor viverra sapien! In vitae libero a enim dignissim iaculis et sed tortor. Donec nec lorem quis orci mattis dignissim ut vitae velit? Morbi pretium, ipsum quis iaculis elementum, elit leo malesuada nisl, eget sollicitudin odio justo sed eros. Suspendisse tempus scelerisque volutpat. Etiam sit amet ultrices enim. Nam congue risus eu orci condimentum at lobortis purus sodales. Donec ultrices tincidunt purus, non tincidunt massa dignissim ut. Suspendisse potenti. Vestibulum id egestas libero.

In et tellus non erat suscipit sollicitudin. Donec bibendum adipiscing varius. Quisque ut enim a lorem sodales bibendum. Sed in augue et velit pharetra luctus. In at ligula sed elit ullamcorper dignissim ut id risus. Vivamus feugiat interdum diam, ut ullamcorper odio pharetra nec. Nam ut turpis non mi eleifend mattis. Praesent pretium facilisis semper. Etiam nibh eros, gravida ac semper in, adipiscing eget ante. Integer placerat viverra lectus, venenatis sodales ligula accumsan vitae. Duis interdum blandit ligula nec pulvinar. Morbi rutrum auctor placerat. Nam eros tellus, euismod sit amet blandit nec, commodo sit amet risus. Praesent in leo et mi auctor placerat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris suscipit, ipsum varius interdum bibendum, massa libero elementum lorem, quis congue quam sapien nec velit!

Nam posuere erat vel orci sollicitudin laoreet? Nulla odio odio, convallis eu laoreet id, vehicula sit amet neque. Aenean urna sapien, vestibulum a pulvinar eget, scelerisque a justo. Duis bibendum ultricies semper! Vivamus quis malesuada elit. Pellentesque vestibulum elit at mauris pretium viverra. Aliquam sit amet sapien ipsum, ut tincidunt sapien. Morbi viverra gravida odio a lobortis. Suspendisse non dolor in nulla porttitor pellentesque id eget sem. Nunc congue ultrices ipsum, id pulvinar velit porta et. Vestibulum lobortis eleifend faucibus? Curabitur sed pulvinar diam. Vivamus ac eros est.
</span>


  <!-- first pop-up -->
<div class="rss-popup">
<a href="feed-link" id="rss-icon">RSS Feed</a>
<em>pop-up 1 Not Good Subscribe to our RSS Feed</em>
</div>



 <h1>Image Loading</h1>
<div id="loader" class="loading">
</div>

<div id="go_50" >
<a href="images/image5.jpg" ><img src="images/image5.jpg" width="72" height="72" alt="" />go LIGHT BOX - !</a>
</div> 
    
  </body>
</html>

