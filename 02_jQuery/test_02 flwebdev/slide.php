<!doctype html>
<html>
  <head>
  <link href="styles7.css" rel="stylesheet" type="text/css">
  <!--
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js" type="text/javascript"></script>
 -->
   <script src="jquery.min.js" type="text/javascript"></script>
   <script type="text/javascript">


    $(document).ready(function(){
    
        $('#menu ul li:has(ul)').css('list-style-image','url(plus.gif)').children().hide();
        
        $('#menu ul li ul').css('list-style-image','none');
        
      //  $('#menu222 ul').css('list-style-image','url(http://localhost/02_jQuery/test_02%20flwebdev/plus.gif)');
        $('#menu222 ul').css('list-style-image','url(http://localhost/plus.gif)');
         
        $('#menu ul li:has(ul)').click(function(event){
        
          if(this==event.target){  // to prevent reaction for clicking on child li
             
             if($(this).children().is(':hidden')){   
                $(this)
                  .css('list-style-image','url(minus.gif)')
               //   .children().show();
                     .children().slideDown('slow');
            } else {
              $(this)
               .css('list-style-image','url(plus.gif)')
            //    .children().hide();
                .children().slideUp('slow');
              }
          }
        });
     });

    </script>
    
  </head>
  
  <body>
   <div id="menu">
    <ul>
        <li><a href="#">Link 1</a></li>
        <li><a href="#">Link 2</a></li>
        <li>
          Item 3 - not a link
          <ul>
            <li><a href="#">Link 3.1</a></li>
            <li>
              Item 3.2 - not a link
              <ul>
                <li><a href="#">Link 3.2.1</a></li>
                <li><a href="#">Link 3.2.2</a></li>
                <li><a href="#">Link 3.2.3</a></li>
              </ul>
            </li>
            <li><a href="#">Link 3.3</a></li>
          </ul>
        </li>
        <li>
          Item 4  - not a link
          <ul>
            <li><a href="#">Link 4.1</a></li>
            <li>
              Item 4.2 - not a link
              <ul>
                <li><a href="#">Link 4.2.1</a></li>
                <li><a href="#">Link 4.2.2</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li><a href="#">Link 5</a></li>
      </ul>


   </div>


   <div id="menu222">
    <ul>
        <li><a href="#">Link 1</a></li>
        <li><a href="#">Link 2</a></li>
        <li>
          Item 3 - not a link
          <ul>
            <li><a href="#">Link 3.1</a></li>
            <li>
              Item 3.2 - not a link
              <ul>
                <li><a href="#">Link 3.2.1</a></li>
                <li><a href="#">Link 3.2.2</a></li>
                <li><a href="#">Link 3.2.3</a></li>
              </ul>
            </li>
            <li><a href="#">Link 3.3</a></li>
          </ul>
        </li>
        <li>
          Item 4  - not a link
          <ul>
            <li><a href="#">Link 4.1</a></li>
            <li>
              Item 4.2 - not a link
              <ul>
                <li><a href="#">Link 4.2.1</a></li>
                <li><a href="#">Link 4.2.2</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li><a href="#">Link 5</a></li>
      </ul>


   </div>
 
    
  </body>
</html>

