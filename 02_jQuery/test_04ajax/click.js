// JavaScript Document
    $(document).ready(function(){
     $("button").click(function(event){
        $("p").addClass("red");
     });
     
  $.ajaxSetup ({
		    cache: false
	});
	var ajax_load = "<img class='loading' src='load.gif' alt='loading...' />";
	
	//	load() functions  The syntax is simply $(“#DOM”).load(url)
	var loadUrl = "load.php";
	$("#load_basic").click(function(){
	   
	    // $c = load(loadUrl); - no way
		$("#result1")
      .html(ajax_load)  // animation
      .load(loadUrl); // no way to use for <input id='result2' value="">
	});
	
	
	// With load(url + “ #DOM”), only the contents within #DOM are injected into current page
	$("#load_dom").click(function(){  
    $("#result1").load(loadUrl + " #section2");    //" #sss"  // blank space matter
  });
  
  
  //By passing a string as the second param of load(), these parameters are passed 
  //to the remote url in the GET method
   $("#load_get").click(function(){  
     $("#result_get")  
         .html(ajax_load)  
         .load('load_get.php', "lg=php&v=5");  
    });
  
    
  $("#load_post").click(function(){ 
      //var posts = $('#postvar').text();   // for general html text such as <span>
      var posts = $('#postvar').val();      // val() - for input
     // alert(posts);
     $("#result_post")  
         .html(ajax_load)  
         .load('load_post.php', {lg: posts, v: 5});  
   }); 
   
  
  //
   $("#load_callback").click(function(){  
     $("#result1")                               // still $('DOM')
         .html(ajax_load)  
         .load(loadUrl + " .class3", null, function(responseText){   // load whole lot first
             alert("Response:\n" + responseText);                      // but display only #section2
         });  
 });  
    


   // JSON (JavaScript Object Notation)
   
   $("#getJSON").click(function(){  
    
      $("#resultJSON").html(ajax_load);  
         $.get(  
             'load_JSON.php',  
             {v: 5},  
             function(text){  
               alert(text.res1);
               //  $("#result_JSON").html(text.result1);  
             },  
             'json'  
         );  
          

     });  
  
 
 
//  $.get('/load_json.php', { name: 'value' },
//     function(data) {
//         alert(data.Name);
//     },
//     'json'); // Set the type to 'json'!


}); // end document ready


