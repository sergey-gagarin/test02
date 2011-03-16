<!doctype html>
<html>
  <head>
  <link href="styles9.css" rel="stylesheet" type="text/css">
  <!--
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js" type="text/javascript"></script>
 -->
   <script src="jquery.min.js" type="text/javascript"></script>
   <script type="text/javascript" src="jquery-ui-1.7.2.custom/js/jquery-ui-1.7.2.custom.min.js"></script>
   <link type="text/css" href="jquery-ui-1.7.2.custom/css/start/jquery-ui-1.7.2.custom.css" rel="Stylesheet" />
   <script type="text/javascript">


    $(document).ready(function(){

         
        
///////////////// form ///////////////////////////////////////////////////// 
        $('.ingredients').css('display','none');
        $('.choice').attr('checked',false);
        
       // $('.choice').toggle(    // No tick is showen when it has been clicked - Not Good
       //                     function(event){ $(this).next().next().css('display','block');},
      //                      function(event){ $(this).next().next().css('display','none');}
        
      //  );
        
        $('.choice').click( function(event) {  
                                          var c = $(this).attr('checked');
                                          if ($(this).attr('checked')) { $(this).parent().parent().next().css('display','block');  }
                                          else {  $(this).parent().parent().next().css('display','none');} 
                                          }
        );
        
        $('.options').change(function(event){
        
          var nn = $(this).attr('value');
          var price = $(this).parent().prev().children().attr('value');
      
          var total = nn*price;
          $(this).parent().next().children().attr('value',total);
        });
    
        $('.25').click(function(event){
        //  preventDefault(); // - with this NO result
       // alert('go');
       var meal = $(this).parent().parent().children().children().next().next().children().attr('value'); // title
       meal = meal + '<br>';
        $('#order').append(meal);
        });
        
        
        $('#empty').click( function(event) {$('#order').html('');       }
        );
 //////////////////////////////////////////////////////////////////////////// 
        $('#in_name').keyup( function(event) {   
                                                var name = $(this).attr('value');
                                                $('#order_name').html(name);       
                                                  }
        );
        
        $('#in_contact').keyup( function(event) {   
                                                var num = $(this).attr('value');
                                                $('#contact').html(num);       
                                                  }
        );
        
        $('#date').datepicker(); //// date
        
        $('#date').change(function(event) {   
                                                var dd = $(this).attr('value');
                                                $('#order_date').html(dd);       
                                                  }
        );
///////////////////////////////////////////////////////////////   
     });   // end (document).ready
    </script>
    
  </head>
 
  <body>

<!-- MEALS FORM -->

     <div class="clear"></div><hr>
     <br><br>
     
     Make your choice;  add more ingredients by choice; and put it in your lunchbox!
     <br>
     <input type="text" name="date" id="date" value="date"/>
     <br>
      Contact name:<input type="text" id="in_name" size=50 />
      <br>
      Contact number:<input type="text" id="in_contact" size=50 value="">
     <div id="meals">
        <div class="meal">
         
        <ul>
          <li><input type="checkbox" class="choice"></li>
          <li><img class="meal_img" src="images/s1.jpg" width="10" height="10"></li>
          <li><input  class="meal_price" size="30" type="text" name="meal_title" value="New Sandwich with AGGS!" readonly="readonly"></li>
          <li> <input  class="meal_price" size="5" type="text" name="meal_totlal" value="55" readonly="readonly"></li>
          <li class="meal_quantity">
                <select class="options">
                      <option>1</option><option>2</option><option>3</option><option>4</option><option>5</option>
                </select>
          </li>
          <li> <input  class="meal_price" size="5" type="text" class="meal_total" value="55" readonly="readonly"> </li>
        </ul>
               
        <ul class="ingredients">
          <li>Base:<input type="radio" name="base" value="roll" /> roll 
                   <input type="radio" name="base" value="bread" checked="checked" /> bread
          </li>
          <li><input type="checkbox" name="onion" value="onion"/>onion</li>
          <li><input type="checkbox" name="tomato" value="tomato"/>tomato</li>
          <li><input type="checkbox" name="cheese" value="onion"/>onion</li>
        </ul>
        <br>
        <div class="button25"> <input type="button" class="25" value="Put In the lunch box"></div>
      </div>
      
        <div class="meal">
         
        <ul>
          <li><input type="checkbox" class="choice"></li>
          <li><img class="meal_img" src="images/s1.jpg" width="10" height="10"></li>
          <li><input  class="meal_price" size="30" type="text" name="meal_title" value="N 22 Sandwich 222!" readonly="readonly"></li>
          <li> <input  class="meal_price" size="5" type="text" name="meal_totlal" value="55" readonly="readonly"></li>
          <li class="meal_quantity">
                <select class="options">
                      <option>1</option><option>2</option><option>3</option><option>4</option><option>5</option>
                </select>
          </li>
          <li> <input  class="meal_price" size="5" type="text" class="meal_total" value="55" readonly="readonly"> </li>
        </ul>
               
        <ul class="ingredients">
          <li>Base:<input type="radio" name="base" value="roll" /> roll 
                   <input type="radio" name="base" value="bread" checked="checked" /> bread
          </li>
          <li><input type="checkbox" name="onion" value="onion"/>onion</li>
          <li><input type="checkbox" name="tomato" value="tomato"/>tomato</li>
          <li><input type="checkbox" name="cheese" value="onion"/>onion</li>
        </ul>
        <br>
        <div class="button25"> <input type="button" class="25" value="Put In the lunch box"></div>
      </div>
      
      
 <div class="meal">
         
        <ul>
          <li><input type="checkbox" class="choice"></li>
          <li><img class="meal_img" src="images/s2.jpg" width="10" height="10"></li>
          <li><input  class="meal_price" size="30" type="text" name="meal_title" value="N 3w Sandwich with 3333!" readonly="readonly"></li>
          <li> <input  class="meal_price" size="5" type="text" name="meal_totlal" value="55" readonly="readonly"></li>
          <li class="meal_quantity">
                <select class="options">
                      <option>1</option><option>2</option><option>3</option><option>4</option><option>5</option>
                </select>
          </li>
          <li> <input  class="meal_price" size="5" type="text" class="meal_total" value="55" readonly="readonly"> </li>
        </ul>
               
        <ul class="ingredients">
          <li>Base:<input type="radio" name="base" value="roll" /> roll 
                   <input type="radio" name="base" value="bread" checked="checked" /> bread
          </li>
          <li><input type="checkbox" name="onion" value="onion"/>onion</li>
          <li><input type="checkbox" name="tomato" value="tomato"/>tomato</li>
          <li><input type="checkbox" name="cheese" value="onion"/>onion</li>
        </ul>
        <br>
        <div class="button25"> <input type="button" class="25" value="Put In the lunch box"></div>
      </div>



  
      
     </div>
      <br>
<!-- end meals --> 

    
     <div class="clear"></div><hr>
     <div id="order0"
      style="background:red;
             width: 200px; 
             position: fixed;
             right: 30px;
             top: 50px; 
              "
     >
        <input type="button" value="Empty Lunch Box" id="empty">
        <input type="button" value="Submit" id="pre_submit">
        submit - nw window with SUBMIT PRINT CANCEL EMPTY LANCH BOX     <br>
        <div id="order_date"></div>
        <div id="order_name"></div>
        <div id="contact"></div>
        <div id="order"></div>
     </div>



     Phasellus lorem ipsum, posuere sit amet sagittis sit amet, sollicitudin eget urna. Proin quis augue tortor. Duis velit leo, adipiscing nec consequat non, posuere quis nibh. Nunc aliquet elit at dui molestie vitae posuere elit luctus. Donec ac libero nisi, id hendrerit massa. Sed lectus tortor, bibendum non posuere in, vestibulum non enim. Sed ac nunc lorem. Cras hendrerit sagittis magna, interdum placerat massa varius sed. Integer sollicitudin, ante eget pretium ullamcorper; mi risus iaculis velit, nec rhoncus lectus velit eu leo. Proin est est, placerat consequat iaculis vitae; vulputate vitae lacus. Ut ut elit risus, commodo gravida dui. Nunc urna ipsum, dapibus eu lobortis eget, varius non odio. Mauris pharetra diam eget felis posuere faucibus. Suspendisse nec metus ac arcu gravida dignissim! Aliquam eget dignissim nulla. Donec sit amet sapien ultricies erat luctus dictum. Aliquam auctor, ipsum ut tincidunt tempor, ante ante suscipit libero, a euismod nisi justo et ligula.

Etiam rhoncus nisi et lacus lacinia vel lacinia massa pretium? Fusce id dui in sapien tristique tempor in non est? Donec turpis mi, elementum eu vestibulum eu, sagittis ac mauris. Etiam ipsum eros, imperdiet aliquam elementum ac, venenatis sit amet nulla. Nam faucibus ipsum sit amet mauris gravida tristique. Nulla et quam eget erat auctor lacinia! Integer vitae vulputate ipsum. Quisque et ipsum in metus bibendum imperdiet. Donec lacinia elit ut ante congue vel feugiat enim consectetur. Morbi non dolor vitae nibh aliquet sagittis! Proin nec felis at urna elementum varius vitae id tellus!

Nulla risus nisi; bibendum et hendrerit non, tincidunt in nunc. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent ultrices ullamcorper scelerisque. Etiam tincidunt ultricies commodo. Quisque vel nulla nec turpis faucibus posuere a in urna. Donec quis sapien enim, nec venenatis ipsum? Vestibulum bibendum laoreet elit suscipit pulvinar? Nulla facilisi. Nunc vel arcu sed mauris lobortis molestie a et mauris! Donec consequat egestas diam et aliquet.
Phasellus lorem ipsum, posuere sit amet sagittis sit amet, sollicitudin eget urna. Proin quis augue tortor. Duis velit leo, adipiscing nec consequat non, posuere quis nibh. Nunc aliquet elit at dui molestie vitae posuere elit luctus. Donec ac libero nisi, id hendrerit massa. Sed lectus tortor, bibendum non posuere in, vestibulum non enim. Sed ac nunc lorem. Cras hendrerit sagittis magna, interdum placerat massa varius sed. Integer sollicitudin, ante eget pretium ullamcorper; mi risus iaculis velit, nec rhoncus lectus velit eu leo. Proin est est, placerat consequat iaculis vitae; vulputate vitae lacus. Ut ut elit risus, commodo gravida dui. Nunc urna ipsum, dapibus eu lobortis eget, varius non odio. Mauris pharetra diam eget felis posuere faucibus. Suspendisse nec metus ac arcu gravida dignissim! Aliquam eget dignissim nulla. Donec sit amet sapien ultricies erat luctus dictum. Aliquam auctor, ipsum ut tincidunt tempor, ante ante suscipit libero, a euismod nisi justo et ligula.

Etiam rhoncus nisi et lacus lacinia vel lacinia massa pretium? Fusce id dui in sapien tristique tempor in non est? Donec turpis mi, elementum eu vestibulum eu, sagittis ac mauris. Etiam ipsum eros, imperdiet aliquam elementum ac, venenatis sit amet nulla. Nam faucibus ipsum sit amet mauris gravida tristique. Nulla et quam eget erat auctor lacinia! Integer vitae vulputate ipsum. Quisque et ipsum in metus bibendum imperdiet. Donec lacinia elit ut ante congue vel feugiat enim consectetur. Morbi non dolor vitae nibh aliquet sagittis! Proin nec felis at urna elementum varius vitae id tellus!

Nulla risus nisi; bibendum et hendrerit non, tincidunt in nunc. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent ultrices ullamcorper scelerisque. Etiam tincidunt ultricies commodo. Quisque vel nulla nec turpis faucibus posuere a in urna. Donec quis sapien enim, nec venenatis ipsum? Vestibulum bibendum laoreet elit suscipit pulvinar? Nulla facilisi. Nunc vel arcu sed mauris lobortis molestie a et mauris! Donec consequat egestas diam et aliquet.
Phasellus lorem ipsum, posuere sit amet sagittis sit amet, sollicitudin eget urna. Proin quis augue tortor. Duis velit leo, adipiscing nec consequat non, posuere quis nibh. Nunc aliquet elit at dui molestie vitae posuere elit luctus. Donec ac libero nisi, id hendrerit massa. Sed lectus tortor, bibendum non posuere in, vestibulum non enim. Sed ac nunc lorem. Cras hendrerit sagittis magna, interdum placerat massa varius sed. Integer sollicitudin, ante eget pretium ullamcorper; mi risus iaculis velit, nec rhoncus lectus velit eu leo. Proin est est, placerat consequat iaculis vitae; vulputate vitae lacus. Ut ut elit risus, commodo gravida dui. Nunc urna ipsum, dapibus eu lobortis eget, varius non odio. Mauris pharetra diam eget felis posuere faucibus. Suspendisse nec metus ac arcu gravida dignissim! Aliquam eget dignissim nulla. Donec sit amet sapien ultricies erat luctus dictum. Aliquam auctor, ipsum ut tincidunt tempor, ante ante suscipit libero, a euismod nisi justo et ligula.

Etiam rhoncus nisi et lacus lacinia vel lacinia massa pretium? Fusce id dui in sapien tristique tempor in non est? Donec turpis mi, elementum eu vestibulum eu, sagittis ac mauris. Etiam ipsum eros, imperdiet aliquam elementum ac, venenatis sit amet nulla. Nam faucibus ipsum sit amet mauris gravida tristique. Nulla et quam eget erat auctor lacinia! Integer vitae vulputate ipsum. Quisque et ipsum in metus bibendum imperdiet. Donec lacinia elit ut ante congue vel feugiat enim consectetur. Morbi non dolor vitae nibh aliquet sagittis! Proin nec felis at urna elementum varius vitae id tellus!

Nulla risus nisi; bibendum et hendrerit non, tincidunt in nunc. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent ultrices ullamcorper scelerisque. Etiam tincidunt ultricies commodo. Quisque vel nulla nec turpis faucibus posuere a in urna. Donec quis sapien enim, nec venenatis ipsum? Vestibulum bibendum laoreet elit suscipit pulvinar? Nulla facilisi. Nunc vel arcu sed mauris lobortis molestie a et mauris! Donec consequat egestas diam et aliquet.
Phasellus lorem ipsum, posuere sit amet sagittis sit amet, sollicitudin eget urna. Proin quis augue tortor. Duis velit leo, adipiscing nec consequat non, posuere quis nibh. Nunc aliquet elit at dui molestie vitae posuere elit luctus. Donec ac libero nisi, id hendrerit massa. Sed lectus tortor, bibendum non posuere in, vestibulum non enim. Sed ac nunc lorem. Cras hendrerit sagittis magna, interdum placerat massa varius sed. Integer sollicitudin, ante eget pretium ullamcorper; mi risus iaculis velit, nec rhoncus lectus velit eu leo. Proin est est, placerat consequat iaculis vitae; vulputate vitae lacus. Ut ut elit risus, commodo gravida dui. Nunc urna ipsum, dapibus eu lobortis eget, varius non odio. Mauris pharetra diam eget felis posuere faucibus. Suspendisse nec metus ac arcu gravida dignissim! Aliquam eget dignissim nulla. Donec sit amet sapien ultricies erat luctus dictum. Aliquam auctor, ipsum ut tincidunt tempor, ante ante suscipit libero, a euismod nisi justo et ligula.

Etiam rhoncus nisi et lacus lacinia vel lacinia massa pretium? Fusce id dui in sapien tristique tempor in non est? Donec turpis mi, elementum eu vestibulum eu, sagittis ac mauris. Etiam ipsum eros, imperdiet aliquam elementum ac, venenatis sit amet nulla. Nam faucibus ipsum sit amet mauris gravida tristique. Nulla et quam eget erat auctor lacinia! Integer vitae vulputate ipsum. Quisque et ipsum in metus bibendum imperdiet. Donec lacinia elit ut ante congue vel feugiat enim consectetur. Morbi non dolor vitae nibh aliquet sagittis! Proin nec felis at urna elementum varius vitae id tellus!

Nulla risus nisi; bibendum et hendrerit non, tincidunt in nunc. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent ultrices ullamcorper scelerisque. Etiam tincidunt ultricies commodo. Quisque vel nulla nec turpis faucibus posuere a in urna. Donec quis sapien enim, nec venenatis ipsum? Vestibulum bibendum laoreet elit suscipit pulvinar? Nulla facilisi. Nunc vel arcu sed mauris lobortis molestie a et mauris! Donec consequat egestas diam et aliquet.
Phasellus lorem ipsum, posuere sit amet sagittis sit amet, sollicitudin eget urna. Proin quis augue tortor. Duis velit leo, adipiscing nec consequat non, posuere quis nibh. Nunc aliquet elit at dui molestie vitae posuere elit luctus. Donec ac libero nisi, id hendrerit massa. Sed lectus tortor, bibendum non posuere in, vestibulum non enim. Sed ac nunc lorem. Cras hendrerit sagittis magna, interdum placerat massa varius sed. Integer sollicitudin, ante eget pretium ullamcorper; mi risus iaculis velit, nec rhoncus lectus velit eu leo. Proin est est, placerat consequat iaculis vitae; vulputate vitae lacus. Ut ut elit risus, commodo gravida dui. Nunc urna ipsum, dapibus eu lobortis eget, varius non odio. Mauris pharetra diam eget felis posuere faucibus. Suspendisse nec metus ac arcu gravida dignissim! Aliquam eget dignissim nulla. Donec sit amet sapien ultricies erat luctus dictum. Aliquam auctor, ipsum ut tincidunt tempor, ante ante suscipit libero, a euismod nisi justo et ligula.

Etiam rhoncus nisi et lacus lacinia vel lacinia massa pretium? Fusce id dui in sapien tristique tempor in non est? Donec turpis mi, elementum eu vestibulum eu, sagittis ac mauris. Etiam ipsum eros, imperdiet aliquam elementum ac, venenatis sit amet nulla. Nam faucibus ipsum sit amet mauris gravida tristique. Nulla et quam eget erat auctor lacinia! Integer vitae vulputate ipsum. Quisque et ipsum in metus bibendum imperdiet. Donec lacinia elit ut ante congue vel feugiat enim consectetur. Morbi non dolor vitae nibh aliquet sagittis! Proin nec felis at urna elementum varius vitae id tellus!

Nulla risus nisi; bibendum et hendrerit non, tincidunt in nunc. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent ultrices ullamcorper scelerisque. Etiam tincidunt ultricies commodo. Quisque vel nulla nec turpis faucibus posuere a in urna. Donec quis sapien enim, nec venenatis ipsum? Vestibulum bibendum laoreet elit suscipit pulvinar? Nulla facilisi. Nunc vel arcu sed mauris lobortis molestie a et mauris! Donec consequat egestas diam et aliquet.
Phasellus lorem ipsum, posuere sit amet sagittis sit amet, sollicitudin eget urna. Proin quis augue tortor. Duis velit leo, adipiscing nec consequat non, posuere quis nibh. Nunc aliquet elit at dui molestie vitae posuere elit luctus. Donec ac libero nisi, id hendrerit massa. Sed lectus tortor, bibendum non posuere in, vestibulum non enim. Sed ac nunc lorem. Cras hendrerit sagittis magna, interdum placerat massa varius sed. Integer sollicitudin, ante eget pretium ullamcorper; mi risus iaculis velit, nec rhoncus lectus velit eu leo. Proin est est, placerat consequat iaculis vitae; vulputate vitae lacus. Ut ut elit risus, commodo gravida dui. Nunc urna ipsum, dapibus eu lobortis eget, varius non odio. Mauris pharetra diam eget felis posuere faucibus. Suspendisse nec metus ac arcu gravida dignissim! Aliquam eget dignissim nulla. Donec sit amet sapien ultricies erat luctus dictum. Aliquam auctor, ipsum ut tincidunt tempor, ante ante suscipit libero, a euismod nisi justo et ligula.

Etiam rhoncus nisi et lacus lacinia vel lacinia massa pretium? Fusce id dui in sapien tristique tempor in non est? Donec turpis mi, elementum eu vestibulum eu, sagittis ac mauris. Etiam ipsum eros, imperdiet aliquam elementum ac, venenatis sit amet nulla. Nam faucibus ipsum sit amet mauris gravida tristique. Nulla et quam eget erat auctor lacinia! Integer vitae vulputate ipsum. Quisque et ipsum in metus bibendum imperdiet. Donec lacinia elit ut ante congue vel feugiat enim consectetur. Morbi non dolor vitae nibh aliquet sagittis! Proin nec felis at urna elementum varius vitae id tellus!

Nulla risus nisi; bibendum et hendrerit non, tincidunt in nunc. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent ultrices ullamcorper scelerisque. Etiam tincidunt ultricies commodo. Quisque vel nulla nec turpis faucibus posuere a in urna. Donec quis sapien enim, nec venenatis ipsum? Vestibulum bibendum laoreet elit suscipit pulvinar? Nulla facilisi. Nunc vel arcu sed mauris lobortis molestie a et mauris! Donec consequat egestas diam et aliquet.
Phasellus lorem ipsum, posuere sit amet sagittis sit amet, sollicitudin eget urna. Proin quis augue tortor. Duis velit leo, adipiscing nec consequat non, posuere quis nibh. Nunc aliquet elit at dui molestie vitae posuere elit luctus. Donec ac libero nisi, id hendrerit massa. Sed lectus tortor, bibendum non posuere in, vestibulum non enim. Sed ac nunc lorem. Cras hendrerit sagittis magna, interdum placerat massa varius sed. Integer sollicitudin, ante eget pretium ullamcorper; mi risus iaculis velit, nec rhoncus lectus velit eu leo. Proin est est, placerat consequat iaculis vitae; vulputate vitae lacus. Ut ut elit risus, commodo gravida dui. Nunc urna ipsum, dapibus eu lobortis eget, varius non odio. Mauris pharetra diam eget felis posuere faucibus. Suspendisse nec metus ac arcu gravida dignissim! Aliquam eget dignissim nulla. Donec sit amet sapien ultricies erat luctus dictum. Aliquam auctor, ipsum ut tincidunt tempor, ante ante suscipit libero, a euismod nisi justo et ligula.

Etiam rhoncus nisi et lacus lacinia vel lacinia massa pretium? Fusce id dui in sapien tristique tempor in non est? Donec turpis mi, elementum eu vestibulum eu, sagittis ac mauris. Etiam ipsum eros, imperdiet aliquam elementum ac, venenatis sit amet nulla. Nam faucibus ipsum sit amet mauris gravida tristique. Nulla et quam eget erat auctor lacinia! Integer vitae vulputate ipsum. Quisque et ipsum in metus bibendum imperdiet. Donec lacinia elit ut ante congue vel feugiat enim consectetur. Morbi non dolor vitae nibh aliquet sagittis! Proin nec felis at urna elementum varius vitae id tellus!

Nulla risus nisi; bibendum et hendrerit non, tincidunt in nunc. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent ultrices ullamcorper scelerisque. Etiam tincidunt ultricies commodo. Quisque vel nulla nec turpis faucibus posuere a in urna. Donec quis sapien enim, nec venenatis ipsum? Vestibulum bibendum laoreet elit suscipit pulvinar? Nulla facilisi. Nunc vel arcu sed mauris lobortis molestie a et mauris! Donec consequat egestas diam et aliquet.

  
  </body>
</html>

